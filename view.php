<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style/style.css">
    <title>Analizing text</title>
</head>

<body>
    <header class="header">
        <p class="p">Analizing text</p>
    </header>
    <a href="/../GIT_1/index.php?return=ok" class="links">Завантажити додатково</a>
    <div class="up_info"><?= $up_info ?></div>
    <div class="up_info"><?= $up_info2 ?></div>
    <?php
    if (isset($_POST['submit'])) {
        require_once __DIR__ . '/cards/ResaltText.php';
    } elseif (isset($_GET['return'])) {
        require_once __DIR__ . '/cards/form.php';
    } else {
        require_once __DIR__ . '/cards/form.php';
    }
    ?>
</body>

</html>