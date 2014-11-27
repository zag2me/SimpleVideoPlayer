<!doctype html>
<?php
// Include some functions
include 'functions.php';
// Get the filename to play
$filetoplay = htmlspecialchars($_GET["f"]);
?>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">

   <!-- player skin -->
   <link rel="stylesheet" href="skin/minimalist.css">

   <!-- site specific styling -->
   <style>
   body { font: 12px "Myriad Pro", "Lucida Grande", sans-serif; text-align: center; padding-top: 5%; }
   .flowplayer { width: 80%; }
   </style>

   <!-- flowplayer depends on jQuery 1.7.1+ (for now) -->
   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

   <!-- include flowplayer -->
   <script src="flowplayer.min.js"></script>

</head>

<body>
   <!-- the player -->
   <div class="flowplayer" data-swf="flowplayer.swf" data-ratio="0.4167">
      <video>
         <source type="video/mp4" src="<?php echo $filetoplay; ?>">
      </video>
   </div>
</body>
