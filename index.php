<?php
$errors = [];
$teams = [];

define('MISSING_TEAM', 'Vous avez oublié de spécifier une ou des équipes');
define('MISSING_FILE', 'Le fichier texte est absent');
define('NO_TEAM_YET', 'Il n’y a pas encore d’équipe à lister');
define('FILE_PATH', 'teams.txt');

if (!is_file(FILE_PATH)) {
    $errors[] = MISSING_FILE;
} else {
    $teams = file(FILE_PATH);
}

?>
<!-- TEMPLATE D’AFFICHAGE -->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Mes équipes</title>
</head>
<body>
<main class="container">

    <h1>Mes équipes</h1>
    <?php if ($errors): ?>
        <div class="alert alert-warning">
            <ul class="list-group">
                <?php foreach ($errors as $error): ?>
                    <li class="list-group-item"><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php else: ?>
        <?php if ($teams): ?>
            <ul class="list-group">
                <?php foreach ($teams as $team): ?>
                    <li class="list-group-item"><?= $team ?></li>
                <?php endforeach ?>
            </ul>
        <?php else: ?>
            <div class="alert alert-warning">
                <p><?= NO_TEAM_YET ?></p>
            </div>
        <?php endif ?>
        <section class="mt-5">
            <h2>Ajout d’une équipe</h2>
            <form action="/" method="post">
                <label class="form-label" for="team-name">Nom de l’équipe</label>
                <input class="form-control"
                       type="text"
                       name="team-name"
                       id="team-name"
                       autofocus>
                <br>
                <button class="btn btn-primary form-control-sm mt-3"
                        type="submit">Ajouter l’équipe
                </button>
                <input type="hidden"
                       name="action"
                       value="add">
            </form>
        </section>
        <?php if ($teams): ?>
            <section class="mt-5">
                <h2>Suppression d’une ou de plusieurs équipes</h2>
                <form action="/" method="post">
                    <ul class="list-group">
                        <?php foreach ($teams as $team): ?>
                            <li class="form-check list-group-item">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="<?= $team ?>"
                                       name="team-name[]"
                                       value="<?= $team ?>">
                                <label class="form-check-label"
                                       for="<?= $team ?>"><?= $team ?></label>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <button class="btn btn-primary form-control-sm mt-3"
                            type="submit">Supprimer la ou les équipes sélectionné(es)
                    </button>
                    <input type="hidden"
                           name="action"
                           value="delete">
                </form>
            </section>
        <?php endif ?>
    <?php endif ?>
</main>
</body>
</html>
