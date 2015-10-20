<!DOCTYPE html>
<html>
<head>
    <title>Assignment 7 : Project PHP</title>
    <style>
        body {
            background-color: white;
        }
        h1 {
            text-align: center;
        }
        
        .photo {
            float: left;
            background-color: ghostwhite;
            padding: 4px 8px 15px 8px;
            border: 1px solid black;
            margin: 2px;
        }
        
        .photo p {
            text-align: center;
        }
        
        #animalPhotos {
            width: 90%;
            margin: auto;
        }
        
        #animalPhotos img {
            display: block;
            margin: auto;
            border: 1px solid black;
            height: 150px;
        }
    </style>
    
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        $(".photo").each(function() {
            $(this).css("transform", Math.floor(Math.random() * 91));
        });
    </script>
</head>
<body>
    <h1>Assignment 7 : Project PHP</h1>
    <div id="animalPhotos">
        <?php
            $dir = preg_grep("/.+\.jpg/", scandir("."));
            foreach($dir as $file) {
                echo "<div class='photo'><img src='$file'><p>$file</p></div>";
            }
        ?>
    </div>
</body>
</head>