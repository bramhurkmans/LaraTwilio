<?php

namespace Spinnov\LaraTwilio;

use Twilio\Rest\Client;

class LaraTwilio
{
    /** @var Twilio\Rest\Client */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function notify(string $number, string $message)
    {
        return $this->client->messages->create($number, [
            'from' => config('laratwilio.sms_from'),
            'body' => $message,


        ]);
    }

    public function sendVerification(string $phone_number)
    {
        return $this->client->verify->v2->services(config('laratwilio.verify_service_id'))
        ->verifications
        ->create($phone_number,"sms");
    }

    public function checkVerification(string $phone_number, string $code)
    {
        return $this->client->verify->v2->services(config('laratwilio.verify_service_id'))
        ->verificationChecks
        ->create($code, // code
                ["to" => $phone_number]
        );
    }
}
