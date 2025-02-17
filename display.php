<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <button onclick="location.href='index.php'">Ajouter un Produit</button>
    <form method="post" action="">
        <input type="submit" name="filter" value="Afficher Produits Filtrés">
        <input type="submit" name="reset" value="Retour à la Liste Complète">
    </form>
    <table cellspacing="0" border="1">
        <thead>
            <tr>
                <th>id_Produit</th>
                <th>Prod_Code</th>
                <th>Prod_Designation</th>
                <th>Prod_Prix_A</th>
                <th>Prod_Marge</th>
                <th>Prod_Quantite_St</th>
                <th>Prod_Seuil</th>
                <th>id_Four</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="productTable">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "projet";


            $conn = mysqli_connect($servername, $username, $password, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if (isset($_POST['filter'])) {
                $sql = "SELECT * FROM stock WHERE prod_quantite_s1 > 2 * prod_seuil ORDER BY id_produit";
            } else {
                $sql = "SELECT * FROM stock ORDER BY id_produit";
            }

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $prix = $row["prod_prix_a"];
                    if (isset($_POST['filter'])) {
                        $prix /= 2;
                    }
                    echo "<tr>";
                    echo "<td>" . $row["id_produit"] . "</td>";
                    echo "<td>" . $row["prod_code"] . "</td>";
                    echo "<td>" . $row["prod_designation"] . "</td>";
                    echo "<td>" . number_format($prix, 2) . "</td>";
                    echo "<td>" . $row["prod_marge"] . "</td>";
                    echo "<td>" . $row["prod_quantite_s1"] . "</td>";
                    echo "<td>" . $row["prod_seuil"] . "</td>";
                    echo "<td>" . $row["id_fournisseur"] . "</td>";
                    echo "<td>";
                    echo "<button onclick=\"location.href='modifier_prod.php?id=" . $row["id_produit"] . "'\">Modifier</button>";
                    echo "<button onclick=\"location.href='suprimer.php?id=" . $row["id_produit"] . "'\">Supprimer</button>";
                    echo "<button onclick=\"location.href='Details_prod.php?id=" . $row["id_produit"] . "'\">Details</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Aucun enregistrement trouvé.</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>

