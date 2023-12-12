<?php

namespace Artemis;

require_once __DIR__ . '/src/controller/Database.php';
require_once __DIR__ . '/src/entity/Book.php';

$authors = Database::getAll('Author');
$publishers = Database::getAll('Publisher');


if(isset($_POST['submit'])) {

    Book::addBook(
        $_POST['title'],
        $_POST['description'],
        $_POST['isbn'],
        $_POST['author'],
        $_POST['publisher']
    );

}

include __DIR__ . '/templates/header.php';

?>

<div style="display: grid; place-items: center; height: 100vh; margin: auto;">
    <form action="" method="post">
        <label for="">Titre du livre</label><br>
        <input name="title" type="text"><br><br>
        <label for="">Description</label><br>
        <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>
        <label for="">ISBN</label><br>
        <input name="isbn" type="text"><br><br>
        <label for="">Auteur</label><br>
        <input list="authors" name="author" type="text">
        <datalist id="authors">
            <?php foreach ($authors as $author) : ?>
                <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
            <?php endforeach; ?>
        </datalist><br><br>
        <label for="">Éditeur</label><br>
        <input list="publishers" name="publisher" type="text">
        <datalist id="publishers">
            <?php foreach ($publishers as $publishers) : ?>
                <option value="<?= $publishers['id'] ?>"><?= $publishers['name'] ?></option>
            <?php endforeach; ?>
        </datalist><br><br>
        <button name="submit" type="submit">Enregistrer</button>
    </form>
</div>


<?php

include __DIR__ . '/templates/footer.php';