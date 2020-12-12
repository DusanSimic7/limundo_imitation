<?php include "bootstrap.php";

$user = new User();



if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    $user->login($email, $password);

}

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($firstname and $lastname and $phone and $email and $password)){

        if($user->checkEmail($email) == 1){
            header("location:register.php?message=Email already exists");

        }else{
            $user->register($firstname, $lastname, $phone, $email, $password);
            header("location:home_page.php?message=Your registration is successfuly");
        }

    }else{
        header("location:register.php?message=You not enter all fields");
    }

}

if(isset($_POST['edit'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = auth()->id;

    if(!empty($firstname and $lastname and $email and $password)){
        $user = new User();

        $user->update($firstname, $lastname, $email, $password, $id);
        header("location:home_page.php?message=You have successfully changed data");

    }else{
        header("location:register.php?message=You not enter all fields");
    }
}



?>


