<?php
require_once 'database.php';

class DataManager {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getServices() {
        $sql = "SELECT * FROM items WHERE url IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOffers() {
        $sql = "SELECT * FROM items WHERE url IS NOT NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllItems() {
        $sql = "SELECT * FROM items";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem($image, $titre, $description, $url = null) {
        $sql = "INSERT INTO items (image, titre, description, url) VALUES (:image, :titre, :description, :url)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':image' => $image,
            ':titre' => $titre,
            ':description' => $description,
            ':url' => $url
        ]);
    }

    public function updateItem($id, $image, $titre, $description, $url = null) {
        $sql = "UPDATE items SET image = :image, titre = :titre, description = :description, url = :url WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':image' => $image,
            ':titre' => $titre,
            ':description' => $description,
            ':url' => $url
        ]);
    }

    public function deleteItem($id) {
        $sql = "DELETE FROM items WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    // Méthode pour vérifier les identifiants d'un administrateur
    
 
    
public function verifyAdminCredentials($nom_utilisateur, $mot_de_passe) {
       $stmt = $this->db->prepare("SELECT * FROM administrateur WHERE nom_utilisateur = ?");
       $stmt->execute([$nom_utilisateur]);

  if ($stmt->rowCount() > 0) {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump(password_hash($mot_de_passe, PASSWORD_DEFAULT)); 
//die();
    if (password_verify($mot_de_passe, $result[0]['mot_de_passe'])) {
                echo "Connexion réussie. Bienvenue, " . $result[0]['nom_utilisateur'] . " !<br>";
                return $result[0]; // Identifiants valides
    } else {
        die("Mot de passe incorrect. Veuillez réessayer.");
    }
  }
}


    

    // Méthode pour ajouter un administrateur
    public static function addAdmin($nom_utilisateur, $mot_de_passe, $email) {
        $conn = self::connect();

        // Hachage du mot de passe avant de l'insérer dans la base de données
        $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Préparer la requête d'insertion
        $sql = 'INSERT INTO administrateur (nom_utilisateur, mot_de_passe, email, date_creation) 
                VALUES (:nom_utilisateur, :mot_de_passe, :email, NOW())';

        $stmt = $conn->prepare($sql);

        // Exécuter la requête avec les données de l'administrateur
        $stmt->execute([
            ':nom_utilisateur' => $nom_utilisateur,
            ':mot_de_passe' => $hashedPassword,
            ':email' => $email
        ]);
    }

    public function __destruct() {
        Database::disconnect();
    }
}
?>
