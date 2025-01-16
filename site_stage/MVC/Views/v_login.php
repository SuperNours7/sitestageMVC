<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="container">
        <h1>Connexion à l'administration</h1>
        <form action="index.php?page=login" method="post">
            <label for="nom_utilisateur">Nom d'utilisateur :</label>
            <input type="text" id="nom_utilisateur" name="nom_utilisateur" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <input type="submit" value= 'Se connecter'>
        </form>
        <button id="testSuccess">Tester un message de succès</button>
    </div>

    <script src="../Assets/js/app.js"></script>
</body>
</html>
