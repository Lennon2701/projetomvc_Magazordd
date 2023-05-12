<?php $render('header'); ?>

<hr />
<h5>Nova Reserva</h5><br />
<form method="POST" action="<?= $base; ?>/reservations/my/<?=$reservation['id']?>/edit">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="table_id">Mesa</label>
                <select class="form-control" name="table_id" required>
                    <?php
                        $options = [];
                        foreach ($tables as $table) {
                            $options = '<option value="%s" %s>%s</option>';

                            printf(
                                $options
                                , $table['id']
                                , $table['id'] == $reservation['table_id'] ? 'selected' : ''
                                , $table['description']
                            );
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="form-group">
                <label for="date_initial">Data Inicial</label>
                <input type=text class="form-control datepicker date" name="date_initial" value="<?=$reservation['date_initial']?>" required />
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="form-group">
                <label for="date_initial">Hora Inicial</label>
                <input type=text class="form-control timepicker time bg-white" name="hour_initial" value="<?=$reservation['hour_initial']?>" required readonly />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="date_initial">Hora Final</label>
                <input type=text class="form-control timepicker time bg-white" name="hour_final"  value="<?=$reservation['hour_final']?>" required readonly />
            </div>
        </div>
    </div>
            
    <?php
    $errorMessage = '
        <div class="alertMessage %s">
            <div class="alertWarning">
                <span>%s</span>
                <span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>
            </div>
        </div><br />
    ';

    printf(
        $errorMessage,
        empty($message) ? 'd-none' : "",
        $message
    )
    ?>
    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i> Reservar</button>
    <a href="<?= $base; ?>/persons" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
</form>

<?php $render('footer'); ?>