<?php

// ICI ON RECUPERE LE LIVRE 
namespace Artemis;

require_once __DIR__ . '/src/entity/Book.php';

use Artemis\Book;

$book = Book::getOneBook($_GET['id']);

include __DIR__ . '/templates/header.php';

include __DIR__ . '/templates/hero-book.php';

?>

<div class="container px-4 mb-6 mx-auto">
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Information sur l'ouvrage</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Les détails enregistrés à propos de ce livre</p>
        </div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Titre du livre</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <?= !empty($book['BookTitle']) ? $book['BookTitle'] : 'Undefined' ?>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Description</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <?= !empty($book['BookDescription']) ? $book['BookDescription'] : 'Undefined' ?>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">ISBN</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <?= !empty($book['BookIsbn']) ? $book['BookIsbn'] : 'Undefined' ?>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Editeur</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <?= !empty($book['PublisherName']) ? $book['PublisherName'] : 'Undefined' ?>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Auteur(e)
                    </dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <?= !empty($book['AuthorName']) ? $book['AuthorName'] : 'Undefined' ?>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Autres ouvrages de l'auteur(e)
                    </dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <!-- TODO: Renseignez les autres ouvrages de cet auteur -->
                        Renseignez les autres ouvrages de cet auteur
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="my-6 flex items-center justify-start gap-x-6">
        <button type="button" onclick="showModal('edit')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Mettre à jour</button>
        <button type="button" onclick="showModal('delete')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Supprimer</button>
    </div>


    <div id="modal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Supprimer le livre</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Vous êtes sur le point de supprimer le livre "<b><?= !empty($book['BookTitle']) ? $book['BookTitle'] : 'Undefined' ?></b>", êtes-vous sûr de vouloir continuer ? Cette action est irreversible !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?= !empty($book['BookId']) ? $book['BookId'] : 'Undefined' ?>">
                            <input type="hidden" name="type" value="book">
                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Je supprime</button>
                        </form>
                        <button type="button" onclick="hideModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include __DIR__ . '/templates/_partials/modal_edit.php';

include __DIR__ . '/templates/_partials/modal_delete.php';

include __DIR__ . '/templates/footer.php';