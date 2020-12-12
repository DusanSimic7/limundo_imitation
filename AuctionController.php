<?php include "bootstrap.php";

$auction = new Auction();
$subject = new Subject();


if(isset($_POST['send_offer'])){
    $data=[];

    $subject_id = $_POST['starting_price'];
    $biggest_offer_id = $_POST['biggest_offer'];

    $subject_starting_price = $subject->find($subject_id);
    $subject_biggest_offer = $auction->find($biggest_offer_id);

   $str_price = $subject_starting_price->starting_price;
   $biggest_offer = $subject_biggest_offer->bid_price;

//    var_dump($biggest_offer);
//    die;

    $data['buyer_id'] = auth()->id;
    $data['seller_id'] = $_POST['seller'];
    $data['name'] = $_POST['name'];
    $data['bid_price'] = $_POST['bid'];

    if($biggest_offer != null){

        if($data['bid_price'] > $biggest_offer){
            if(auth()->id != $subject_biggest_offer->seller_id) {
                $auction->offer($data);
                header("location:home_page.php?message=Your offer is sended success");
            }else{
                header("location:home_page.php?message1=You can't send offers to yourself");
            }
        }else{
            header("location:home_page.php?message1=Your offer is less than needed");
        }

    }else{

        if($data['bid_price'] > $str_price){
            if(auth()->id != $subject_starting_price->seller_id) {
                $auction->offer($data);
                header("location:home_page.php?message=Your offer is sended success");
            }else{
                header("location:home_page.php?message1=You can't send offers to yourself");
            }
        }else{
            header("location:home_page.php?message1=Your offer is less than needed");
        }

    }

}

if(isset($_GET['cancel1'])){

    $id = $_GET['cancel1'];
    $name = $_GET['cancel2'];

    $subject->delete($id);

    $auction->deleteFromAuction($name);
    header("location:my_auction.php?message1=Your item is deleted");
}

?>