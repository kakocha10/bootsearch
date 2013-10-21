<!DOCTYPE html> 
<html> 
<head> 
	<title>My Page</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	 <link rel="stylesheet" href="<?php echo asset('css/jquery.mobile-1.3.2.min.css')?>" type="text/css">
	<script type="text/javascript" src="<?php echo asset('js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?php echo asset('js/jquery.mobile-1.3.2.min.js')?>"></script>
	<style>


    

  </style>
<script type="text/javascript">
// This is our actual script
//http://frugalrouleur.com/ <http://frugalrouleur.com/>  

$(document).ready(function(){


    $.ajax({
        url: './eastbay',
        type: 'POST',
        data: ({searchString: "copa mundial",mobile:true}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            // $('#eastBayLoading').show();
          },
        success: function (data) {
            // $('#eastBayLoading').hide();
            $('#eastBayContainer').html(data);
            $('#eastBayContainer').listview('refresh');
        }
    });
    $.ajax({
        url: './proDirect',
        type: 'POST',
        data: ({searchString: "copa mundial",mobile:true}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            $('#proDirectLoading').show();
          },
        success: function (data) {
            // $('#proDirectLoading').hide();
            $('#proDirectContainer').html(data);
            $('#proDirectContainer').listview('refresh');
        }
    });
     $.ajax({
        url: './worldsoccershop',
        type: 'POST',
        data: ({searchString: "copa mundial",mobile:true}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            $('#worldSoccerLoading').show();
          },
        success: function (data) {
            // $('#worldSoccerLoading').hide();
            $('#worldSoccerContainer').html(data);
            $('#worldSoccerContainer').listview('refresh');
        }
    });
         $.ajax({
        url: './wegotsoccer',
        type: 'POST',
        data: ({searchString: "copa mundial",mobile:true}),
        dataType: 'html',
        beforeSend: function( xhr ) {
            // $('#weGotSoccerLoading').show();
          },
        success: function (data) {
            // $('#weGotSoccerLoading').hide();
            $('#weGotSoccerContainer').html(data);
            $('#weGotSoccerContainer').listview('refresh');
        }
    });
});
</script>
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>My Title</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<div data-role="collapsible"  data-collapsed="false" data-theme="b" data-content-theme="b">
	   		<h3>Eastbay</h3>
	   		<ul data-role="listview" data-inset="true" data-filter="false" id="eastBayContainer">
			</ul>
		</div>
		<div data-role="collapsible"  data-collapsed="false" data-theme="b" data-content-theme="b">
	   		<h3>Pro Direct</h3>
	   		<ul data-role="listview" data-inset="true" data-filter="false" id="proDirectContainer">
			</ul>
		</div>
		<div data-role="collapsible"  data-collapsed="false" data-theme="b" data-content-theme="b">
	   		<h3>We Got Soccer</h3>
	   		<ul data-role="listview" data-inset="true" data-filter="false" id="weGotSoccerContainer">
			</ul>
		</div>
		<div data-role="collapsible"  data-collapsed="false" data-theme="b" data-content-theme="b">
	   		<h3>World Soccer Shop</h3>
	   		<ul data-role="listview" data-inset="true" data-filter="false" id="worldSoccerContainer">
			</ul>
		</div>
	</div><!-- /content -->

</div>

</div><!-- /page -->

</body>
</html>