<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . '/../Model/dataManager.php');

// Démarrage de la session
session_start();

$dataManager = new DataManager();
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

switch ($page) {
    case 'services':
        $services = $dataManager->getServices();
        require(__DIR__ . '/../Views/v_services.php');
        break;

    case 'offres':
        $offers = $dataManager->getOffers();
        require(__DIR__ . '/../Views/v_offres.php');
        break;

    case 'contact':
        require(__DIR__ . '/../Views/v_contact.php');
        break;

    case 'admin':
        // Vérification de l'accès admin
        if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
            header('Location: index.php?page=login');
            exit;
        }
        require(__DIR__ . '/../Views/v_admin.php');
        break;

    case 'login':
        // Gérer la soumission du formulaire de connexion
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $mot_de_passe = $_POST['mot_de_passe'];
            

            $administrateur = $dataManager->verifyAdminCredentials($nom_utilisateur, $mot_de_passe);

            if ($administrateur) {
                // Connexion réussie
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_name'] = $administrateur['nom_utilisateur'];

                header('Location: index.php?page=admin');
                exit;
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
        require(__DIR__ . '/../Views/v_login.php');
        break;

    case 'logout':
        // Déconnexion de l'administrateur





        
        session_destroy();
        header('Location: index.php?page=login');
        exit;

    default:
        require(__DIR__ . '/../Views/v_acceuil.php');
}
?>
