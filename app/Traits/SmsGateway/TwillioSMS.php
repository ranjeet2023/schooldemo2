<?php
namespace App\Traits\SmsGateway;

use Twilio\Rest\Client;


trait TwillioSMS{

    /*Twilio SMS*/
    public function twilioSMS($contactNumbers, $message)
    {
        // Update the path below to your autoload.php,
        // see https://getcomposer.org/doc/01-basic-usage.md
        require_once base_path() .'\vendor\twilio\sdk\Twilio\autoload.php';

        // Your Account Sid and Auth Token from twilio.com/console

        /*get Setting*/
        $smsSetting = $this->getSmsSetting();
        $sms = json_decode($smsSetting['Twilio'],true);
        $sid    = $sms['SID'];
        $token  = $sms['Token'];
        $from  = $sms['FromNumber'];
        $contactNumbers = explode(',', $contactNumbers);
        $message = $message;
        $twilio = new Client($sid, $token);
        foreach($contactNumbers as $contact) {
            // $message = $twilio->messages
            // ->create("+916388780536", // to
            //   array(
            //     "from" => "+12059533997",
            //     "body" => 'this is message that are great to you meeting'
            //   )
            // );
            // $message = $twilio->messages
            //     ->create('+91'.$contact,
            //         array(
            //             "body" => $message,
            //             "from" => $from
            //         )
            //     );
            $message = $twilio->messages
            ->create("whatsapp:+91".$contact, // to
                array(
                "from" => "whatsapp:+14155238886",
                "body" => $message
                )
            );

        }
    }

}