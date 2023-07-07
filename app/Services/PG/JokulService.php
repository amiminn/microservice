<?php

namespace App\Services\PG;

use App\Services\Response;
use App\Services\System\HttpService;
use Illuminate\Support\Str;

class JokulService
{
    public static $base_url = "https://api-sandbox.doku.com";
    public static $clientId = 'BRN-0298-1677780270511';
    public static $secretKey = 'SK-g1NfRvQ0UTDpMymkmSH0';

    public static $path = '/mandiri-virtual-account/v2/payment-code';
    public static $check_per_invoice = false;

    public static $expired_time = 60 * 70;

    public static function dateF()
    {
        $dateTime = gmdate("Y-m-d H:i:s");
        $isoDateTime = date(DATE_ISO8601, strtotime($dateTime));
        return substr($isoDateTime, 0, 19) . "Z";
    }

    public static function req_body()
    {
        $order  =  [
            "amount" => 20000, # 20000,
            "invoice_number" => 'inv-' . Str::random(20), #rand(),
        ];

        $virtual_account_info = [
            "expired_time" => self::$expired_time,
            "reusable_status" => false,

            'info1' => 'Hamzah Store',
            'info2' => 'Thank you for shopping',
            'info3' => 'on our store',
        ];

        $customer = [
            "name" =>  "amri",
            "email" =>  "admin@gmail.com",
        ];

        return compact(
            'order',
            'virtual_account_info',
            'customer',
        );
    }

    public static function generate_digest()
    {
        return base64_encode(hash('sha256', json_encode(self::req_body()), true));
    }

    public static function prepare_signature_componen($request_id)
    {
        if (self::$check_per_invoice) {
            return "Client-Id:" . self::$clientId . "\n" .
                "Request-Id:" .  $request_id . "\n" .
                "Request-Timestamp:" . self::dateF();
        } else {
            return "Client-Id:" . self::$clientId . "\n" .
                "Request-Id:" .  $request_id . "\n" .
                "Request-Timestamp:" . self::dateF() . "\n" .
                "Request-Target:" .   self::$path . "\n" .
                "Digest:" . self::generate_digest();
        }
    }

    public static function generate_signature($request_id)
    {
        return base64_encode(hash_hmac('sha256', self::prepare_signature_componen($request_id), self::$secretKey, true));
    }

    public static function hit_doku()
    {
        $request_id = Response::epoch();

        $header = [
            'Content-Type' => 'application/json',
            'Client-Id' => self::$clientId,
            'Request-Id' => $request_id,
            'Request-Timestamp' =>  self::dateF(),
            'Signature' => "HMACSHA256=" . self::generate_signature($request_id),
        ];

        return HttpService::post(self::$base_url . self::$path, self::req_body(), $header);
    }
}
