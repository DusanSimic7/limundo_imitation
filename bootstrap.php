<?php

function __autoload($class){
    require "app/".$class.".php";
}
session_start();
ob_start();

function auth(){
    $user=new User();
    return $user->current_user();
}