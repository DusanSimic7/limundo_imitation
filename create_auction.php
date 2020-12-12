<?php include "bootstrap.php";  ?>

<?php include 'include/header.php' ; ?>

<?php
if(!$_SESSION['email']) {
    header("location:index.php");
}
$category = new Category();
$categories = $category->all();

;?>

        <h4 class="text-center text-danger"><?php if(isset($_GET['message'])){ $message = $_GET['message']; echo $message;}?></h4>
        <h4 class="text-center text-danger"><?php if(isset($_GET['message5'])){ $message = $_GET['message5']; echo $message;}?></h4>




<div class="border rounded p-2">
    <h5 class="">Unesite nov predmet</h5><br>


    <form style="margin:auto;" action="SubjectController.php" method="post" enctype="multipart/form-data">



         <div class="m-auto"><b>Naziv</b> <input class="form-control w-50 m-auto" type="text" name="name"><br>

         </div><br>
            <p class=""><b>Opis predmeta</b></p>
            <textarea class="form-control w-75 m-auto " name="description" cols="20" rows="5"></textarea><br>


            <b><p class="">Slika predmeta</p></b>
            <input type="file" name="image" class="form-control  w-50"><br><br>

            <div>
                <b><p>Odredite kategoriju predmeta</p></b>
                <select name="category" class="selekt form-control mb-3"><br>
                    <option value="0">Izaberite ovde</option>
                    <?php foreach ($categories as $value) : ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                    <?php endforeach; ?>

                </select>

            </div>
            <br><br>

            <h5>Nacin placanja i dostave</h5><br>


            <div style="margin:auto;" class="row text-center">

                <div class="col-5">

                        <b><p>Nacin placanja</p></b>
                        <input type="checkbox" name="payment[]" value="Tekuci racun(pre slanja)" class="form-check-input">
                        <label for="">Tekuci racun(pre slanja)</label><br>
                        <input type="checkbox" name="payment[]" value="PostNet(pre slanja)"  class="form-check-input">
                        <label for="">postNet(pre slanja)</label><br>
                        <input type="checkbox" name="payment[]" value="Pouzecem" class="form-check-input">
                        <label for="">Pouzecem</label><br>
                        <input type="checkbox" name="payment[]" value="Licno" class="form-check-input">
                        <label for="">Licno</label><br>


                </div>

                <div class="col-5 text-center">

                        <b><p>Nacin isporuke</p></b>
                        <input type="checkbox" name="delivery[]" value="AKS" class="form-check-input">
                        <label for="">AKS</label><br>
                        <input type="checkbox" name="delivery[]" value="BEKS"  class="form-check-input">
                        <label for="">BEKS</label><br>
                        <input type="checkbox" name="delivery[]" value="City Express" class="form-check-input">
                        <label for="">City Express</label><br>
                        <input type="checkbox" name="delivery[]" value="Posta" class="form-check-input">
                        <label for="">Posta</label><br>

                </div>


            </div>
            <br><br>

            <h5 class="text-center">Postavi aukciju</h5><br>

            <div class="row w-75 m-auto">

                <div class="col-sm-5">
                    <label class="mb-2 font-weight-bold">Pocetna cena</label>
                    <input class="form-control mb-3" type="number" name="starting_price" placeholder="Unesite cenu">

                </div>

                <div class="col-sm-5">
                   <b> <label>Trajanje aukcije</label></b>
                    <input type="date" value="" name="duration" class=" form-control m-auto">

                </div>


            </div>
            <br><br>

            <div class="text-center "><input type="submit" name="create" value="POKRENI" class="btn btn-success btn-lg  mb-3"></div>


    </form>

</div>




<?php include 'include/footer.php' ; ?>



