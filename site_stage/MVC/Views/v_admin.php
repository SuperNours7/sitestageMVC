<?php
require_once '../Model/dataManager.php';
$dataManager = new DataManager();

// Gestion des actions (ajout, modification, suppression)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'add') {
            // Ajouter un nouvel élément
            $dataManager->addItem($_POST['image'], $_POST['titre'], $_POST['description'], $_POST['url']);
        } elseif ($_POST['action'] === 'edit') {
            // Modifier un élément existant
            $dataManager->updateItem($_POST['id'], $_POST['image'], $_POST['titre'], $_POST['description'], $_POST['url']);
        } elseif ($_POST['action'] === 'delete') {
            // Supprimer un élément
            $dataManager->deleteItem($_POST['id']);
        }
    }
}

// Récupérer tous les éléments pour affichage
$items = $dataManager->getAllItems();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Starlink</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
    <script src="../Assets/js/app.js" defer></script>
</head>
<body>
    <h1>Interface d'Administration</h1>

    <!-- Formulaire pour ajouter un élément -->
    <h2>Ajouter un nouvel élément</h2>
    <form method="POST">
        <input type="hidden" name="action" value="add">
        <label>Image URL :</label>
        <input type="text" name="image" required>
        <label>Titre :</label>
        <input type="text" name="titre" required>
        <label>Description :</label>
        <textarea name="description" required></textarea>
        <label>URL (laisser vide si c'est un service) :</label>
        <input type="text" name="url">
        <button type="submit">Ajouter</button>
    </form>

    <!-- Liste des éléments existants -->
    <h2>Liste des éléments</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['titre']) ?>" width="100"></td>
                        <td><?= htmlspecialchars($item['titre']) ?></td>
                        <td><?= htmlspecialchars($item['description']) ?></td>
                        <td>
                            <?php if (!empty($item['url'])): ?>
                                <a href="<?= htmlspecialchars($item['url']) ?>" target="_blank">Lien</a>
                            <?php endif; ?>
                        </td>
                        <td class="actions">
                            <!-- Formulaire pour modifier -->
                            <form method="POST">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <input type="text" name="image" value="<?= htmlspecialchars($item['image']) ?>" required>
                                <input type="text" name="titre" value="<?= htmlspecialchars($item['titre']) ?>" required>
                                <textarea name="description" required><?= htmlspecialchars($item['description']) ?></textarea>
                                <input type="text" name="url" value="<?= htmlspecialchars($item['url']) ?>">
                                <button type="submit">Modifier</button>
                            </form>
                            <!-- Formulaire pour supprimer -->
                            <form method="POST">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>