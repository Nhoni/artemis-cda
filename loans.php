<?php

namespace Artemis;

require_once __DIR__ . '/src/entity/Loan.php';

use Artemis\Loan;

$loans = Loan::getAllLoans();
$today = date("Y-m-d");

$inProgress = [];
$endSoon = [];
$isBack = [];

foreach ($loans as $loan) {
    $loanStatus = $loan['LoanStatus'];
    $loanEndDate = $loan['LoanEndDate'];

    if ($loanStatus == 0) {
        if ($today <= $loanEndDate) {
            $inProgress[] = $loan;
        } else {
            $endSoon[] = $loan;
        }
    } else {
        $isBack[] = $loan;
    }
}

$loanStatusLabels = ['En cours', 'À rendre', 'Rendu'];
$loanStatusColors = ['indigo', 'red', 'green'];

include __DIR__ . '/templates/header.php';
include __DIR__ . '/templates/hero-loans.php';

?>

<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -m-4">
            <?php
            for ($i = 0; $i < count($loanStatusLabels); $i++) {
                $title = $loanStatusLabels[$i];
                $color = $loanStatusColors[$i];
                $array = ($i === 0) ? $inProgress : (($i === 1) ? $endSoon : $isBack);
                include __DIR__ . '/templates/_partials/loans_column.php';
            }
            ?>
        </div>
    </div>
</section>

<?php

include __DIR__ . '/templates/footer.php';