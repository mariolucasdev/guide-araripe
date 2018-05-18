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

require 'templates/header.php';
?>

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

<?php require 'templates/footer.php'?>