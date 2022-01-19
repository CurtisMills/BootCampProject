<?php


namespace App\Services\Sms;


use Illuminate\Support\Facades\Log;

class SmsGlobalSender implements SmsSender
{

    public function sendSms(string $mobile, string $message)
    {
        Log::info('Sending an SMS to mobile number: ' . $mobile);
        Log::info($message);
    }
}