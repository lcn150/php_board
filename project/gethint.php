<?php
// Fill up array with names
$a[]="lee";
$a[]="park";
$a[]="cho";
$a[]="choong";
$a[]="ji";
$a[]="alice";
$a[]="bob";
$a[]="shin";
$a[]="choi";
$a[]="kim";
$a[]="jung";
$a[]="pyen";
$a[]="na";
$a[]="hoon";
$a[]="hyen";
$a[]="ju";
$a[]="bae";
$a[]="kang";
$a[]="lym";
$a[]="sim";
$a[]="rose";
$a[]="tom";
$a[]="david";
$a[]="charlie";
$a[]="delta";
$a[]="ma";
$a[]="yang";
$a[]="su";
$a[]="yu";
$a[]="moon";

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from "" 
if ($q !== "")
  { $q=strtolower($q); $len=strlen($q);
    foreach($a as $name)
    { if (stristr($q, substr($name,0,$len)))
      { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
      }
    }
  }

// Output "no suggestion" if no hint were found
// or output the correct values 
echo $hint==="" ? "no suggestion" : $hint;
?>