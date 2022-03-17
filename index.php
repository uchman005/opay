<?php


define('DOT', '.');
require_once DOT . "/bootstrap.php";

//Home page//
$Route->add('/', function () {

    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Opay Home");

    $Template->render("home");
}, 'GET');
//Home page//

//Contact
$Route->add('/contact', function () {

    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Opay Contact");

    $Template->render("contact");
}, 'GET');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$Route->add('/contact', function () {

    $Template = new Apps\Template;
    $Core = new Apps\Core;

    $Data = $Core->data;
    $name = $Data->name;
    $email = $Data->email;
    $phone = $Data->phone;
    $message = $Data->message . "\n";
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = mail_server;                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = mailer;                     //SMTP username
        $mail->Password   = mail_pass;
        $mail->SMTPSecure = protocol;             //Enable implicit TLS encryption
        $mail->Port       = mail_port;

        $mail->setFrom(mail_from, 'Web site');
        $mail->addAddress('diamondconceptpaygam@gmail.com');     //Add a recipient
        $mail->addAddress('obiefunamarcel@gmail.com');               //Name is optional
        $mail->addReplyTo($email, 'Information');

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Enquiry from Website";
        $mail->Body    = $message. "From: ".$name. "\n Phone: " . $phone;
        $mail->AltBody = $message. " From: ".$name. "\n Phone: " . $phone;

        $mail->send();
        $Template->setError("Message sent", "success", "/contact");
        $Template->redirect("/contact");
    } catch (Exception $e) {
        $Template->setError("Message not sent : {$mail->ErrorInfo}", "warning", "/contact");
        $Template->redirect("/contact");
    }
}, 'POST');
//blog
$Route->add('/blog', function () {

    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Opay Home");

    $Template->render("blog");
}, 'GET');

$Route->add('/blog/{id}', function ($id) {

    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Opay Home");
    $Template->assign("id", $id);
    $Template->render("blog-single");
}, 'GET');

//Logout Sessions//
$Route->add(
    '/auth/logout',
    function () {
        $Template = new Apps\Template;
        $Template->expire();
        $Template->cleanAll(session_delete_timout);
        $Template->redirect(auth_url);
    },
    'GET'
);
//Logout Sessions//



$Route->run('/');
