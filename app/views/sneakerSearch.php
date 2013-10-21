<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>RLM</title>
  <style>
      html { 
        background: black; 
      }
      body {
        background: #333;
        background: -webkit-linear-gradient(top, black, #666);
        background: -o-linear-gradient(top, black, #666);
        background: -moz-linear-gradient(top, black, #666);
        background: linear-gradient(top, black, #666);
        color: white;
        font-family: "Helvetica Neue",Helvetica,"Liberation Sans",Arial,sans-serif;
        width: 40em;
        margin: 0 auto;
        padding: 3em;
    }
    .item {
        width: 800px
    }
    .colName { 
        float: left;
        min-width: 200px; 
        width: 25%; 
    }
    a{
        color:white;
    }
    
	.outerContainer
   {
 	 	clear: both;
    	padding: 0 5px 10px;
    	border: 1px solid #CCC;
   }
	.results
  {
	    width: 700px;
		padding: 0;
   }
   .results .boot
   {
	    width: 100%;
		/*border: 1px solid #CCC;*/
		height: 100px;
		padding: 0;
  }
   .results .boot .image, .results .boot .link, .results .boot .price
   {
       display: block;
       float: left;
       padding: 0;
       padding-top: 4px;
	    width: 33%;
      height: 100%;
   }
   .results .image img {
        height: 90%;
   }
  </style>
</head>
<script type="text/javascript" src="<?php echo asset('js/jquery.js')?>"></script>
<script type="text/javascript">
// This is our actual script
//http://frugalrouleur.com/ <http://frugalrouleur.com/>  

$(document).ready(function(){


    $.ajax({
        url: './eastbay',
        type: 'POST',
        data: ({searchString: "copa mundial"}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            $('#eastBayLoading').show();
          },
        success: function (data) {
            $('#eastBayLoading').hide();
            $('#eastBayContainer').html(data);
        }
    });
    $.ajax({
        url: './proDirect',
        type: 'POST',
        data: ({searchString: "copa mundial"}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            $('#proDirectLoading').show();
          },
        success: function (data) {
            $('#proDirectLoading').hide();
            $('#proDirectContainer').html(data);
        }
    });
     $.ajax({
        url: './worldsoccershop',
        type: 'POST',
        data: ({searchString: "copa mundial"}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            $('#worldSoccerLoading').show();
          },
        success: function (data) {
            $('#worldSoccerLoading').hide();
            $('#worldSoccerContainer').html(data);
        }
    });
         $.ajax({
        url: './wegotsoccer',
        type: 'POST',
        data: ({searchString: "copa mundial"}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            $('#weGotSoccerLoading').show();
          },
        success: function (data) {
            $('#weGotSoccerLoading').hide();
            $('#weGotSoccerContainer').html(data);
        }
    });
});
</script>
<body>
  <?php
    echo Holmes::is_mobile();
  ?>
<div id="eastBayOutside" class="outerContainer">
    <h1>Eastbayy</h1>
    <div id="eastBayContainer" class="results" class="results"><img id="eastBayLoading" style="display:none;"src="http://i.stack.imgur.com/FhHRx.gif"/><!-- currently it's empty --></div>
</div>
<div id="proDirectOutside" class="outerContainer">
    <h1>Pro Direct Soccer</h1>
    <div id="proDirectContainer" class="results" class="results"><img id="proDirectLoading" style="display:none;"src="http://i.stack.imgur.com/FhHRx.gif"/><!-- currently it's empty --></div>
</div>
<div id="worldSoccerOutside" class="outerContainer">
    <h1>World Soccer Shop</h1>
    <div id="worldSoccerContainer" class="results" class="results"><img id="worldSoccerLoading" style="display:none;"src="http://i.stack.imgur.com/FhHRx.gif"/><!-- currently it's empty --></div>
</div>
<div id="weGotSoccerOutside" class="outerContainer">
    <h1>We Got Soccer</h1>
    <div id="weGotSoccerContainer" class="results" class="results"><img id="weGotSoccerLoading" style="display:none;"src="http://i.stack.imgur.com/FhHRx.gif"/><!-- currently it's empty --></div>
</div>
</body>