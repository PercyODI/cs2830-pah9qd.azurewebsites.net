<!DOCTYPE html>
<html>
<head>
    <title>Assignment 7 : Project PHP</title>
    <style>
        h1 {
            text-align: center;
        }
        
        #animalPhotos {
            text-align: center;
        }
        
        #animalPhotos img {
            height: 150px;
        }
        
        #muchfunlink {
            display: block; 
            position: fixed;
            bottom: 15px;
            right: 15px;
        }
    </style>
</head>
<body>
    <h1>Assignment 7 : Project PHP</h1>
    <div id="animalPhotos">
        <?php
            $dir = preg_grep("/.+\.jpg/", scandir("."));
            foreach($dir as $file) {
                echo "<img src='$file' class='photo'>";
            }
        ?>
    </div>
    <a href="muchfun.php" id="muchfunlink">Click here to much fun</a>
</body>
</head>