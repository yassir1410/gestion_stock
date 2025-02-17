
<?php

$fournisseur = $_POST['fournisseur']; // Assuming it's coming from the form

// Prepare statement to prevent SQL injection
$sql = "SELECT id_fournisseur FROM fournisseur WHERE responsable='$fournisseur'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_fournisseur = $row['id_fournisseur'];

        // Proceed with insertion
        $code = $_POST['code']; // Assuming other form fields are also submitted
        $designation = $_POST['designation'];
        $prix = $_POST['prix'];
        $marge = $_POST['marge'];
        $quantite = $_POST['quantite'];
        $seuil = $_POST['seuil'];

        $sql = "INSERT INTO stock (prod_code, prod_designation, prod_prix_a, prod_marge, prod_quantite_s1, prod_seuil, id_fournisseur) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $code, $designation, $prix, $marge, $quantite, $seuil, $id_fournisseur);
        if (mysqli_stmt_execute($stmt)) {
            // Successful insertion, redirect back to index.php
            header("Location: index.php");
            exit();
        } 
        else {
            // Error in insertion query
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    } 
    // else {
    //     // No rows returned from the query
    //     echo "No rows returned from fournisseur table.";
    // }
} 
else {
    // Error in query execution
    echo "Error: " . mysqli_error($conn);
}

// Close statement and connection
// mysqli_stmt_close($stmt);
// mysqli_close($conn);
?>
