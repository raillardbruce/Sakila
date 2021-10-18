<?php

require './db-connect/Database.php';
require './header.php';
require './db-tables/rental.php';
require './db-tables/Category.php';
require './db-tables/Movie.php';
echo template_header('Faire une recherche', 'rubrique6');
?>
<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) :
?>
<?php
  header("refresh:0; /login.php");
else :
?>
  <div>
    <div>
      <h5>Recherche</h5>
      <hr>
      <h5>Nom du film :</h5>
      <form action="details.php" method="post" class="p-3">
        <div>
          <input type="text" name="search" id="search" placeholder="Rechercher..." required>
        </div>
      </form>
    </div>
  </div>
<?php endif;
