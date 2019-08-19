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
        <a href="../index.php">К списку тех. карт</a></br>
        <?php include_once 'crq_detail.php'; ?>
    </main>
    <footer>Все права защищены &copy; Ковчин П.В.</footer>
</body>

</html>