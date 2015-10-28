<!DOCTYPE html>
<html>
<head>
    <title>Dinosaur Web Application - pah9qd</title>
    <style>
        body {
            font-family: "Tahoma";
            color: #000;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #313131;
        }
        
        .nav-btns {
            display: block;
            width: 127px;
            margin: 5px auto;
            font-size: 1.25em;
        }
        
        #content {
            font-size: 1.25em;
        }
        
        #content > h1 {
            text-align: center;
        }
        
        #content > p {
            text-align: center;
        }
        
        #content > h1, #content > p, #content > ul {
            margin: 0;
            padding-bottom: 8px;
        }
        
        #page-title {
            text-align: center;
        }
        
        #container {
            width: 650px;
            height: 100%;
            min-height: 200px;
            margin: 0 auto;
            padding-right: 11.5px;
            padding-top: 1px;
            background-color: #F8FDF4;
            border-radius: 15px;
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
            -webkit-animation-timing-function: ease;
            -moz-animation-timing-function: ease;
            animation-timing-function: ease;
        }
    </style>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        function accessWebService(apiStr, callback) {
            var url = "https://cs2830.azurewebsites.net/a8/webservice.php?" + apiStr;
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
                    $("#content").html(data);
                });
            });
            
            // Get XML Data and display it
            $("#xml-btn").click(function() {
                loadingText();
                accessWebService("content=data&format=xml", function(data) {
                    var dinosaurs = [];
                    var i = 0;
                    $(data).find('dinosaur').each(function() {
                        dinosaurs[i++] = {
                            name: $(this).find("name").text(),
                            period: $(this).find("period").text()
                        };
                    });
                    var htmlStr = "<ul>";
                    for(i = 0; i < dinosaurs.length; i++) {
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
                <h2>Select an option from the left!</h2>
            </div>
        </div>
    </div>
</body>
</html>