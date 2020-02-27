<?php
$teams = [];
$teamsFile = 'teams.txt';
$error = '';
if (is_file($teamsFile)) {
    $teams = file($teamsFile, FILE_IGNORE_NEW_LINES);
} else {
    $error = 'Il semblerait que le fichier contenant les noms des équipes est absent';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes équipes</title>
</head>
<body>
<?php if (!$error): ?>
    <h1>Mes équipes</h1>
    <?php if ($teams): ?>
        <ul>
            <?php foreach ($teams as $team): ?>
                <li><?= $team ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Vous n’avez encore aucune équipe, ajoutez-en&nbsp;!</p>
    <?php endif; ?>
    <h2>Ajout d’une équipe</h2>
    <form action="manage.php" method="post">
        <label for="team-name">Nom de l’équipe</label>
        <input type="text" name="team-name" id="team-name">
        <br>
        <input type="submit" value="Ajouter l’équipe">
        <input type="hidden" name="action" value="add">
    </form>
    <?php if ($teams): ?>
        <h2>Suppression d’un ou de plusieurs équipes</h2>
        <form action="manage.php" method="post">
            <?php foreach ($teams as $team): ?>
                <label for="<?= filter_var($team, FILTER_SANITIZE_STRING) ?>"><?= $team ?></label>
                <input type="checkbox"
                       id="<?= filter_var($team, FILTER_SANITIZE_STRING) ?>"
                       name="team-name[]"
                       value="<?= $team ?>" >
                <br>
            <?php endforeach; ?>
            <input type="submit" value="Supprimer la ou les équipes sélectionné(es)">
            <input type="hidden" name="action" value="delete">
        </form>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
