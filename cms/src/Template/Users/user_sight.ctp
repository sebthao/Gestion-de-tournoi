<?php
session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>page Admin</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<img src="http://ehn.ens-lyon.fr/images/logo-lyon1.png">

<h1>Bonjour <?= $loginUser; ?></h1>
<h3>Vos tournois : </h3>
<ul>
<?php
foreach($tournois as $tournament){
    echo "<li>".$tournament["tournamentname"]."</li>";
}
?>
</ul>

</body>
</html>