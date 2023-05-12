<?php $render('header'); ?>

<hr />
<h5>Lista de Reservas</h5>

<?php
    $errorMessage = '
        <div class="alertMessage %s">
            <div class="alertSuccess" style="margin-top: 25px !important;">
                <span>%s</span>
                <span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>
            </div>
            <br />
        </div>
    ';

    printf(
        $errorMessage,
        empty($message) ? 'd-none' : "",
        $message
    );

    $newReservation = '
        <a href="%s/reservations/my/insert" class="btn btn-success %s"><i class="fa-solid fa-plus"></i> Nova Reserva</a><br /><br />
    ';

    printf(
        $newReservation,
        $base,
        $_GET['request'] != 'reservations/' . $_SESSION['user_id'] ? 'd-none' : ''
    );
?>
<table class="table table-striped tableReservation">
    <thead>
        <tr>
            <th scope="col">Mesa</th>
            <th class='col'>Início</th>
            <th class='col'>Fim</th>
            <th scope="col">Pessoa</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($reservations as $reservation) :
        ?>
            <tr style="height: 55px !important;">
                <th scope="row"><?= $reservation['description'] ?></th>
                <td><?= $reservation['date_initial']?></th>
                <td><?= $reservation['date_final']?></td>
                <td><?= $reservation['name'] ?></td>
                <?php
                    if($reservation['user_id'] == $_SESSION['user_id']) {
                        ?>
                        <td class="actions">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-gears"></i> Opções
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="<?= $base; ?>/reservations/my/<?= $reservation['id'] ?>/edit"><i class="fa-solid fa-user-pen" style="color: black;"></i> Editar</a></li>
                                    <li><a class="dropdown-item" href="<?= $base; ?>/reservations/my/<?= $reservation['id'] ?>/delete" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa-solid fa-trash" style="color: red;"></i> <span style="margin-left: 5px">Excluir</span></a></li>
                                </ul>
                            </div>
                        </td>
                <?php } else { ?>
                    <td></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $render('footer'); ?>