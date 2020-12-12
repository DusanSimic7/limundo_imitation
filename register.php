<?php include 'include/header.php' ; ?>



<h5 class="text-center">Ako zelite da keirate aukciju, morate se registovati</h5>
<div class="jumbotron m-auto mb-5">
    <h4 class="text-center text-danger"><?php if(isset($_GET['message'])){ $message = $_GET['message']; echo $message;}?></h4>

    <h1 class="text-center">Registracija</h1>


    <form action="LoginController.php" method="post">

        <div class="text-center mt-3">
            <label>Ime</label><br>
            <input class="form-control m-auto login_input" type="text" name="firstname"><br>

            <label>Prezime</label><br>
            <input class="form-control  m-auto login_input" type="text" name="lastname"><br>

            <label>Telefon</label><br>
            <input class="form-control  m-auto login_input" type="text" name="phone"><br>

            <label>Email</label><br>
            <input class="form-control  m-auto login_input" type="email" name="email"><br>

            <label>Lozinka</label><br>
            <input class="form-control  m-auto login_input" type="password" name="password"><br>
            <span class="text-danger font-weight-bold"><?php if(isset($_GET['message5'])) echo $_GET['message5']; ?></span><br><br>


            <input type="submit" class="btn-lg btn-success" name="register" value="Registruj se"><br>

        </div>
    </form>

</div>




<?php include 'include/footer.php' ; ?>


