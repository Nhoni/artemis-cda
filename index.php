<?php 


include __DIR__ . '/templates/header.php';

include __DIR__ . '/templates/hero.php';

if (isset($_GET['message'])) {
    if(!empty($_GET['message']) && $_GET['message'] == "add"){
    echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">L\'ajout a bien été effectué</span>.
          </div>
    ';
    } elseif ($_GET['message'] == "delete") {
        echo '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">La suppression a bien été effectué</span>.
              </div>
        ';
    }
}

include __DIR__ . '/templates/last.php';

include __DIR__ . '/templates/footer.php';