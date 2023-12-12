<?php

namespace Artemis;

require_once __DIR__ . '/src/controller/Database.php';

use Artemis\Database;

$clients = Database::getAll('Client');

include __DIR__ . '/templates/header.php';
include __DIR__ . '/templates/hero-loans.php';

?>

<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="p-4 mb-6 bg-white shadow rounded overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="text-xs text-gray-500 text-left">
                        <th class="pl-6 pb-3 font-medium">ID</th>
                        <th class="pb-3 font-medium">Client</th>
                        <th class="pb-3 font-medium">Caution</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client) : ?>
                        <tr class="text-xs bg-gray-50">
                            <td class="py-5 px-6 font-medium"><?= $client['id'] ?></td>
                            <td class="flex px-4 py-3">
                                <img class="w-8 h-8 mr-4 object-cover rounded-md" src="https://via.placeholder.com/400" alt="">
                                <div>
                                    <p class="font-medium"><?= $client['name'] ?></p>
                                    <p class="text-gray-500"><?= $client['email'] ?></p>
                                </div>
                            </td>
                            <td>
                                <span class="inline-block py-1 px-2 text-white bg-<?= $client['deposit'] == 1 ? 'green' : 'red' ?>-500 rounded-full">
                                    <?= $client['deposit'] == 1 ? 'Payée' : 'Non payée' ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php

include __DIR__ . '/templates/footer.php';