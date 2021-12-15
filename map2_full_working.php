<?php
error_reporting(0);
/*if(!empty($_POST)) {
    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . ($_POST['city'] ? $_POST['city'] : "51.4518462,7.0115717") . "&radius=" . ($_POST['radius'] ? $_POST['radius'] : "500") . "&type=" . ($_POST['amenity'] ? $_POST['amenity'] : "restaurant") . "&key=AIzaSyAFqAPWaxVQnJMkCBEHvlP1fIqevvgoN44";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

    $result = curl_exec($ch);
    curl_close($ch);

    $final_result = json_decode($result);

    $arr = array();
    if (!empty($final_result->results)) {
        $i = 0;
        foreach ($final_result->results as $result) {
            $arr[$i][0] = $result->name;
            $arr[$i][1] = $result->geometry->location->lat;
            $arr[$i][2] = $result->geometry->location->lng;
            $arr[$i][3] = $i + 1;
            $arr[$i][4] = $result->vicinity;

            $i++;
        }
    }
}*/

/*$arr[0][0] = 'Bondi Beach';
$arr[0][1] = -33.890542;
$arr[0][2] = 151.274856;
$arr[0][3] = 1;

$arr[1][0] = 'Coogee Beach';
$arr[1][1] = -33.923036;
$arr[1][2] = 151.259052;
$arr[1][3] = 2;

$arr[2][0] = 'Cronulla Beach';
$arr[2][1] = -34.028249;
$arr[2][2] = 151.157507;
$arr[2][3] = 3;*/

/*print_r($arr);
exit;*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAFqAPWaxVQnJMkCBEHvlP1fIqevvgoN44"
            type="text/javascript"></script>
</head>
<body>
<div id="map" style="width: 900px; height: 700px;float: left;border: 1px solid #000"></div>
<div style="padding: 10px;width: 300px;float: left;border: 1px solid #000">
    <form action="" method="post">
        <div>
            <div style="color: #ff0000">
                <?php if(!empty($_POST)): ?>
                    <?php if(empty($final_result->results)): ?>
                        No data available
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div style="width: 80px;float: left;margin-top: 20px">
                City:
            </div>
            <div style="width: 180px;float: left;margin-top: 20px">
                <select name="city">
                    <option value="">-- Select City --</option>
                    <option value="32.8205865,-96.8716376" <?php if($_POST['city']=='32.8205865,-96.8716376'): ?> selected<?php endif; ?>>Dallas</option>
                    <option value="33.1501878,-96.8978381" <?php if($_POST['city']=='33.1501878,-96.8978381'): ?> selected<?php endif; ?>>Frisco</option>
                    <option value="32.7017651,-97.2754981" <?php if($_POST['city']=='32.7017651,-97.2754981'): ?> selected<?php endif; ?>>Arlington</option>
                    <option value="29.8168824,-95.6814816" <?php if($_POST['city']=='29.8168824,-95.6814816'): ?> selected<?php endif; ?>>Houston</option>
                </select>
            </div>
        </div>

        <div>
            <div style="width: 80px;float: left;margin-top: 20px">
                Amenity:
            </div>
            <div style="width: 180px;float: left;margin-top: 20px">
                <select name="amenity">
                    <option value="">-- Select Amenity --</option>
                    <option value="bank" <?php if($_POST['amenity']=='bank'): ?> selected<?php endif; ?>>bank</option>
                    <option value="bar" <?php if($_POST['amenity']=='bar'): ?> selected<?php endif; ?>>bar</option>
                    <option value="book_store" <?php if($_POST['amenity']=='book_store'): ?> selected<?php endif; ?>>book_store</option>
                    <option value="cafe" <?php if($_POST['amenity']=='cafe'): ?> selected<?php endif; ?>>cafe</option>

                    <option value="clothing_store" <?php if($_POST['amenity']=='clothing_store'): ?> selected<?php endif; ?>>clothing_store</option>
                    <option value="department_store" <?php if($_POST['amenity']=='department_store'): ?> selected<?php endif; ?>>department_store</option>
                    <option value="drugstore" <?php if($_POST['amenity']=='drugstore'): ?> selected<?php endif; ?>>drugstore</option>
                    <option value="electronics_store" <?php if($_POST['amenity']=='electronics_store'): ?> selected<?php endif; ?>>electronics_store</option>
                    <option value="hospital" <?php if($_POST['amenity']=='hospital'): ?> selected<?php endif; ?>>hospital</option>
                    <option value="jewelry_store" <?php if($_POST['amenity']=='jewelry_store'): ?> selected<?php endif; ?>>jewelry_store</option>
                    <option value="movie_theater" <?php if($_POST['amenity']=='movie_theater'): ?> selected<?php endif; ?>>movie_theater</option>
                    <option value="night_club" <?php if($_POST['amenity']=='night_club'): ?> selected<?php endif; ?>>night_club</option>
                    <option value="park" <?php if($_POST['amenity']=='park'): ?> selected<?php endif; ?>>park</option>
                    <option value="pharmacy" <?php if($_POST['amenity']=='pharmacy'): ?> selected<?php endif; ?>>pharmacy</option>
                    <option value="primary_school" <?php if($_POST['amenity']=='primary_school'): ?> selected<?php endif; ?>>primary_school</option>
                    <option value="restaurant" <?php if($_POST['amenity']=='restaurant'): ?> selected<?php endif; ?>>restaurant</option>
                    <option value="secondary_school" <?php if($_POST['amenity']=='secondary_school'): ?> selected<?php endif; ?>>secondary_school</option>
                    <option value="shopping_mall" <?php if($_POST['amenity']=='shopping_mall'): ?> selected<?php endif; ?>>shopping_mall</option>
                    <option value="stadium" <?php if($_POST['amenity']=='stadium'): ?> selected<?php endif; ?>>stadium</option>
                    <option value="supermarket" <?php if($_POST['amenity']=='supermarket'): ?> selected<?php endif; ?>>supermarket</option>
                    <option value="tourist_attraction" <?php if($_POST['amenity']=='tourist_attraction'): ?> selected<?php endif; ?>>tourist_attraction</option>
                    <option value="university" <?php if($_POST['amenity']=='university'): ?> selected<?php endif; ?>>university</option>
                </select>
            </div>
        </div>

        <div>
            <div style="width: 80px;float: left;margin-top: 20px">
                Radius:
            </div>
            <div style="width: 180px;float: left;margin-top: 20px">
                <select name="radius">
                    <option value="">-- Select Radius --</option>
                    <option value="300" <?php if($_POST['radius']=='300'): ?> selected<?php endif; ?>>300</option>
                    <option value="500" <?php if($_POST['radius']=='500'): ?> selected<?php endif; ?>>500</option>
                    <option value="800" <?php if($_POST['radius']=='800'): ?> selected<?php endif; ?>>800</option>
                    <option value="1000" <?php if($_POST['radius']=='1000'): ?> selected<?php endif; ?>>1000</option>
                    <option value="1500" <?php if($_POST['radius']=='1500'): ?> selected<?php endif; ?>>1500</option>
                    <option value="2000" <?php if($_POST['radius']=='2000'): ?> selected<?php endif; ?>>2000</option>
                    <option value="5000" <?php if($_POST['radius']=='5000'): ?> selected<?php endif; ?>>5000</option>
                </select>
            </div>
        </div>

        <div>
            <div style="width: 80px;float: left;margin-top: 20px">
                &nbsp;
            </div>
            <div style="width: 180px;float: left;margin-top: 20px">
                <input type="submit" value="Find In Map">
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: new google.maps.LatLng(<?php echo ($_POST['city']?$_POST['city']:"51.4518462,7.0115717") ?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;

        $.get("http://localhost:8887/ARP_B_research/ajax/gmap_api_call.php?amenity=bank&count=0", function(data, status){
            var locations = JSON.parse(data);
            setTimeout(function() {
                $.get("http://localhost:8887/ARP_B_research/ajax/gmap_api_call.php?amenity=park&count=0", function(data1, status) {

                    var meta = JSON.parse(data1);



                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map,
                            icon: 'http://localhost:8887/ARP_B_research/images/stadium.png'
                        });

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]+"<br/>"+locations[i][4]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                    for (i = 0; i < meta.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(meta[i][1], meta[i][2]),
                            map: map,
                            icon: 'http://localhost:8887/ARP_B_research/images/park.png'
                        });

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(meta[i][0]+"<br/>"+meta[i][4]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                });
            },3000);
        });
    });
</script>
</body>
</html>