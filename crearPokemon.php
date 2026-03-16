<?php
require "Pokemon.php";
require "Entrenadora.php";
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eclosionar Pokemon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="cabecera">
        <img src="" alt="pokeball">
        <ul class="navegacion">
            <li><a href="crearPokemon.php">Eclosiona un Pokemon</a></li>
            <li><a href="miPC.php"><h1>Mi PC</h1></a></li>
            <li><a href="crearEntrenadora.php">Recluta una entrenadora</a></li>
        </ul>
    </nav>
    <section>
        <form action="" method="post">
            <h1>Crear Pokemon</h1>
            <article class="campo-form">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" required>
            </article>
            <article class="campo-form">
                <label for="tipo">Tipo: </label>
                <input type="text" name="tipo" id="tipo" required>
            </article>
            <article class="campo-form">
                <p><label for="elemento">Elementos: </label></p>
                <input type="text" name="elemento[]" id="elemento" required>
                <input type="text" name="elemento[]" id="elemento">
                <input type="text" name="elemento[]" id="elemento">
            </article>
            <article class="campo-form">
                <label for="ataque">Ataque: </label>
                <input type="text" name="ataque" id="ataque" required>
                <label for="damage">Daño: </label>
                <input type="number" name="damage" id="damage" required>
                <label for="precision">Precisión: </label>
                <input type="number" min="10" max="100" name="precision" id="precision" required>
            </article>
            <article class="campo-form">
                <label for="vida">Vida: </label>
                <input type="number" name="vida" id="vida" required>
            </article>
        </form>
    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["elemento"]) && isset($_POST["ataque"]) && isset($_POST["damage"]) && isset($_POST["vida"]) && isset($_POST["precision"])) {
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $elemento = $_POST["elemento"];
        $ataque = $_POST["ataque"];
        $damage = $_POST["damage"];
        $vida = $_POST["vida"];
        $precision = $_POST["precision"];

        if (!isset($_SESSION['pokemones'])){
            $_SESSION['pokemones'] = [];
        }

        $pokemon = new Pokemon($nombre, $tipo, $elemento, $ataque, $damage, $precision, $vida);
        $_SESSION['pokemones'][] = $pokemon;
        echo "<section class='respuesta'>";
        echo "<p>Enhorabuena, un $pokemon->MostrarInfo() salvaje ha eclosionado</p>";
        echo "</section>";
    }
    ?>


</body>
</html>
