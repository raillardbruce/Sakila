<?php
require './db-connect/Database.php';
require './header.php';
require './db-tables/Category.php';
require './db-tables/Movie.php';
require './db-tables/Language.php';
require './db-tables/Actor.php';
echo template_header('Les films de cet catégorie', 'active'); ?>
<section>
  <div>
    <div>
      <?php
      $newID = (int)$_GET["id"];
      $categorysNames = Category::readByFilm($newID);
      $categorysNameId = $categorysNames['category_id'];
      $categorysNameInt = (int)$categorysNameId;
      $catName = Category::read($categorysNameInt);
      ?>
      <h3>Les films de la catégorie <?php echo $catName['name'] ?></h3>
      <div>
        <?php
        $categorys = Category::read($newID);
        $new = count($categorys);
        $newID = (int)$_GET["id"];
        $categorys = Film::readByCat($newID);
        $new = count($categorys);
        ?>
        <?php
        foreach ($categorys as $category) {
          $film_id = $category['film_id'];
          $i = $new;
          while ($i <= $new) :
            $film = Film::read($film_id);
            $actorByFilm = Actor::readByFilm($film_id);
            $nbActor = count($actorByFilm);
            $i++;
        ?>
            <div>
              <div>
                <h5><?php echo $film["title"] ?></h5>
                <p>language :<?php echo $film["name"] ?></p>
                <p>Nombre d'acteur dans se film :<strong> <?php echo $nbActor ?></strong></p>
                <h6><?php echo $film["special_features"] ?></h6>
                <p><?php echo $film["description"] ?></p>
                <a href="film.show.php?id=<?= (int)$film["film_id"] ?>">Voir</a>
              </div>
            </div>
        <?php
          endwhile;
        }
        ?>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>