<?php
// Load jQuery library from google.
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';

// Create connection connect to mysql database
$dbCon = mysql_connect('localhost', 'root', '') or die (mysql_error());

// Select database.
mysql_select_db('test', $dbCon) or die (mysql_error());

// Set encoding.
mysql_query('SET NAMES UTF8');

?>

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery-1.11.3.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $jqLib; ?>"></script>
<script type="text/javascript">
 // Specify a function to execute when the DOM is fully loaded.
$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="../thailand/images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#selProvince').change(function() {
		$("#selAmphur").html(defaultOption);
		$("#selTumbon").html(defaultOption);
		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "jsonAction.php",
			// Data to be sent to the server.
			data: ({ nextList : 'amphur', provinceID: $('#selProvince').val() }),
			// The type of data that you're expecting back from the server.
			dataType: "json",
			// beforeSend is called before the request is sent
			beforeSend: function() {
				$("#waitAmphur").html(loadingImage);
			},
			// success is called if the request succeeds.
			success: function(json){
				$("#waitAmphur").html("");
				// Iterate over a jQuery object, executing a function for each matched element.
				$.each(json, function(index, value) {
					// Insert content, specified by the parameter, to the end of each element
					// in the set of matched elements.
					 $("#selAmphur").append('<option value="' + value.AMPHUR_ID + 
											'">' + value.AMPHUR_NAME + '</option>');
				});
			}
		});
	});
	
	$('#selAmphur').change(function() {
		$("#selTumbon").html(defaultOption);
		$.ajax({
			url: "jsonAction.php",
			data: ({ nextList : 'tumbon', amphurID: $('#selAmphur').val() }),
			dataType: "json",
			beforeSend: function() {
				$("#waitTumbon").html(loadingImage);
			},
			success: function(json){
				$("#waitTumbon").html("");
				$.each(json, function(index, value) {
					 $("#selTumbon").append('<option value="' + value.DISTRICT_ID + 
											'">' + value.DISTRICT_NAME + '</option>');
				});
			}
		});
	});
});
</script>
<style type="text/css">
	body {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 13px;
	}
</style>

	<label>จังหวัด : </label>
    <select id="selProvince" class="form-control">
    	<option value=""> ------- เลือก ------ </option>
        <?php
			$result = mysql_query("
				SELECT
					PROVINCE_ID,
					PROVINCE_NAME
				FROM 
					province
				ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC;
			");
			
			while($row = mysql_fetch_assoc($result)){
				echo '<option value="', $row['PROVINCE_ID'], '">', $row['PROVINCE_NAME'],'</option>';
			}
		?>
    </select><span id="waitAmphur"></span>
    <br>
    <label>อำเภอ : </label>
    <select id="selAmphur" class="form-control">
    	<option value=""> ------- เลือก ------ </option>
    </select><span id="waitAmphur"></span>
    <br>
    <label>ตำบล : </label>
    <select id="selTumbon" class="form-control">
    	<option value=""> ------- เลือก ------ </option>
    </select><span id="waitTumbon"></span>