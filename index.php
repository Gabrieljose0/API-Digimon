<?php

$url = "https://digimon-api.vercel.app/api/digimon";
$json = file_get_contents($url);
$obj = json_decode($json);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>DIGIMON</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="navbar-toggler start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
             <a class="navbar-brand text-center m-auto" href="#"> DIGIMON </a> 
            <form class="d-flex" role="search" action="" method="POST">
                <input class="form-control me-2" type="get" placeholder="Pesquisar" aria-label="Search" id="pesquisa" name="pesquisa">
                <button class="btn btn-outline-success" type="submit"> Pesquisar </button>
            </form>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav"><br>
                    <li class="nav-item">
                        <a class="nav-link active end" aria-current="page" href="index.php"> INICIO </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>


    <img src="https://i0.wp.com/heroisx.com/wp-content/uploads/2020/02/Digimon-digiescolhidos-e-parceiros.jpg?fit=900%2C519&ssl=1"
        class="img-fluid" alt="..." style='margin-left: 22%; margin-right: 5%'><br><br>



    <div class="container text-center">
        <div class="row">

            <div class="progress ">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
            </div><br><br>

            <?php

if (isset($_POST['pesquisa'])) {

    $search = $_POST['pesquisa'];

    $url = "https://digimon-api.vercel.app/api/digimon/name/$search";
    $json = file_get_contents($url);
    $obj = json_decode($json);

    foreach ($obj as $resultado) {
        echo "

                <div class='col'>
                    <div class='card border-primary' style='width: 18rem;'>
                        <h3 class='card-title primary text-center'><b> $resultado->name </b></h3>
                        <hr>
                        <img src='$resultado->img' class='card-img-top' alt='...' style='padding: 2%; border-radius:5%'>
                        <div class='card-body'>
                            <button type='button' class='btn btn-info'> $resultado->level </button>
                        </div>
                    </div><br><br>
                </div>";
            }
        }
else{
    foreach ($obj as $resultado) {
        echo "

            <div class='col'>
                <div class='card border-primary' style='width: 18rem;'>
                    <h3 class='card-title primary text-center'><b> $resultado->name </b></h3>
                    <hr>
                    <img src='$resultado->img' class='card-img-top' alt='...' style='padding: 2%; border-radius:5%'>
                    <div class='card-body'>
                        <button type='button' class='btn btn-info'> $resultado->level </button>
                    </div>
                </div><br><br>
            </div>";
        }
}

            ?>


        </div>
    </div>

</body>

</html>