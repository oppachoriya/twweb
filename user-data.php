<?php
/**
 * Created by PhpStorm.
 * User: Piyusht
 * Date: 8/4/2017
 * Time: 7:44 PM
 */

function getUserData(){
    $data = new \stdClass;
    $data->guid = "{BA2B9813-7FE4-4A87-ABFF-33026DD43545}";
    $data->firstname = "Mark";
    $data->lastname = "J";
    $data->userid = "mark";
    $data->company = "Tradeweb";
    $data->email = "mark10@tradeweb.com";
    return $data;
}