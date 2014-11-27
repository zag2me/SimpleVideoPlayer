
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cardo">
</head>

<body>

<p class='headertext'>Simple Video Player<br><img src='images/header.png' width='64'></p>
<P class='blocktext'>
<?php
// Check the sub-folder structure of \Videos
if ($handle = opendir('videos')) {
    $blacklist = array('.', '..', 'somedir', 'somefile.php');
    while (false !== ($file = readdir($handle))) {
        if (!in_array($file, $blacklist)) {
            echo "<img src='images/icons/folder.png' width='32'> ";
            echo "<a href='department.php?d=$file'>" . $file . "</a>";
            echo "<br>";
        }
    }
    closedir($handle);
}
?>

</p>

</body>
</html>