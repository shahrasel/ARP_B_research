<?php
error_reporting(0);
if(!empty($_REQUEST)) {

    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . ($_REQUEST['city'] ? $_REQUEST['city'] : "32.915176,-97.371407") . "&radius=" . ($_REQUEST['radius'] ? $_REQUEST['radius'] : "2000") . "&type=" . ($_REQUEST['amenity'] ? $_REQUEST['amenity'] : "restaurant") . "&key=AIzaSyAFqAPWaxVQnJMkCBEHvlP1fIqevvgoN44";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

    $result = curl_exec($ch);
    curl_close($ch);

    $final_result = json_decode($result);

    $main_arr = array();
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
        echo json_encode($arr);
        //print_r($arr);
    }
}