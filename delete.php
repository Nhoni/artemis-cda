<?php

use Artemis\Book;

require_once __DIR__ . '/src/entity/Book.php';

include __DIR__ . '/templates/header.php';

include __DIR__ . '/templates/hero.php';

$type = '';
$result = ''; // Solution Temporaire
if (!empty($_GET['id'])) {
  if ($_GET['type'] == "book") {
    $type = ' un livre';
  } elseif ($_GET['type'] == "client") {
    $type = ' un client';
  } elseif ($_GET['type'] == "author") {
    $type = ' un auteur';
  };
}

if (!empty($_POST['id'])) {
  if (isset($_POST['yes'])) {
    Book::deleteBook($_POST['id']);

    // header('Location: index.php?message=delete');
  } elseif (isset($_POST['no'])) {
    // header('Location: index.php');
  }
}


?>

<div class="container px-4 mx-auto">
  <?php
  if (!empty($message)) {
    echo <<<HTML
           <h4>{$result}</h4>
      HTML;
  } else {
    echo <<<HTML
        <form action="" method="post">
          <div class="space-y-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Confimation de suppression</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Vous êtes sur le point de supprimer<b>{$type}</b>, êtes-vous sûr de vouloir continuer ? Cette action est irreversible !</p>
            <input type="hidden" name="id" value="{$_GET['id']}">
            <input type="hidden" name="type" value="{$_GET['type']}">
            <div class="mt-3 flex items-center justify-start gap-x-6">
              <input type="submit" name="no" class="rounded-md bg-grey-600 px-3 py-2 text-sm font-semibold leading-6 text-gray-900" value="Annuler" />
              <input type="submit" name="yes" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" value="Je confirme" />
            </div>
        </form>
      HTML;
  }
  ?>
</div>



<?php

include __DIR__ . '/templates/footer.php';