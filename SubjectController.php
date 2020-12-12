<?php
include "bootstrap.php";


$subject = new Subject();


if(isset($_POST['create'])){
    $errors=[];
    $data=[];

        $payment = implode(',', $_POST['payment']);
        $delivery = implode(',', $_POST['delivery']);
        $data['seller_id'] = auth()->id;
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $data['starting_price'] = $_POST['starting_price'];
        $data['category'] = $_POST['category'];
        $data['method_of_payment'] = $payment;
        $data['delivery'] = $delivery;
        $data['duration'] = $_POST['duration'];


        $data['image'] = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];

    if($image_size > 4997152){
        $errors[]='File size must be excately 4 MB';
    }else{

    }

    if(count($errors) == 0){
        move_uploaded_file($image_tmp,"images/".$data['image'],);

    }else{
        header("location:create_auction.php?message5=File size must be excately 4 MB");
    }


    if(!empty($data['name'] and $data['description'] and $data['starting_price'] and $data['category'] and $data['method_of_payment']
        and $data['delivery'] and $data['duration'])){

        $subject->createOffer($data);
        header("location:home_page.php?message1=Your auction is success");

    }else{

        header("location:create_auction.php?message=You did not enter all fields ");

    }

}

?>