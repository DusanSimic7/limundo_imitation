<?php include "bootstrap.php" ;?>

<?php include "include/header.php" ;?>

<?php
if(!$_SESSION['email']){
    header("location:index.php");
}



$subject = new Subject();
$auction = new Auction();
$user = new User();





$offer_from_user = $auction->offerFromUser(auth()->id);


$subjects_from_user = $subject->subjectsOfProfile(auth()->id);


?>
    <h4 class="text-center text-danger mb-4"><?php if(isset($_GET['message'])) echo $_GET['message'] ; ?></h4>
    <h5 class="text-center mb-3">Vase aktuelne ponude:<?php if(isset($_SESSION['email'])) echo auth()->firstname; ?></h5>
    <?php foreach ($subjects_from_user as $value) : ?>
        <?php $biggest_offer = $auction->biggestOfferPrice($value->name);?>




        <div class="row  border border-warning mb-4">
            <div class="col-xl-4">
                <img style="height: 220px;" class="image_mobilni" src="images/<?php echo $value->image ?>" alt="gde je slika">
            </div>
            <div class="col-xl-5">
                <p style="font-size:21px" class="mb-2"><?php echo $value->name; ?></p>
                <?php echo $value->description; ?>

            </div>
            <div class="col-xl-3">
                <b>Pocetna:</b> <?php echo $value->starting_price; ?><br>

                <b>Najveca:</b><?php $biggest = ($biggest_offer !=null ) ? $biggest_offer->bid_price : " 0 din" ; echo $biggest ?>
                <a class="btn btn-danger btn-sm float-right mb-3" href="AuctionController.php?cancel1=<?php echo $value->id; ?>&cancel2=<?php echo $value->name; ?>">Otkazi aukciju</a>
            </div>
        </div>
    <?php endforeach; ?>
    <hr><hr><hr>


    <h5 class="text-center mb-3">Ponude od korisnika za vase predmete: <?php if(isset($_SESSION['email'])) echo auth()->firstname; ?></h5>
    <?php foreach ($offer_from_user as $value) : ?>
            <?php $buyer = $user->find($value->buyer_id); ?>



        <div class="row  border border-warning mb-4">
            <div class="col-xl-4 border text-center">
                <p class="mt-3"><a class="btn btn-info btn-sm" href="#"><?php echo $buyer->firstname.' '.$buyer->lastname  ?></a></p>

            </div>
            <div class="col-xl-5">
                <p style="font-size:21px" class="mb-2"><?php echo $value->name; ?></p>

            </div>
            <div class="col-xl-3">
                <b>Cena ponude:</b> <?php echo $value->bid_price; ?><br>
                <b>Datum ponude:</b> <?php echo $value->bid_date; ?>
                <?php if(isset($_SESSION['email'])) : ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>












