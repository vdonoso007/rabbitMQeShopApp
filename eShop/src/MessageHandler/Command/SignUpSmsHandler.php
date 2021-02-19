<?php
namespace App\MessageHandler\Command;

use App\Message\Command\SignUpSms;

class SignUpSmsHandler {

    private $signUpSms;

    public function __invoke(SignUpSms $signUpSms)
    {
        var_dump($signUpSms);
        $this->signUpSms = $signUpSms;
        //connect to api of external sms service provider
    }
}