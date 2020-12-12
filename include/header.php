<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Limundodemo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="jquery-3.5.1.min.js"></script>
    <script src="TimeCircles.js"></script>
    <link rel="stylesheet" href="TimeCircles.css">
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>
<body>

<div  class="container">
    <div class="header mb-4">

        <nav class="navbar navbar-light bg-light m-auto">
            <div class="m-auto ">
                <a class="navbar-brand text-info" href="index.php">Pocetna</a>


                    <?php if(isset($_SESSION['email'])) : ?>
                        <a class="navbar-brand text-info" href="create_auction.php">Kreiraj aukciju</a>
                        <a class="navbar-brand text-info" href="logout.php">Izloguj se</a>

                    <?php else: ;?>
                        <a class="navbar-brand text-info" href="login.php">Ulaz</a>
                        <a class="navbar-brand text-info" href="register.php">Registracija</a>
                    
                    <?php endif ;?>
                <div class="d-inline">
                    <form class="d-inline forma_search" action="search_results.php" method="get">

                        <input class="form-control w-25 d-inline input_search" type="text" name="search" placeholder="pronadji">
                        <input class="btn btn-success d-inline" type="submit" name="find" value="Pronadji">
                        <?php if(isset($_SESSION['email'])) : ?>
                       <div class="d-inline"> <p class="ml-3 mt-2 d-inline">Korisnik: <b><span style="font-size:18px;color:gray;"><?php echo auth()->firstname ?></span></b> </p></div>
                        <?php endif ;?>

                    </form>
                </div>





            </div>


        </nav>

    </div>
    <hr>
