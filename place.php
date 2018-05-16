<?php
require 'classes/Categories.php';
require 'classes/Cities.php';
require 'classes/Places.php';

$c = new Categories();
$ci = new Cities();
$p = new Places();

$cities = $ci->getCities();

if(isset($_GET['filter']) && $_GET['filter'] == true) {
  if(isset($_GET['city'])){
    $places = $p->getPlacesForCity($_GET['city']);
  } elseif(isset($_GET['category'])){
    $places = $p->getPlacesForCategory($_GET['category']);
  } else {
    $places = $p->getPlaces();
  }
} else {
  $places = $p->getPlaces();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Guide Araripe</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

  <header>
    <div class="jumbotron text-center" style="background-color: #16a085">
      <h1 id="title">Guide Araripe</h1>
      <div class="container form">
        <form class="form">
          <div class="form-group">
            <input type="text" class="form-control input-lg" placeholder="Buscar locais e empresas">
          </div>
        </form>
      </div>
    </div>
  </header>

  <section>
    <div class=container>
      <div class="col-md-3">
        <h1> Filtros</h1><br>
        <ul class="list-group">
          <?php foreach ($cities as $city): ?>
            <a href="place.php?filter=true&city=<?=$city['alias']?>" type="button" class="list-group-item">
            <span class="badge">
              <?=$p->countPlacesCity($city['alias'])?>
            </span>
            <?=ucfirst($city['name'])?></a>
          <?php endforeach; ?>
        </ul>

        <button href="place-add.php" class="btn btn-add btn-lg btn-block">Cadastrar Empresa</button>
      </div>

      <div class="col-md-9">
        <h1> Locais </h1><br>
        <div class="container-categories">
          <?php foreach($places as $place) : ?>

            <?php if($place === []) :?>
              <div>
                <h2>Nenhum local encontrado</h2>
              </div>
            <?php else :?>
              <div class="card col-md-4">
                <a href="place.php?>">
                  <div class="card-img" style="background-image: url(assets/img/categories/<?=$place['image']?>)">
                    <h2 class="card-title"><?=$place['name']?></h2>
                  </div>
                </a>
              </div>
            <?php endif;?>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
