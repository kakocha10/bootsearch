
    <link rel="stylesheet" href="<?php echo asset('css/demo_table.css')?>" type="text/css"> 

<script type="text/javascript" src="<?php echo asset('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo asset('js/datatables.min.js')?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jeditable.js')?>"></script>

<table id="mytable" style="margin:20px 0px 20px 0px;">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Main Position</th>
    <th>Secondary Position</th>
    <th>Club</th>
    <th>Vision</th>
    <th>Goalkicking</th>
    <th>Tackling</th>
    <th>Offloads</th>
    <th>Kicking</th>
</tr>
</thead>
</table>

<script>
    $(document).ready( function () {
 
       var oTable = $('#mytable').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "./usersDT",
            "aoColumns": [
            	{ "sName": "id" },
		      { "sName": "playername" },
		      { "sName": "positionone", "sClass": "position" },
		      { "sName": "positiontwo", "sClass": "position" },
		      { "sName": "club", "sClass": "club" },
		      { "sName": "vision", "sClass": "attribute" },
		      { "sName": "goalkicking", "sClass": "attribute" },
		      { "sName": "tackling", "sClass": "attribute" },
		      { "sName": "offloads", "sClass": "attribute" },
		      { "sName": "kicking", "sClass": "attribute" }
		    ],
            "fnInitComplete": function(oSettings, json) {
                $('.attribute', oTable.fnGetNodes()).editable('./submitcell', {    
	                 "callback": function( sValue, y ) {
	                    //var aPos = oTable.fnGetPosition( this );
	                   // oTable.fnUpdate( sValue, aPos[0], aPos[1] );
	                },
	                "submitdata": function ( value, settings ) {
	                   return {
	                        "id": this.parentNode.getAttribute('id'),
	                        "column": oTable.fnGetPosition( this )[2]
	                   };
	                },
                });

				  $(".position").editable('./submitcell', { 
				    data   : "{'FLB':'Fullback','CTW':'Centre','FRF':'Front Row'}",
				    type   : "select",
				    submit : "OK",
				    style  : "inherit",
				    submitdata : function( value, settings ) {
				      	return {
	                        "id": this.parentNode.getAttribute('id'),
	                        "column": oTable.fnGetPosition( this )[2]
	                   };
				    }
				  });
				  $(".club").editable('./submitcell', { 
				    data   : "{'BRO':'Broncos','WST':'Tigers','GCT':'Titans'}",
				    type   : "select",
				    submit : "OK",
				    style  : "inherit",
				    submitdata : function( value, settings ) {
				      	return {
	                        "id": this.parentNode.getAttribute('id'),
	                        "column": oTable.fnGetPosition( this )[2]
	                   };
				    }
				  });

            },
            "fnDrawCallback": function( oSettings ) {
            	$('.attribute', oTable.fnGetNodes()).editable('./submitcell', {    
	                 "callback": function( sValue, y ) {
	                    //var aPos = oTable.fnGetPosition( this );
	                   // oTable.fnUpdate( sValue, aPos[0], aPos[1] );
	                },
	                "submitdata": function ( value, settings ) {
	                   return {
	                        "id": this.parentNode.getAttribute('id'),
	                        "column": oTable.fnGetPosition( this )[2]
	                   };
	                },
                });
				  $(".position").editable('./submitcell', { 
				    data   : "{'FLB':'Fullback','CTW':'Centre','FRF':'Front Row'}",
				    type   : "select",
				    submit : "OK",
				    style  : "inherit",
				    submitdata : function( value, settings ) {
				      	return {
	                        "id": this.parentNode.getAttribute('id'),
	                        "column": oTable.fnGetPosition( this )[2]
	                   };
				    }
				  });
				  $(".club").editable('./submitcell', { 
				    data   : "{'BRO':'Broncos','WST':'Tigers','GCT':'Titans'}",
				    type   : "select",
				    submit : "OK",
				    style  : "inherit",
				    submitdata : function( value, settings ) {
				      	return {
	                        "id": this.parentNode.getAttribute('id'),
	                        "column": oTable.fnGetPosition( this )[2]
	                   };
				    }
				  });
		    },
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                  $(nRow).attr("id",aData[0]);
                  return nRow;
             }

        });
    } );
</script>
