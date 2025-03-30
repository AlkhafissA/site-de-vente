<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8">
<title>Affichage des Clients</title>
</head>
<body>
<h1>Liste des Clients</h1>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "root"; // Par défaut, le nom d'utilisateur est 'root'
$password = ""; // Par défaut, le mot de passe est vide
$dbname = "Base de donné 1"; // Nom de votre base de données
// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Requête SQL pour récupérer les données
$sql = "SELECT ID_Client, Nom, Prenom, Email, Telephone, Adresse, Ville, Code_Postal, Pays,
Date_Inscription, Derniere_Connexion FROM clients";
$result = $conn->query($sql);
// Afficher les données dans un tableau HTML
if ($result->num_rows > 0) {
echo
"<table
border='1'><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</
th><th>Adresse</th><th>Ville</th><th>Code
Postal</th><th>Pays</th><th>Date
Inscription</th><th>Dernière Connexion</th></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["ID_Client"]. "</td><td>" . $row["Nom"]. "</td><td>" .
$row["Prenom"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Telephone"]. "</td><td>" .
$row["Adresse"]. "</td><td>" . $row["Ville"]. "</td><td>" . $row["Code_Postal"]. "</td><td>" .
$row["Pays"].
"</td><td>"
.
$row["Date_Inscription"].
"</td><td>"
.
$row["Derniere_Connexion"]. "</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}
// Fermer la connexion
$conn->close();
?>
</body>
</html>