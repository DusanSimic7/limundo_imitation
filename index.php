<?php

include "bootstrap.php";


$user = new User();

if(isset($_SESSION['email'])){
    header("location:home_page.php");
}else{
    header("location:home_page.php");

}






