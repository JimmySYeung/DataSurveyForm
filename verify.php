<html>

<head>

    <title>Filled information</title>
    <!-- Bootstrap -->
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <!-- Custom Stylesheet -->
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

</head>

<body>
    <center>
        <h1>Results verification page Jimmy Yeung</h1>
        <br> Welcome to verified form. This assignment was done for human-computer interaction purposes only.
        <br> Here were the submitted informations:
    </center>
    <br>
    <!-- The verified page will have our input informations. -->
    <div class="container center-div">
        <div class="container jumbotron jumbotron-fluid" id="main-container">
            <div class="container center-div">
                <div class="row">
                    <div class="col-md-5">
                        <!-- The output will display personal information. -->
                        <div class="row"><b>Full Name:</b> <?php echo $_POST["firstName"]; ?> <?php echo $_POST["lastName"]; ?></div><br>
                        <div class="row"><b>Address:</b> <?php echo $_POST["street"]; ?>, <?php echo $_POST["city"]; ?>, <?php echo $_POST["state"]; ?> <?php echo $_POST["zip"]; ?></div><br>
                        <div class="row"><b>Title:</b> <?php echo $_POST["title"]; ?></div><br>
                        <div class="row"><b>Monthly budget:</b> <?php echo $_POST["income"]; ?></div><br>
                        <div class="row"><b>Height:</b> <?php echo $_POST["feet"]; ?> ft, <?php echo $_POST["inches"]; ?> in</div><br>
                        <div class="row"><b>Services:</b> <?php
                                                            if ($_POST['checkboxService'] != '') {
                                                                foreach ($_POST['checkboxService'] as $value) {
                                                                    echo $value . '<br>';
                                                                }
                                                            }
                                                            ?>
                        </div><br>
                        <div class="row"><b>Phone:</b> <?php echo $_POST["phone"]; ?></div><br>
                        <div class="row"><b>E-mail:</b> <?php echo $_POST["email"]; ?></div><br>
                    </div>
                    <!-- The map displays the right side of user's input values.-->
                    <div id="map"></div>
                </div>

            </div>

        </div>
    </div>

    <script>
        //source: https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple
        //source: https://github.com/zipingH/csc642-forms/blob/master/csc642_forms/results.php
        // He has free copyright license, so I decide to reference his codes to. 
        // The whole script here displays map on my verified page.
        function initMap() {
            var myLatLng = {
                lat: 37.77493,
                lng: -82.41942
            };
            // myLatlng decides the zoom of the map. 
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: new google.maps.LatLng(44.5403, -78.5463),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var geocoder = new google.maps.Geocoder();

            geocodeAddress(geocoder, map);

            // marker determines the postion of the map.
            // The position of the map will be center on the location of us living there. 
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });

        }

        // The geocode needs our street address. 
        function geocodeAddress(geocoder, resultsMap) {
            // Creates address based on our living location.
            var address = "<?php echo $_POST["street"]; ?>" + ", " + "<?php echo $_POST["city"]; ?>" + ", " + "<?php echo $_POST["state"]; ?>" + ", " + "<?php echo $_POST["zip"]; ?>";
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- I am using google map key to show the google map on screen.-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCltIFdR4Oi-XcoM9p3BMcqdLBN1mAbMcU&callback=initMap">
    </script>
</body>

</html>