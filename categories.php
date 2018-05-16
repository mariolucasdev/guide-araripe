<?php
require 'classes/Categories.php';
require 'classes/Places.php';
require 'classes/Cities.php';

$ci = new Cities();
$p = new Places();
$c = new Categories();

$cities = $ci->getCities();
$places = $p->getPlacesForCategory($_GET['category']);
$categorie = $c->getCategories($_GET['category']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?=$categorie['name']?></title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <div class="jumbotron text-center" style="background-image: url(assets/img/categories/<?=$categorie['image']?>)">
      <h1 id="title"><?=$categorie['name']?></h1>
    </div>
  </header>

  <section>
    <div class=container>
      <div class="col-md-3">
        <h1> Filtros</h1><br>
        <ul class="list-group">
          <?php foreach ($cities as $city): ?>
            <a href="place.php?filter=true&city=<?=$city['alias']?>" type="button" class="list-group-item"><span class="badge">14</span><?=ucfirst($city['name'])?></a>
          <?php endforeach; ?>
        </ul>

        <button href="place-add.php" class="btn btn-add btn-lg btn-block">Cadastrar Empresa</button>
      </div>

      <div class="col-md-9">
        <h1> Locais </h1><br>
        <div class="container-categories">
          <?php foreach($places as $place) : ?>
            <div class="card col-md-4">
              <a href="place.php?filter=true&category=<?=$place['alias']?>">
                <div class="card-img" style="background-image: url(assets/img/categories/<?=$place['image']?>)">
                  <h2 class="card-title"><?=$place['name']?></h2>
                </div>
              </a>
            </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
