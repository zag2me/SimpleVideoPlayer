<?php

//  ##############   Include Files  ################ //
    include "includes/ez_sql_core.php";
    include "includes/ez_sql_mysql.php";
    include "includes/db_connection.php";
//  ##############  Finish Includes  ############### //

// Setup the database Queries
$latestvideos = $db->get_results("SELECT * FROM videos ORDER BY idVideo DESC LIMIT 3");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Simple Video Player</title>
</head>

<body>
<div id="container">
		<div id="header">
        	<img src="images/header_icon.png"><h1>Simple<span class="off">Video</span>Server</h1>
            <h2></h2>
        </div>
        
        <div id="menu">
        	<ul>
            	<li class="menuitem"><a href="#">Home</a></li>
                <li class="menuitem"><a href="#">Upload</a></li>
                <li class="menuitem"><a href="#">Help</a></li>
            </ul>
        </div>
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">    
                <h3>Departments</h3>
                <ul>
                
                <?php
                // Check the sub-folder structure of Videos and build the menu
                if ($handle = opendir('videos'))
                {
                $blacklist = array('.', '..', 'somedir', 'somefile.php');
                    while (false !== ($file = readdir($handle))) 
                    {
                        if (!in_array($file, $blacklist)) 
                        {
                        echo "<li>";
                        echo "<div style='float: left;''><img src='images/departments/".$file.".png'></div>";



                        echo "<a href='department.php?d=$file'>" . $file . "</a></li>";
                        }
                    }
                    closedir($handle);
                }
?>
</ul>
</div>
                
                
              <div id="leftmenu_bottom"></div>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
		<h1>Welcome to the Simple Video Server</h1>
        <p>

        <div class="lighter">
        <form>
            <span><input type="text" class="search rounded" placeholder=""></span>
        </form>
        </div>

        </p>

        <p><h3>Latest Vidoes</h3></p>
        <?php
        if ($latestvideos != NULL)
        {
            foreach ($latestvideos as $latestvideo)
            {
               echo ' <a href="' . $latestvideo->strFilename . '"><p style="float: left; font-size: 9pt; text-align: center; width: 32%; margin-right: 1%; margin-bottom: 0.5em;"><img src="images/video_icon.png" style="width: 100%" border="0">' . $latestvideo->strVideo . '</p></a>';
            }
        }
        else echo "No videos found";
        ?>

        <div style="clear:both;"></div>
		</div>
        <div id="content_bottom"></div>
            
            <div id="footer"><h3><a href="#"></a></h3></div>
      </div>
   </div>
</body>
</html>
