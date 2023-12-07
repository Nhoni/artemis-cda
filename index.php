<?php 

require 'classes/Book.php';
require 'classes/Publisher.php';

use Artemis\Book;
use Artemis\Publisher;
use Artemis\Author;
use Artemis\Client;
use Artemis\Loan;

//Instanciations
$editeur_1 = new Publisher(1,'Galimard');
$editeur_2 = new Publisher(2,'Hachette');
$editeur_3 = new Publisher(3,'Nathan');

$livre_1 = new Book(
    1,
    'Strangers Things',
    'un livre de fantaisie',
    '123456789',
    1,
    2,);

    $livre_1->getAuthor_id();
    $editeur_1->getId();

    $nom = "";

//Affichage
echo 'Voici le livre : '.$livre_1->getTitle() . '<br>';
echo 'Il est publié: par la maison d\'édition : '.$editeur_1->getName() . '<br>';

//var_dump($livre_1);


die();


require __DIR__ . '/classes/Ebook.php';
$ebook = new Ebook(
    2,
    'Macron a la plage',
    'Les aventures du président',
    '123-321-231',
    3,
    3
);

die();



include __DIR__ . '/templates/header.php';

include __DIR__ . '/templates/hero.php';

include __DIR__ . '/templates/last.php';

include __DIR__ . '/templates/footer.php';