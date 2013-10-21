<!DOCTYPE html>
<html lang=”en”>
    <head>
        <meta charset="UTF-8" />
            <style type="text/css" title="currentStyle">
        @import "./css/layout.css";
    </style>
<link rel="stylesheet" href="<?php echo asset('css/layout.css')?>" type="text/css"> 
        <title>
            Tutorial
        </title>
    </head>
    <body>
        @include("header")
        <div class="content">
            <div class="container">
                @yield("content")
            </div>
        </div>
        @include("footer")
    </body>
</html>