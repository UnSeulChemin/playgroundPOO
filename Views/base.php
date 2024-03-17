<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlaygroundPOO <?= $title ?? ""; ?></title>
	<link rel="shortcut icon" type="image/png" href="public/images/favicon/favicon.png">
	<link rel="stylesheet" type="text/css" href="public/css/reset.css">
	<link rel="stylesheet" type="text/css" href="public/css/app.css">
</head>
<body>

<?php require_once "_partials/_header.php"; ?>
<main><?= $content ?></main>

</body>
</html>