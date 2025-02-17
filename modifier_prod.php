<?php
include("conn.php");
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nouveauPrix = $_POST["nouveau_prix"];

        // Mettre à jour le produit dans la base de données
        $sql = "UPDATE stock SET prod_prix_a=$nouveauPrix WHERE id_produit=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Produit mis à jour avec succès.";
            header("Location: display.php"); 
            exit();
        } else {
            echo "Erreur lors de la mise à jour du produit: " . $conn->error;
        }
    }
} else {
    echo "ID du produit non spécifié.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="modifier.css">
</head>
<body>

<h2>Modifier Produit</h2>

<?php

echo "<form method='post' action=''>";
echo "Nouveau Prix: <input type='text' name='nouveau_prix'>";
echo "<input type='submit' value='Mettre à Jour'>";
echo "</form>";
?>

</body>
</html>