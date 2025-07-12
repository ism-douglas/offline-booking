<?php
require 'vendor/autoload.php';
require 'db.php';
require 'mpesa.php';
require 'utils.php';

$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$response = "";
$level = explode("*", $text);
$menu  = $level[0] ?? "";

if ($text == "") {
    $response = "CON Welcome to JengaBookings\n";
    $response .= "1. Consultancy\n";
    $response .= "2. Events\n";
    $response .= "3. Parking\n";
    $response .= "4. Travel";
}

else if ($menu == "1") {
    if (!isset($level[1])) {
        $response = "CON Choose a service:\n";
        $response .= "1. Service 1 - KES 2\n";
        $response .= "2. Service 2 - KES 5\n";
        $response .= "3. Service 3 - KES 10";
    } else {
        $services = [
            "1" => ["Service 1", 2],
            "2" => ["Service 2", 5],
            "3" => ["Service 3", 10]
        ];
        if (array_key_exists($level[1], $services)) {
            [$serviceName, $amount] = $services[$level[1]];
            sendSTKPush($phoneNumber, $amount);
            recordConsultancyPayment($conn, $phoneNumber, $serviceName, $amount);
            $response = "END STK Push sent for $serviceName. Check your phone to complete payment.";
        } else {
            $response = "END Invalid selection.";
        }
    }
}

else {
    $response = "END Feature coming soon.";
}

header('Content-type: text/plain');
echo $response;
?>