<?php

namespace Floky\Facades;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;


class Email
{

    private $mail;

    private array $config = [];

    public function __construct() {

        $this->mail = new PHPMailer(true);

        $this->config = config('mail');

        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      
        $this->mail->isSMTP();                                            
        $this->mail->Host       = $this->config['host'];                    
        $this->mail->SMTPAuth   = true;                                   
        $this->mail->Username   = $this->config['username'];                     
        $this->mail->Password   = $this->config['password'];                               
        $this->mail->SMTPSecure = $this->config['encryption'];           
        $this->mail->Port       = $this->config['port'];

        //Recipients
        $this->mail->setFrom($this->config['from'], env('APP_NAME'));
    
    }

    public function setDebugLevel(int $level) {

        $this->mail->SMTPDebug = $level;
        return $this;
    }
    
    public function isHtml(bool $value) {

        $this->mail->isHTML($value);
        return $this;
    }

    public function from(string $from) {

        $this->mail->setFrom($from);
        return $this;
    }

    public function altBody(string $altBody) {

        $this->mail->AltBody = $altBody;
        return $this;
    }

    public function attachement(string $path) {

        $this->mail->addAttachment($path);
        return $this;
    }

    public function replyTo(string $address) {

        $this->mail->addReplyTo($address);
        return $this;
    }

    public function sendMail(array $recipients, string $subject, string $body, bool $addCC = false) {

        try {

            foreach($recipients as $recipient) {

                if($addCC) $this->mail->addCC($recipient);
                else $this->mail->addBCC($recipient);
            }
    
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            return $this->mail->send();

        } catch (PHPMailerException $e) {

            throw new Exception($e->getMessage(), 4400);
        }
    }

}