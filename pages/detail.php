<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title><?= $_GET['crq'] ?></title>
</head>

<body>
    <header>
        <p class='logo'>ОТС Сибири Droid</p>
    </header>
    <main>
        <a href="../index.php">К списку тех. карт</a>
        <!-- CRQ -->
        <?php include_once 'detail_crq.php'; ?>
        <hr>
        <?php if (isset($_GET['crq'])) { ?>
            <!-- Контрагенты -->
            <?php include_once 'detail_counterparty.php';
            ?>
            <hr>
            <!-- Ход согласования работ -->
            <?php include_once 'detail_tc.php'; ?>
            <hr>
            <!-- Отмена работ -->
            <?php include_once 'detail_ps.php'; ?>
        <?php } ?>
    </main>
    <footer>Все права защищены &copy; Ковчин П.В.</footer>
    <script src="../js/detail.js"></script>
    <script src="../js/ajax.js"></script>
</body>

</html>