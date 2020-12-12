<?php include "bootstrap.php" ;?>

<?php include 'include/header.php' ; ?>



<div class="jumbotron m-auto mb-5">
    <h4 class="text-center text-danger"><?php if(isset($_GET['message'])){ $message = $_GET['message']; echo $message;}?></h4>

    <h1 class="text-center">Izmena podataka</h1>


    <form action="LoginController.php" method="post">

        <div class="text-center mt-3">
            <label>Ime</label><br>
            <input class="form-control m-auto login_input" type="text" name="firstname" value="<?php echo auth()->firstname; ?>"><br>

            <label>Prezime</label><br>
            <input class="form-control m-auto login_input" type="text" name="lastname" value="<?php echo auth()->lastname; ?>"><br>

            <label>Email</label><br>
            <input class="form-control m-auto login_input" type="email" name="email" value="<?php echo auth()->email; ?>"><br>

            <label>Password</label><br>
            <input class="form-control m-auto login_input" type="password" name="password" value="<?php echo auth()->password; ?>"><br>
            <span class="text-danger font-weight-bold"><?php if(isset($_GET['message4'])) echo $_GET['message4']; ?></span><br><br>


            <input type="submit" class="btn-lg btn-success" name="edit" value="Izmeni"><br>

        </div>
    </form>

</div>




<?php include 'include/footer.php' ; ?>


