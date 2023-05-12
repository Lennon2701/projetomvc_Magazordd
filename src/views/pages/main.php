<?php
$render('header');
?>

<div class="text-center" style="margin-top: 2%;">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Minhas Reservas: <?= count($myReserves) ?></h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservas Total: <?= count($allReserves) ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$render('footer');
?>