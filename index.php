<?php
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$response = "";
$level = explode("*", $text);
$menu = isset($level[0]) ? $level[0] : "";

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
        $service = $level[1];
        switch ($service) {
            case "1":
                $response = "END You selected Service 1. You’ll receive an SMS with payment instructions for KES 2.";
                break;
            case "2":
                $response = "END You selected Service 2. You’ll receive an SMS with payment instructions for KES 5.";
                break;
            case "3":
                $response = "END You selected Service 3. You’ll receive an SMS with payment instructions for KES 10.";
                break;
            default:
                $response = "END Invalid service choice.";
        }

        // 🔔 TODO: Add code here to trigger M-Pesa payment push or send SMS via API
    }
}

// Other menus (Events, Parking, Travel)
else if ($menu == "2") {
    $response = "END Event ticketing coming soon!";
} else if ($menu == "3") {
    $response = "END Parking reservation not yet active.";
} else if ($menu == "4") {
    $response = "END Travel bookings will open next week.";
} else {
    $response = "END Invalid choice. Try again.";
}

header('Content-type: text/plain');
echo $response;
?>