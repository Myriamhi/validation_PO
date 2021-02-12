<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$player1 = new Archer('Robin');
$player2 = new Magician('Merlin');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baston</title>
</head>
<body>
    <?php while ($player1->isAlive() && $player2->isAlive()): ?>
        <div>
            <p><?php echo $player1->turn($player2) ;?></p>
            <?php $result = "$player1->name a gagné !" ;?>
            <?php if ($player2->isAlive()): ?>
                <p><?php echo $player2->turn($player1); ?></p>
                <?php $result = "$player2->name a gagné !" ?>
            <?php endif ?>
        </div>
    <?php endwhile ?>
    <p><?= $result ?></p>
    
</body>
</html>
