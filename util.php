<?php
function recordConsultancyPayment($pdo, $phone, $service, $amount, $status = "Initiated") {
    $sql = "INSERT INTO consultancy_payments (phone_number, service_selected, amount, transaction_status)
            VALUES (:phone, :service, :amount, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':phone'   => $phone,
        ':service' => $service,
        ':amount'  => $amount,
        ':status'  => $status
    ]);
}
?>