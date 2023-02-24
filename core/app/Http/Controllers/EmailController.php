<?php

namespace App\Http\Controllers;

use App\Models\Emailsetting;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class EmailController extends Controller
{
    //

    public static function send_email($from, $from_name, $subject, $body, $attachments = [], $cc = null) {
        
        $cs = Setting::first();
        $contactemail = $cs->contactemail;
        
        $mail = new PHPMailer(true);
        $em = Emailsetting::first();
        
        try {
            if ($em->is_smtp == 1) {
                $mail->isSMTP();

                $mail->Host       = $em->smtp_host;
                $mail->SMTPAuth   = true;
                $mail->Username   = $em->smtp_user;
                $mail->Password   = $em->smtp_pass;
                $mail->SMTPSecure = $em->email_encryption;
                $mail->Port       = $em->smtp_port;
            } 

            //Recipients
            $mail->setFrom($from, $from_name);
            $mail->addAddress("mwr167@gmail.com");

            // If there is a cc
            if ($cc) {
                $mail->addCC($cc);
            }

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            // Attachments
            foreach ($attachments as $attachment) {
                $mail->addAttachment($attachment['path'], $attachment['name']);
            }

            $mail->send();

        } catch (Exception $e) {
            // Literally do nothing, i guess.
        }

        //Session::flash('success', 'Mail send successfully');
    }
}
