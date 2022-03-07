<?php


define('DOT', '.');
require_once DOT . "/bootstrap.php";

//Home page//
$Route->add('/opay/', function () {

    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Opay Home");

    $Template->render("home");
}, 'GET');
//Home page//

//Contact
$Route->add('/opay/contact', function () {

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
$Route->add('/opay/contact', function () {

    $Template = new Apps\Template;
    $Core = new Apps\Core;

    $Data = $Core->data;
    $name = $Data->name;
    $email = $Data->email;
    $phone = $Data->phone;
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.diamondconceptpaygam.com'; // port 587                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'admin@diamondconceptpaygam.com';                     //SMTP username
        $mail->Password   = 'chidera';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
        $mail->Port       = 587;

        $mail->setFrom('admin@diamondconceptpaygam.com', 'Mailer');
        $mail->addAddress('admin@diamondconceptpaygam.com', 'Joe User');     //Add a recipient
        $mail->addAddress('obiefunamarcel@gmail.com');               //Name is optional
        $mail->addReplyTo('admin@diamondconceptpaygam.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $name;
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>' . $phone;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $sent = $mail->send();
        $Template->setError("Message sent", "success", "/opay/contact");
        $Template->redirect("/opay/contact");
    } catch (Exception $e) {
        $Template->setError("Message not sent : {$mail->ErrorInfo}", "warning", "/opay/contact");
        $Template->redirect("/opay/contact");
    }
}, 'POST');
//blog
$Route->add('/opay/blog', function () {

    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Opay Home");

    $Template->render("blog");
}, 'GET');

$Route->add('/opay/blog/{id}', function ($id) {

    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Opay Home");

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
