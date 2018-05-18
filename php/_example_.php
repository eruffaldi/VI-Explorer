<?PHP

function getgetVar($varname, $default='')
{
  if (isset($_GET[$varname])) return $_GET[$varname];
  return $default;
}

//------------------------------------//

include_once('clFile.php');
include_once('cllabview.php');

$filename_in = $argv[1];
$filename_out = '';
$newPassword = '123456';


$file = new clFile();
$file->readFromFile($filename_in); //- open File

$FReader = $file->getFileReader();


//- create a Labview class to controle the process
$LV = new clLabView($FReader);

  echo "<top>\n";

//- read .VI File
if ($LV->readVI())
{

  //- Password
  $BDPW = $LV->getBDPW();
  $BDPW->setPassword($newPassword); //- set the new password


  //- Version + Library Password
  $LVSR = $LV->getLVSR();
  $LVSR->setLibraryPassword($newPassword); //- set the new Library Password

  //- does not work because too many errors when opening VI in Labview... but you can giv it a try
  //$LVSR->setVersion(8,6);

  $BDHx = $LV->getBDHx();
  $FPHx = $LV->getFPHx();

  //-- just debugging ----
  $VCTP = $LV->getVCTP();

  $VERS = $LV->getVERS();

  // htmlentities
  echo ($LV->getXML(-1,8));
  echo ($BDPW->getXML(-1,8));
  echo ($VCTP->getXML(-1,8));
  echo ($VERS->getXML(-1,8));
  echo ($LVSR->getXML(-1,8));
  echo "<bdhx>\n".($BDHx->getXML(-1,8))."</bdhx>\n";
  echo "<fphx>\n".($FPHx->getXML(-1,8))."</fphx>\n";
  //-- end debugging ----




  //- save the .VI (this will calculate the password hash)
  if ($filename_out != "" && !$LV->store($filename_out))
  {
    echo '<errors>'. $LV->getErrorStr() .'</errors>';
  }



}
  echo "\n</top>\n";




?>
