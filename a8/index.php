<!DOCTYPE html>
<html>
<head>
    <title>Dinosaur Web Application - pah9qd</title>
    <style>
        body {
            font-family: "Tahoma";
            /*background-image: */
                /*linear-gradient(*/
                /*    rgba(0, 0, 0, 0.5),*/
                /*    rgba(0, 0, 0, 0.5)*/
                /*),*/
                /*url("https://farm5.staticflickr.com/4046/4313864280_c0dc33b1da_b.jpg");*/
            background-size: cover;
            background-repeat: no-repeat;
            background-color: rgba(58, 66, 66, 1);
        }
        
        .nav-btns {
            display: block;
            width: 127px;
            margin: 5px auto;
            font-size: 1.25em;
        }
        
        #content {
            /*padding: 8px;*/
            font-size: 1.25em;
            border: 5px solid transparent;
            -moz-border-image: -moz-linear-gradient(153deg, rgba(58, 66, 66, 0) 60%, #778899 100%);
            -webkit-border-image: -webkit-linear-gradient(153deg, rgba(58, 66, 66, 0) 60%, #778899 100%);
            border-image: linear-gradient(153deg, rgba(58, 66, 66, 0) 60%, #778899 100%);
            border-image-slice: 1;
            color: white;
        }
        
        #content > h1 {
            text-align: center;
        }
        
        #page-title {
            color: white;
            text-align: center;
        }
        
        #container {
            /*position: relative;*/
            /*top: 200px;*/
            width: 650px;
            height: 100%;
            margin: 0 auto;
            background-color: rgba(58, 66, 66, 0.9);
            /*padding: 8px;*/
            transition: all 2s;
        }
        
        #content > h1, #content > p, #content > ul {
            margin: 0;
            padding-bottom: 8px;
        }
        
        #container:after {
            content: "";
            display: table;
            clear: both;
        }
    
        #column-left {
            width: 150px;
            height: 104px;
            float: left;
        }
        
        #column-right {
            width: 500px;
            height: 100%;
            min-height: 104px;
            float: left;
        }
        
        /* Loading Text Animation */
        @keyframes textChange {
            0%   {font-size: 2em;}
            50%  {font-size: 2.8em;}
            100% {font-size: 2em;}
        }
        
        #loading-txt {
            animation-name: textChange;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            -webkit-animation-timing-function: ease; /* Chrome, Safari, Opera */
            animation-timing-function: ease;
        }
    </style>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        function accessWebService(apiStr, callback) {
            var url = "https://cs2830.azurewebsites.net/a8/webservice.php?" + apiStr;
            // console.log(url);
            $.get(url, function(data) {
                callback(data);
            });
        }
        
        function loadingText() {
            $("#content").html("<h1 id='loading-txt'>Loading!</h1>");
        }
        
        $(document).ready(function() {
            // Get home data and display it
            $("#home-btn").click(function() {
                loadingText();
                accessWebService("content=home", function(data) {
                    console.log(data);
                    $("#content").html(data);
                });
            });
            
            // Get XML Data and display it
            $("#xml-btn").click(function() {
                loadingText();
                
                accessWebService("content=data&format=xml", function(data) {
                    var dinosaurs = {};
                    var i = 0;
                    // console.log(data);
                    $(data).find('dinosaur').each(function() {
                        dinosaurs[i++] = {
                            name: $(this).find("name").text(),
                            period: $(this).find("period").text()
                        };
                    });
                    console.dir(dinosaurs);
                    var htmlStr = "<ul>";
                    for(i = 0; i < Object.keys(dinosaurs).length; i++) {
                        htmlStr += "<li>" + dinosaurs[i]['name'] + " lived during the " + dinosaurs[i]['period'];
                    }
                    htmlStr += "</ul>";
                    $("#content").html(htmlStr);
                });
            });
            
            // Get JSON Data and display it
            $("#json-btn").click(function() {
                loadingText();
                
                accessWebService("content=data&format=json", function(data) {
                    var htmlStr = "<ul>";
                    for(var i = 0; i < data.length; i++) {
                        htmlStr += "<li>" + data[i]["name"] + " was a " + data[i]["diet"];
                    }
                    htmlStr += "</ul>";
                    $("#content").html(htmlStr);
                });
                
            });
        });
    </script>
</head>
<body>
    <div id="container">
        <h1 id="page-title">Dinosaur Web Application</h1>
        <div id="column-left">
            <button type="button" id="home-btn" class="nav-btns">Home</button>
            <button type="button" id="xml-btn" class="nav-btns">XML Dinos</button>
            <button type="button" id="json-btn" class="nav-btns">JSON Dinos</button>
        </div>
        <div id="column-right">
            <div id="content">
                <h1>Select an option from the left!</h1>
            </div>
        </div>
    </div>
</body>
</html>