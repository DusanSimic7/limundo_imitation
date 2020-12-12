<?php


class User extends Database
{
    protected $table = "users";

    public function register($firstname, $lastname, $phone, $email, $password)
    {
        $this->query("INSERT INTO users (firstname, lastname, phone, email, password)
                            values(:firstname, :lastname, :phone, :email, :password)");
        $this->bind(":firstname", $firstname);
        $this->bind(":lastname", $lastname);
        $this->bind(":phone", $phone);
        $this->bind(":email", $email);

        if (strlen($password) < 8) {
            header("location:register.php?message5= Your password must be minimum 8 characters");
            exit();

        }
        $this->bind(":password", $password);

        $this->execute();

            $_SESSION['email'] = $email;
    }

    public function login($email, $password)
    {
        $this->query("SELECT * FROM users WHERE email = :email and password = :password");
        $this->bind(':email', $email);
        $this->bind(":password",$password);
        $result = $this->single();

        if($result){
            Session::set('email', $email);
            header("location:home_page.php");
        }else{
            header("location:login.php?message= you did not enter the correct password or email");
        }

    }

    public function update($firstname, $lastname, $email, $password, $id)
    {
        $this->query("UPDATE users SET firstname = :firstname, lastname = :lastname,
                            email = :email, password = :password WHERE id = :id ");

        $this->bind(":firstname", $firstname);
        $this->bind(":lastname", $lastname);
        $this->bind(":email", $email);

        if (strlen($password) < 8) {

            header("location:edit_user.php?message4=Your password must be minimum 8 characters");
            exit();
        }

        $this->bind(":password", password_hash($password, PASSWORD_DEFAULT));
        $this->bind(":id", $id);

        $this->execute();
    }



    public function current_user()
    {
        $email=$_SESSION['email'];
        $this->query("SELECT * FROM users WHERE email = '$email'");
        return $this->single();
    }


    public static function  is_auth($include){
        if(isset($_SESSION['email'])){
            include $include;
        }
        return  header("location:login.php");
    }




}