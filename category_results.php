
<?php
include "bootstrap.php";
include "include/header.php" ;

$category = new Category();
$subject = new Subject();
$user = new User();
$auction = new Auction();

$subjects = $subject->all();
$categories = $category->all();


$id = $_GET['id'];

$selected = $category->find($id);

$results = $subject->subjectsFromCategory($id);





?>

    <div class="text-center">

        <div class="row mb-5">
            <div class="col-4 text-left">
                <?php if(isset($_SESSION['email'])) : ?>
                    <a class="btn btn-success kupljeno_prodato" href="bought_sold.php">Kupljeno/Prodato</a><br>

                    <a href="my_auction.php" class=" btn btn-warning  text-danger rounded mt-3">Moje aukcije</a>
                <?php endif; ?>
            </div>
            <div class="col-4 mt-5">
                <b><p class="d-inline">Kategorije:</p></b><br>

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





    <h6 class="text-center">Kategorija: <?php echo $selected->name; ?></h6>
    <?php foreach ($results as $value) : ?>
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

                            <input class="w-25 mb-3" type="number" name="bid" value="<?php echo $biggest_offer->bid_price + 10; ?>">

                            <input type="hidden" name="">
                            <input class="btn btn-primary btn-sm w-25 mb-3" type="submit" name="send_offer" value="Ponudi"><br>
                            <span>Preostalo vreme:</span><br>
                            <span style="word-spacing: 35px;">Dani Sati Minuti Sekunde</span>
                        </form>
                    <?php endif; ?>
                    <div class="CountDown" data-date="<?php echo $value->duration ?>" style="width:90%;height: 90px;"> </div>
                    <script>
                        $(".CountDown").TimeCircles();
                    </script>

            </div>
        </div>
    <?php endforeach; ?>







