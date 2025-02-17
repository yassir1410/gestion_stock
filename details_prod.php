<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="detail.css">
</head>

<?php
include("conn.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Récupérer les détails du produit depuis la base de données
    $sql = "SELECT * FROM stock WHERE id_Produit=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Détails du Produit</h2>";
        echo "<p>ID: " . $row["id_produit"] . "</p>";
        echo "<p>Code: " . $row["prod_code"] . "</p>";
        echo "<p>Désignation: " . $row["prod_designation"] . "</p>";
        echo "<p>Prix: " . $row["prod_prix_a"] . "</p>";
        echo "<p>Marge: " . $row["prod_marge"] . "</p>";
        echo "<p>Quantité en Stock: " . $row["prod_quantite_s1"] . "</p>";
        echo "<p>Seuil: " . $row["prod_seuil"] . "</p>";
        echo "<p>ID Fournisseur: " . $row["id_fournisseur"] . "</p>";
    } else {
        echo "Aucun produit trouvé avec cet identifiant.";
    }
} else {
    echo "ID du produit non spécifié.";
}
?>