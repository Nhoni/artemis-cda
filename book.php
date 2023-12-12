<?php

// ICI ON RECUPERE LE LIVRE 
namespace Artemis;

require_once __DIR__ . '/src/entity/Book.php';

use Artemis\Book;

$book = Book::getOneBook($_GET['id']);

include __DIR__ . '/templates/header.php';

include __DIR__ . '/templates/hero-book.php';

?>

<p class="text-xl font-medium">
    <?= !empty($book['BookDescription']) ? $book['BookDescription'] : 'Undefined' ?>
</p>
<p class="text-xl font-medium">
    <?= !empty($book['BookTitle']) ? $book['BookTitle'] : 'Undefined' ?>
</p>
<p class="text-xl font-medium">
    <?= !empty($book['PublisherName']) ? $book['PublisherName'] : 'Undefined' ?>
</p>
<p class="text-xl font-medium">
    <?= !empty($book['BookIsbn']) ? $book['BookIsbn'] : 'Undefined' ?>
</p>
<p class="text-xl font-medium">
    <?= !empty($book['AuthorName']) ? $book['AuthorName'] : 'Undefined' ?>
</p>

<a href="delete.php?id=<?= $_GET['id']?>&type=book" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
    Supprimer le livre
</a>

<?php

include __DIR__ . '/templates/footer.php';