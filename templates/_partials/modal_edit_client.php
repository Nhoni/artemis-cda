<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= !empty($client['id']) ? $client['id'] : 'Undefined' ?>" />
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="space-y-12">
                            <div>
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Formulaire de modification d'un client</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Remplissez les champs ci-dessous pour modifier les informations</p>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-8">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= !empty($client['name']) ? $client['name'] : 'Undefined' ?>">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-8">
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-mail</label>
                                        <div class="mt-2">
                                            <input type="text" name="email" id="email" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= !empty($client['email']) ? $client['email'] : 'Undefined' ?>">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-8 pb-8">
                                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Caution</label>
                                        <div class="mt-2">
                                            <select name="deposit" id="deposit" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                <?php
                                                if (!empty($client['deposit']) && $client['deposit'] == 1) {
                                                    echo '<option value="1">Payé</option>';
                                                    echo '<option value="0">Non payé</option>';
                                                } else {
                                                    echo '<option value="0">Non payé</option>';
                                                    echo '<option value="1">Payé</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse gap-x-3 sm:px-6">
                        <button type="submit" class="inline-flex rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enregistrer</button>
                        <a href="clients.php" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>