<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class Mail{
    function sendOTP($email)
    {
            $mail = new PHPMailer(true);
            try{
                $mail->IsSMTP();
                $mail->Host = '	n3plcpnl0050.prod.ams3.secureserver.net';
                $mail->SMTPSecure = 'ssl';
                $mail->Username = 'help@itarimusic.com';
                $mail->Password = 'ProtonMail.com@157';
                $mail->Port = 465;
                $mail->SMTPAuth = true;
                
                
                
                $mail->setFrom('help@itarimusic.com', 'Itari-Music');
                $mail->addAddress($email);
                $realotp=mt_rand(100000,999999);
                
                
                
                
                $mail->isHTML(true);
                $mail->Subject = 'Authorize log-in';
                $mail->Body    = '<span style="background:rgb(66,64,61);color:white;font-size:150%;padding:4%">Your Verification code is: '.$realotp.'</span>';
                $mail->AltBody = 'Your Verification code is: '.$realotp;
                
                $mail->send();
                return $realotp;     //Will be used next page for otp verification
            }catch (Exception $e) {
            
            // $_SESSION['msg'] = "An unexpected occured please try again,<br/> if still getting problem let us know from <a href='Contact_us.php'style='color:red'>contact us";
            header('Location:SignUp.php');
        }
    }
    function sendSupport($email,$name,$reason,$complain,$msg)
    {
        $mail = new PHPMailer(true);
        try {
           $mail->IsSMTP();
                $mail->Host = '	n3plcpnl0050.prod.ams3.secureserver.net';
                $mail->SMTPSecure = 'ssl';
                $mail->Username = 'help@itarimusic.com';
                $mail->Password = 'ProtonMail.com@157';
                $mail->Port = 465;
                $mail->SMTPAuth = true;
            
            
            
            $mail->setFrom('itarimusic@yahoo.com', 'Itari-Music');
            $mail->addAddress('supportcare@protonmail.com');
            
            
            
            $mail->isHTML(true);
            $mail->Subject = $email;
            $mail->Body    = "Email from ".$email."<br/>
                              Name ".$name."<br/>
                              Complain Number ".$complain."<br/>
                              ".$msg;
            $mail->AltBody = "Email from ".$email."<br/>
                              Name ".$name."<br/>
                              Complain Number ".$complain."<br/>
                              ".$msg;
            $mail->send();
        }catch (Exception $e) {
            echo $e->getMessage();
            // $_SESSION['msg'] = "An unexpected occured please try again,<br/> if still getting problem let us know from <a href='Contact_us.php' style='color:red'>contact us";
            header('Location:SignUp.php');
        }
        // sending autoreply msg from our server
        
        $mail = new PHPMailer(true);
        try {
            $mail->IsSMTP();
                $mail->Host = '	n3plcpnl0050.prod.ams3.secureserver.net';
                $mail->SMTPSecure = 'ssl';
                $mail->Username = 'help@itarimusic.com';
                $mail->Password = 'ProtonMail.com@157';
                $mail->Port = 465;
                $mail->SMTPAuth = true;
            
            $mail->setFrom('itarimusic@yahoo.com', 'Itari-Music');
            $mail->addAddress($email);
            
            
            
            $mail->isHTML(true);
            $mail->Subject = $reason;
            $mail->Body    = "Dear ".$name.",<br/>Thank you for contacting Itari-Music. Your Complain Number is".$complain.". Your query will be resolved within 3-4 working days.";
            $mail->AltBody = "Thank you for contacting Itari-Music. Your Complain Number is".$complain.". Your query will be resolved within 3-4 working days.";;
            $mail->send();
            header('Location:Resources/ComplainSend.php');     
        }catch (Exception $e) { 
            echo $e->getMessage();
            // $_SESSION['msg'] = "An unexpected occured please try again,<br/> if still getting problem let us know from <a href='Contact_us.php' style='color:red'>contact us";
            header('Location:SignUp.php');
        }
    }
    
}

?>