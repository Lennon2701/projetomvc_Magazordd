<!DOCTYPE html>
<html>

<head>
    <link href="<?= $base; ?>/assets/css/login.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/fontawesome/css/brands.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/fontawesome/css/solid.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/select2.min.css" rel="stylesheet" />
    <link href="<?= $base; ?>/assets/css/jquery.dataTables" rel="stylesheet" />

    <script src="<?= $base; ?>/assets/js/jquery-3.6.4.min.js"></script>
    <script src="<?= $base; ?>/assets/js/jquery.mask.min.js"></script>
    <script src="<?= $base; ?>/assets/js/script.js"></script>
    <script src="<?= $base; ?>/assets/js/select2.min.js"></script>
    <script src="<?= $base; ?>/assets/js/jquery.dataTables.js"></script>
    <script src="<?= $base; ?>/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

</html>

<div class="wrapper">
    <?php
    $errorMessage = '
        <div class="alertMessage %s">
            <div class="alertDanger" style="margin-top: 25px !important;">
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
    <div id="formContent">
        <div>
            <span><img src="<?= $base ?>/images/icon_login.png" style="height: 100px;" /></span>
        </div>

        <form class="form-signin" id="login" method="POST">
            <input type="text" id="email" name="email" placeholder="email" required />
            <input type="password" id="password" name="password" placeholder="senha" required />
            <input type="submit" value="Login">
        </form>
    </div>
</div>