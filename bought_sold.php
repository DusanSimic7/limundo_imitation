
<?php include "bootstrap.php" ;?>

<?php include "include/header.php" ;?>

<?php


if(!$_SESSION['email']) {
    header("location:index.php");
}

$boughtSold = new BoughtSold();
$user = new User();

$bought = $boughtSold->buyer(auth()->id);
$sold = $boughtSold->seller(auth()->id);

?>
<h3 class="text-center mb-4">Vase kupovine:</h3>
<table class="table w-75 m-auto border">
    <tr><th>Naziv</th><th>Ime prodavca</th><th>Kontakt prodavca</th>
        <th>Cena</th><th>Vreme kupovine</th></tr>
<?php foreach ($bought as $value) : ?>
            <?php $seller = $user->find($value->seller_id); ?>

    <tr><td><?php echo $value->name; ?></td>
        <td><?php echo $seller->firstname.' '.$seller->lastname; ?></td>
        <td><?php echo $seller->phone; ?></td>
        <td><?php echo $value->final_price; ?> din.</td>
        <td><?php echo $value->time_of_purchase; ?></td></tr>

<?php endforeach; ?>
</table>

<h3 class="text-center mb-4 mt-5 ">Vase prodaje:</h3>
<table class="table w-75 m-auto border">
    <tr><th>Naziv</th><th>Ime kupca</th><th>Kontakt kupca</th>
        <th>Cena</th><th>Vreme prodaje</th></tr>
    <?php foreach ($sold as $value) : ?>
                <?php $buyer = $user->find($value->buyer_id); ?>
        <tr><td><?php echo $value->name; ?></td>
            <td><?php echo $buyer->firstname.' '.$buyer->lastname; ?></td>
            <td><?php echo $buyer->phone; ?></td>
            <td><?php echo $value->final_price; ?> din.</td>
            <td><?php echo $value->time_of_purchase; ?></td></tr>
    <?php endforeach; ?>
</table>
