<?php
    include "../views/nav/dodaj_clanak_nav.php";
    $recipes = Recipes::getData("recipe_id, title, category_name");
?>
<div class="row mt-5">
    <div class="col text-center">
        <div class="jumbotron">
          <table class="table">
              <tr>
                  <th colspan="3">Lista svih clanaka</th>
              </tr>
              <tr>
                  <th>ID</th>
                  <th>Naslov</th>
                  <th>Kategorija</th>
              </tr>

                  <?php
                    foreach ($recipes as $key => $recipe){
                        echo "<tr><td>".$recipe['recipe_id'] ."</td>";
                        echo "<td>".$recipe['title']  ."</td>";
                        echo "<td>".$recipe['category_name'] ."</td></tr>";
                    }
                  ?>

          </table>
        </div>
    </div>
</div>