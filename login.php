<?php include 'include/header.php' ; ?>



<h5 class="text-center">Ako zelite da kreirate ponudu, morate da se ulogujete</h5>
<div class="jumbotron m-auto mb-3">
    <h1 class="text-center">Login</h1>


    <form action="LoginController.php" method="post">

        <div class="text-center mt-3">
            <label>Email</label><br>
            <input class="form-control m-auto login_input " type="email" name="email"><br>

            <label>Lozinka</label><br>
            <input class="form-control m-auto login_input" type="password" name="password">
            <span class="text-danger font-weight-bold"><?php if(isset($_GET['message'])) echo $_GET['message']; ?></span><br><br>

            <input type="submit" class="btn-lg btn-success" name="login" value="Ulaz"><br><br>

        </div>
    </form>

</div>




<?php include 'include/footer.php' ; ?>


