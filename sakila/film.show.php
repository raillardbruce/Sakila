<?php
require './db-connect/Database.php';
require './header.php';
require './db-tables/Category.php';
require './db-tables/Movie.php';
require './db-tables/Actor.php';
echo template_header('Le film', 'active'); ?>
<section>
  <div>
    <div>
      <div>
        <?php
        $newID = (int)$_GET["id"];
        $film = Film::read($newID);
        $filmNewId = (int)$film['film_id'];
        $filmActors = Actor::readByFilm($filmNewId);
        ?>
        <div class="col">
          <h3>Films n°:<?php echo $film["film_id"] ?></h3>
          <h3><?php echo $film["title"] ?></h3>
          <p><strong>Langue : <?php echo $film["name"] ?></strong></p>
        </div>
      </div>
      <div>
        <h4>Caractéristiques</h4>
        <p class="text-muted"><?php echo $film["special_features"] ?></p>
        <h4>Description</h4>
        <p><?php echo $film["description"] ?></p>
        <h4>Acteur :</h4>
        <div class="row">
          <?php
          foreach ($filmActors as $filmActor) {
            echo "<div>" . $filmActor["first_name"] . " " . $filmActor["last_name"] . "</div>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div>
    <h3>Tous les film de sa catégorie:</h3>
    <divÒ>
      <?php
      $newID = (int)$_GET["id"];
      $categorys = Film::readByCatId($newID);
      $new = count($categorys);
      foreach ($categorys as $category) {
        $category_id = $category['category_id'];
        $i = $new;
        while ($i <= $new) :
          $films = Film::readByCat($category_id);
          foreach ($films as $film) {
            $film_id = $film['film_id'];
            $actorByFilm = Actor::readByFilm($film_id);
            $nbActor = count($actorByFilm);
            $film = Film::read($film_id);
      ?>
            <div>
              <div>
                <div>
                  <h5><?php echo $film["title"] ?></h5>
                  <p>Film n° : <?php echo $film['film_id'] ?></p>
                  <p>Nombre d'acteur dans se film :<strong> <?php echo $nbActor ?></strong></p>
                  <p><?php echo $film["description"] ?></p>
                  <div>
                    <div>
                      <a href="film.show.php?id=<?= (int)$film["film_id"] ?>">Voir</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      <?php
          }
          $i++;
        endwhile;
      }
      ?>
  </div>
  </div>
</section>