<?php


define('DOT', '.');
require_once DOT . "/bootstrap.php";

//Home page//
$Route->add('/opay/', function () {
    
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title","Opay Home");

    $Template->render("home");

}, 'GET');
//Home page//

//Contact
$Route->add('/opay/contact', function () {
    
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title","Opay Contact");

    $Template->render("contact");

}, 'GET');

//blog
$Route->add('/opay/blog', function () {
    
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title","Opay Home");

    $Template->render("blog");

}, 'GET');

$Route->add('/opay/blog/{id}', function ($id) {
    
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title","Opay Home");

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
