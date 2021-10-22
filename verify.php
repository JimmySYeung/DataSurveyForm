<html>
<title>Filled information</title>
    <head>

        <title>Filled information</title>
        <!-- Bootstrap -->
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">

        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>
<body>  
	<center><h1>Filled Information Page</h1></center>
	<br>
<div class="container center-div">
    <div class="container jumbotron jumbotron-fluid" id="main-container">
        <div class="container center-div">
	<h2>Hello <?php echo $_POST["firstName"]; ?>,</h2><h3> here is the information you have entered: </h3><br>
	<div class="row">
		<div class="col-md-5">
	<div class="row"><b>Full Name:</b> <?php echo $_POST["firstName"]; ?> <?php echo $_POST["lastName"]; ?></div><br>
	<div class="row"><b>Address:</b> <?php echo $_POST["address"]; ?></div><br>
	<div class="row"><b>Education Status:</b> <?php echo $_POST["education"]; ?></div><br>
	<div class="row"><b>Monthly budget:</b> <?php echo $_POST["income"]; ?></div><br>
    <div class="row"><b>Height:</b> <?php echo $_POST["feet"]; ?> ft, <?php echo $_POST["inches"]; in.?></div><br>
	<div class="row"><b>Phone:</b> <?php echo $_POST["phone"]; ?></div><br>
	<div class="row"><b>E-mail:</b> <?php echo $_POST["email"]; ?></div><br>

<div id="gmap_canvas">Loading map...</div>
		</div>
	</div><br><br><br><br>
</div></div>
<?php 
// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyCq07b_Vr7f_XiOLd2aev-rq33E_2i2ItI";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
?>
</body>
<?php
if($_POST){
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['address']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
                     
    ?>
 
    <!-- google map will be shown here -->
 
    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCq07b_Vr7f_XiOLd2aev-rq33E_2i2ItI"></script>  

    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>
</html>