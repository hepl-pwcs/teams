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
    <div class="alert alert-warning">
        <ul class="list-group">
            <li class="list-group-item">Vous avez oublié de spécifier une ou des équipes</li>
        </ul>
    </div>
    <ul class="list-group">
        <li class="list-group-item">Standard de Liège</li>
        <li class="list-group-item">Anderlecht</li>
    </ul>
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
    <section class="mt-5">
        <h2>Suppression d’une ou de plusieurs équipes</h2>
        <form action="/" method="post">
            <ul class="list-group">
                <li class="form-check list-group-item">
                    <input class="form-check-input"
                           type="checkbox"
                           id="Standard de Liège"
                           name="team-name[]"
                           value="Standard de Liège">
                    <label class="form-check-label"
                           for="Standard de Liège">Standard de Liège</label>
                </li>
                <li class="form-check list-group-item">
                    <input class="form-check-input"
                           type="checkbox"
                           id="Anderlecht"
                           name="team-name[]"
                           value="Anderlecht">
                    <label class="form-check-label"
                           for="Anderlecht">Anderlecht</label>
                </li>
            </ul>
            <button class="btn btn-primary form-control-sm mt-3"
                    type="submit">Supprimer la ou les équipes sélectionné(es)
            </button>
            <input type="hidden"
                   name="action"
                   value="delete">
        </form>
    </section>
</main>
</body>
</html>
