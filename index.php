<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de Stock</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <h1>Gestion de Stock</h1> <!-- Add the title here -->
    <form method="post" action="connection.php">    
        <label for="code">code</label>
        <input type="text" id="code" name="code" autofocus/><br>
        <label for="designation">designation</label>
        <input type="text" id="designation" name="designation" /><br>
        <label for="prix">prix</label>
        <input type="text" id="prix" name="prix" /><br>
        <label for="marge">marge</label>
        <input type="text" id="marge" name="marge" /><br>
        <label for="quantite">quantite</label>
        <input type="text" id="quantite" name="quantite" /><br>
        <label for="seuil">seuil</label>
        <input type="text" id="seuil" name="seuil" /><br>
        <label for="fournisseur">fournisseur</label>
        <select id="fournisseur" name="fournisseur" >
            <option value="gucci">gucci</option>
            <option value="louis vetton">louis vetton</option>
            <option value="prada">prada</option>
            <option value="dior">dior</option>
            <option value="chanell">chanell</option>
        </select><br>
        <input type="submit" value="enregistrer">
        <input type="reset" value="supprimer">
        
    </form>
    <button onclick="location.href='display.php'">rapport</button>
</body>
</html>
