<?php


namespace App\Services\Sms;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class VoodooSmsSender implements SmsSender

{
    public function sendSms(string $mobile, string $message)
    {
        Log::info('Using Voodoo to send SMS');

        $apiKey = env('VOODOO_API_KEY');

        $response = Http::withHeaders([
            'Authorization' => $apiKey
        ])->post('https://api.voodoosms.com/sendsms', [
            'to' => $mobile,
            'from' => 'Trovalo',
            'msg' => $message
        ]);

        Log::info($response);
    }
}