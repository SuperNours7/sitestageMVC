<?php

require_once(__DIR__ . '/../Model/dataManager.php');



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

    default:
        require(__DIR__ . '/../Views/v_acceuil.php');
}
?>
