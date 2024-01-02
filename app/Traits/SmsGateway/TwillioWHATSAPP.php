<?php
namespace App\Traits\SmsGateway;

use Twilio\Rest\Client;


trait TwillioWHATSAPP{

    /*Twilio SMS*/
    public function TwillioWHATSAPP($contactNumbers, $message)
    {
        // Update the path below to your autoload.php,
        // see https://getcomposer.org/doc/01-basic-usage.md
        require_once base_path() .'\vendor\twilio\sdk\src\Twilio\autoload.php';

        // Your Account Sid and Auth Token from twilio.com/console

        /*get Setting*/
        $whatsappSetting = $this->getWhatsappSetting();
        $whatsapp = json_decode($whatsappSetting['Twilio'],true);
        $sid    = $whatsapp['SID'];
        $token  = $whatsapp['Token'];
        $from  = $whatsapp['FromNumber'];
        $contactNumbers = explode(',', $contactNumbers);
        $message = $message;
        $twilio = new Client($sid, $token);
        foreach($contactNumbers as $contact) {
            $message = $twilio->messages
            ->create("whatsapp:+91".$contact, // to
                array(
                "from" => "whatsapp:".$from,
                "body" => $message
                )
            );
        }
    }

}