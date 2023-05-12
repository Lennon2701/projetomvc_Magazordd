<?php $render('header'); ?>

<hr />
<h5>Lista de Mesas</h5>

<table class="table table-striped  tableTables">
    <thead>
        <tr>
            <th scope="col">ID</td>
            <th scope="col">Mesa</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tables as $table) : ?>
            <tr>
                <td scope="row">#<?= $table['id'] ?></td>
                <td><?= $table['description'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $render('footer'); ?>