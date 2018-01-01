<?php
namespace Org\PHPMailer;

// +----------------------------------------------------------------------
//PHPMailer 邮件发送类
// +----------------------------------------------------------------------
include("PHPMailerAutoload.php");
include("class.phpmailer.php");
include("class.smtp.php");

class PHPMailer
{
//    public function SendEmail($message,$sendTo)
//    {
//        //建立邮件发送类
//        $mail = new \PHPMailer();
//
//        $mail->CharSet="UTF-8";
//        $mail->isSMTP();
//        $mail->Host="smtp.163.com";
//        $mail->SMTPAuth=true;
//
//        $mail->Username="wp2381553155@163.com";
//        $mail->Password="WP20117238";
//
//        $mail->IsHTML(true);
//
//        //send email
//        $mail->From="wp2381553155@163.com";
//        $mail->FromName="云通讯录";
//        $mail->Subject="密码重置验证码";
//        // $mail->Body="亲爱的 请取回您的验证码  ".$message;
//        $mail->Body=$message;
//
//        //$mail->AddAddress($sendTo);
//        $mail->AddAddress($sendTo,"哈哈");
//        return $mail->send();
//    }


    public function SendEmail($fromName,$message,$subject,$sendToArray)
    {
        //建立邮件发送类
        $mail = new \PHPMailer();

        $mail->CharSet="UTF-8";
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host="smtp.163.com";
        $mail->SMTPAuth=true;
        $mail->Username="wp2381553155@163.com";
        $mail->Password="WP20117238";
        $mail->From="wp2381553155@163.com";
//        $mail->FromName="云通讯录";
//        $mail->Subject="密码重置验证码";
        //$mail->FromName=$fromName;

        $mail->FromName=$fromName;
        $mail->Subject=$subject;
        $mail->Body=$message;

        foreach ($sendToArray as $value)
        {
            $mail->AddAddress($value,"亲爱的");
            echo $value;
        }

        return $mail->send();
    }
}
