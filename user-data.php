<?php
/**
 * Created by PhpStorm.
 * User: Piyusht
 * Date: 8/4/2017
 * Time: 7:44 PM
 */

function getUserData(){
    $data = new \stdClass;
    $data->guid = $_GET['guid']? $_GET['guid']:"{BA2B9813-7FE4-4A87-ABFF-33026DD43545}";
    $data->firstname = $_GET['firstname']?$_GET['firstname']:"Mark";
    $data->lastname = $_GET['lastname']?$_GET['lastname']:"J";
    //$data->userid = $_GET['userid']?$_GET['userid']:"mark";
    $data->userid= "mark";
    //$data->company = $_GET['company']?$_GET['company']:"Tradeweb";
    $data->company = "Tradeweb";
    $data->email = $_GET['email']?$_GET['email']:"mark10@tradeweb.com";
    return $data;
}