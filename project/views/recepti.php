<?php
require_once('../helpers/ClassLoader.php');
if (isset($_POST) && sizeof($_POST) > 0){
    $article = new Articles($_POST['title'],$_POST['subtitle'],$_POST['category'],$_POST['content'],$_FILES['image']['name']);
    $a = Articles::getArticleId();
    $errors = $article->save();
    if (sizeof($errors) == 0)
    {
        ?>
        <div class="jumbotron alert-success">
            <p>Da biste zavrsili unos kliknite <a href="?type=Sastojci&article=" . <?php echo $a?>">ovde</a></p>
        </div>
        <?php
    }else{
        ?>
        <div class="jumbotron alert-danger">
            <p>Vas unos nije ispravan</p>
            <?php
            foreach ($errors as $error){
                echo "<p>" . $error . "</p>";
            }
            ?>
        </div>
        <?php
    }
}
    ?>
<form enctype="multipart/form-data" action="" method="POST">
    <div class="form-group">
        <label for="title">Naslov:</label>
        <input type="text" class="form-control" name="title" id="title">
        <label for="subtitle">Podnaslov:</label>
        <input type="text" name="subtitle" id="subtitle" class="form-control">

        <select class="custom-select mt-4 text-center" id="category" name="category">
            <option selected>Izaberite kategoriju</option>
            <?php
            $categories = Categories::getAllData();
            foreach ($categories as $category)
            {
                echo "<option value=".$category['category_name'].">".$category['category_name']."</option>";
            }
            ?>
        </select>
        <label>Slika:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="customFile">Izaberite sliku</label>
        </div>
        <label for="content">Opis postupka:</label>
        <textarea class="form-control" name="content" id="editor"></textarea>
    </div>
    <input type="submit" class="btn btn-danger mt-5" value="Dalje">
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>