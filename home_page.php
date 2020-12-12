<?php include "bootstrap.php" ;?>

<?php include "include/header.php" ;?>

<?php


$subject = new Subject();
$auction = new Auction();
$category = new Category();
$boughtSold = new BoughtSold();
$user = new User();
$categories = $category->all();
$subjects = $subject->all();




?>






<div class="text-center">
    <?php if(isset($_GET['message'])) : ?>
            <?php echo '<p class="p-2 text-white bg-success d-inline-block rounded text-right mb-3">'.$_GET['message']." <b>". auth()->firstname."</b>".'</p>'; ?>
    <?php endif  ; ?>

    <?php if(isset($_GET['message1'])) : ?>
            <?php echo '<p class="p-2 text-white bg-danger d-inline-block rounded text-right mb-3">'.$_GET['message1']." <b>". auth()->firstname."</b>".'</p>'; ?>
    <?php endif  ; ?>

    <?php
    if(isset($_GET['item_sold'])) echo "<h6 class=\"p-2 text-white bg-success d-inline-block rounded text-right mb-3\">".$_GET['item_sold']."</h6>";
    ?>



    <div class="row mb-5">

    <div class="col-4 text-left">
        <?php if(isset($_SESSION['email'])) : ?>
            <a class="btn btn-success kupljeno_prodato" href="bought_sold.php">Kupljeno/Prodato</a><br>
            <a class="btn btn-warning  text-danger rounded mt-3" href="my_auction.php" >Moje aukcije</a>
        <?php endif; ?>

    </div>
    <div class="col-4 mt-3">
        <br><b><p class="d-inline">Kategorije:</p></b><br>
        (
        <?php foreach ($categories as $item) : ?>
            <a href="category_results.php?id=<?php echo $item->id; ?>"><?php echo $item->name; ?>,</a>
        <?php endforeach; ?>
        )
    </div>

    <div class="col-4 text-right">
        <?php if(isset($_SESSION['email'])) : ?>
            <div class=""><a class="btn btn-info btn-sm" href="edit_user.php">Izmeni podatke</a></div><br>

        <?php endif; ?>
    </div>


</div>


</div>



    <h6 class="text-center">Aktuelne ponude:</h6>

    <?php foreach ($subjects as $value) : ?>
        <?php $biggest_offer = $auction->biggestOfferPrice($value->name); ?>

        <?php $seller = $user->find($value->seller_id); ?>

    <div class="row  border border-warning mb-4">
        <div class="col-xl-3">
            <img style="height: 220px;width:220px;" class="image_mobilni" src="images/<?php echo $value->image ?>" alt="gde je slika">
        </div>
        <div class="col-xl-5">
            <b>Naziv:</b> <?php echo $value->name; ?><br>
            <b>Opis:</b> <?php echo $value->description; ?><br>
            <b>Nacin placanja:</b> <?php echo $value->method_of_payment; ?><br>
            <b>Nacin isporuke:</b> <?php echo $value->delivery; ?><br>
            <b>Prodavac:</b> <?php echo $seller->firstname." ".$seller->lastname;  ?>


        </div>
        <div class="col-xl-4">
           Pocetna: <?php echo $value->starting_price; ?> din.<br>

           Najveca: <?php if($biggest_offer != null){ echo $biggest_offer->bid_price;}else{echo "0";} ?> din.




            <?php if(isset($_SESSION['email'])) : ?>

            <form action="AuctionController.php" method="post" class="d-inline">
                <input type="hidden" name="seller" value="<?php echo $value->seller_id; ?>">
                <input type="hidden" name="name" value="<?php echo $value->name; ?>">
                <input type="hidden" name="starting_price" value="<?php echo $value->id; ?>">
                <input type="hidden" name="biggest_offer" value="<?php echo $biggest_offer->id; ?>">



                <?php
                if($biggest_offer != null){
                    $next_offer = $biggest_offer->bid_price + 10;
                }else{
                    $next_offer = $value->starting_price + 10;
                }
             ?>


                <input class="w-25 mb-3" type="number" name="bid" value="<?php echo $next_offer; ?>">
                <input class="btn btn-primary btn-sm w-25 mb-2" type="submit" name="send_offer" value="Ponudi"><br>

                <span>Preostalo vreme:</span><br>
                <span style="word-spacing: 35px;">Dani Sati Minuti Sekunde</span>

            </form>

            <?php endif; ?>

                    <div class="CountDown" data-date="<?php echo $value->duration ?>" style="width:90%;height: 90px;"> </div>
                    <script>
                        $(".CountDown").TimeCircles();
                    </script>


                <?php


                    if($value->duration <= date("Y-m-d H:i:s")){
                        if($biggest_offer != null){
                            $buyer = $user->find($biggest_offer->buyer_id);
                            $boughtSold->buys($biggest_offer->buyer_id, $biggest_offer->seller_id, $biggest_offer->name, $biggest_offer->bid_price);
                            $subject->deleteSubject($biggest_offer->name);
                            $auction->deleteSubject($biggest_offer->name);


                            header("location:home_page.php?item_sold=The item $biggest_offer->name is sold to $buyer->firstname $buyer->lastname");
                        }

                        if($biggest_offer == "0"){
                            $subject->deleteSubject($value->name);
                            $auction->deleteSubject($value->name);

                            header("location:home_page.php");
                        }
                    }

                 ?>


        </div>
    </div>
    <?php endforeach; ?>



