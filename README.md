VI-Explorer
===========

This is a low-level NI LabView VI Fileformat reader. It should be compatible with VI file format from 5.0 up to LabView 2016.

see example code: "_example_.php"

Features:
- open VI-file
- read and write password hash [BDPW]
- read Versions information [Vers]
- read Block diagram [BDHx]
- read Frontpanel [FPHx]
- read Connectors/Terminals [VCTP]
- read Icon [Icon]

Unsupported features: e.g our secret project files
- many errors
- [?? type=2 ?? /]
- [?? type=134 ?? /]
- [?? type=25 ?? /]
- [?? type=242 ?? /]
- [?? type=130 ?? /]
- [?? type=137 ?? /]
- [?? type=170 ?? /]
- [?? type=0 ?? /]
- prop typ 570,72,111
- solve string props for 1:text 570:unk 72:unk 203:BorderStyle 111:unk