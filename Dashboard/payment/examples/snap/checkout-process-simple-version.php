<?php
namespace Midtrans;

header("Content-Type: application/json");

require_once dirname(__FILE__) . '/../../Midtrans.php';

Config::$serverKey = 'SB-Mid-server-ZpnYQnjcvqTdaXgDeq8LCiqj';
Config::$clientKey = 'SB-Mid-client-w4EGD_9ik0zCpyPH';
Config::$isProduction = false;
Config::$isSanitized = Config::$is3ds = true;

try {
    // Retrieve JSON payload from the frontend
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data) {
        throw new \Exception("No data received");
    }

        // $order_id = 'ORDER-' . uniqid() . '-' . mt_rand(1000, 9999);


    $transaction = array(
        'transaction_details' => array(
            'order_id' => $data['order_id'],
            'gross_amount' => $data['gross_amount'],
        ),
        'customer_details' => $data['customer_details'],
        'item_details' => $data['item_details'],
    );

    // Generate Snap token
    $snap_token = Snap::getSnapToken($transaction);
    echo $snap_token;

} catch (\Exception $e) {
    http_response_code(500);
    echo 'Error: ' . $e->getMessage();
}