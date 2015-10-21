<!DOCTYPE html>
<html>
<head>
    <title>Assignment 7 : Project PHP</title>
    <style>
        h1 {
            text-align: center;
        }
        
        #animalPhotos {
            margin: auto;
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
    
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        $(window).load(function() {
            var totalWidth = 0;
            $(".photo").each(function() {
                totalWidth += $(this).width();
                console.log(totalWidth);
            });
            $("#animalPhotos").width(totalWidth);
        });
    </script>
</head>
<body>
    
    <div id="animalPhotos">
        <h1>Assignment 7 : Project PHP</h1>
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