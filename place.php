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

require 'templates/header.php';
?>
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
<?php require 'templates/footer.php'; ?>