<?php
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
include './db-connect/Database.php';
require './header.php';
require './db-tables/Category.php';
require './db-tables/Movie.php';
require './db-tables/Language.php';
require './db-tables/Actor.php';
echo template_header('accueil', 'rubrique1');
?>
<section>
    <div>
        <h1>Location de film</h1>
    </div>
</section>
<section>
    <div>
        <h3>Categories</h3>
        <ol>
            <?php
            $categories = Category::all();
            foreach ($categories as $category) {  ?>
                <li>
                    <a href="categorie.show.php?id=<?php echo $category['category_id'] ?>"><?php echo $category["name"]; ?></a>
                </li>
            <?php
            }
            ?>
        </ol>
    </div>
</section>