
<?php
include 'functions.php';
$department = htmlspecialchars($_GET["d"]);

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cardo">
</head>

<body>

<p class='headertext'>Simple Video Player<br><img src='images/header.png' width='64'></p>
<P class='blockvideos'>
<table>
<colgroup>
 <col style="width:10%">
 <col style="width:70%">
 <col style="width:20%">
</colgroup>  
   
<?php

// Loop through each video in the directory
foreach (glob("videos/".$department."/*.mp4") as $filename) {
    echo "<tr><td>";
    echo "<img src='images/icons/mp4.png' width='32'> ";
    echo "</td><td>";
    $filenamesimple = substr(substr($filename, strrpos($filename, '/') + 1), 0, -4);
    echo "<a href='play.php?f=" . $filename . "'>$filenamesimple</a></td>";
    echo "<td>(" . formatSizeUnits(filesize($filename)) . ")<br></td></tr>";
}

?>
</table>

</p>



</body>
</html>