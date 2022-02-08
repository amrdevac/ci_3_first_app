<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "wer" ?></title>
</head>

<body>
    <div class="container">
        <?php foreach ($users as $user) : ?>
            <tr>
                <?php print_r($user) ?>
                <br>
            </tr>
        <?php endforeach; ?>

    </div>
</body>

</html>