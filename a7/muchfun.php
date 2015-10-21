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
            padding: 4px 4px 0px 4px;
            border: 1px solid black;
            margin: 2px;
            transition: transform .2s;
        }
        
        .photo p {
            text-align: center;
        }
        
        .photo:hover {
            transform: rotate(0deg);
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
    
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".photo").each(function() {
                $(this).css("transform", "rotate(" + ((Math.floor(Math.random() * 92)) - 46) + "deg)");
                $(this).offset({
                    top: (Math.floor(Math.random() * 400) + 50),
                    left: (Math.floor(Math.random() * 400) + 500)
                });
                
                $(this).hover(
                    function() {
                        $(this).css("transform", "rotate(0deg)")
                    }, 
                    function() {
                        $(this).css("transform", "rotate(" + ((Math.floor(Math.random() * 92)) - 46) + "deg)")
                    });
                
                $(this).draggable({ stack: ".photo" });
            });
        });
        
    </script>
</head>
<body>
    <h1>MUCHFUN.php</h1>
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