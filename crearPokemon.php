<?php
require_once "Pokemon.php";
require_once "Entrenadora.php";
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
            <li><a href="miPC.php">Mi PC</a></li>
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
                <select name="elemento[]" id="elemento" required>
                    <option value="">Elementos</option>
                    <option value="agua">Agua</option>
                    <option value="fuego">Fuego</option>
                    <option value="planta">Planta</option>
                    <option value="volador">Volador</option>
                    <option value="eléctrico">Eléctrico</option>
                </select>
                <select name="elemento[]" id="elemento">
                    <option value="">Elementos</option>
                    <option value="agua">Agua</option>
                    <option value="fuego">Fuego</option>
                    <option value="planta">Planta</option>
                </select>
            </article>
            <article class="campo-form">
                <label for="movimiento">Movimiento: </label>
                <input type="text" name="movimiento" id="movimiento" required>
                <label for="damage">Potencia: </label>
                <input type="number" name="potencia" id="potencia" required>
                <label for="precision">Precisión: </label>
                <input type="number" min="10" max="100" name="precision" id="precision" required>
                <label for="usos">Usos: </label>
                <input type="number" min="5" max="30" name="usos" id="usos" required>
            </article>
            <article class="campo-form">
                <label for="vida">Vida: </label>
                <input type="number" name="vida" id="vida" required>
                <label for="ataque">Ataque: </label>
                <input type="number" name="ataque" id="ataque" required>
                <label for="defensa">Defensa: </label>
                <input type="number" name="defensa" id="defensa" required>
                <label for="velocidad">Velocidad: </label>
                <input type="number" name="velocidad" id="velocidad" required>
            </article>
            <input type="submit" value="Eclosionar">
        </form>
    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["elemento[]"])
            && isset($_POST["ataque"]) && isset($_POST["damage"]) && isset($_POST["vida"])
            && isset($_POST["precision"]) && $_POST['usos'] && $_POST['velocidad'] && $_POST['ataque'] && $_POST['defensa'] ) {
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $elemento = $_POST["elemento"];
        $movimiento = $_POST["movimiento"];
        $potencia = $_POST["potencia"];
        $vida = $_POST["vida"];
        $precision = $_POST["precision"];
        $usos = $_POST["usos"];
        $ataque = $_POST["ataque"];
        $defensa = $_POST["defensa"];
        $velocidad = $_POST["velocidad"];

        if (!isset($_SESSION['pokemones'])){
            $_SESSION['pokemones'] = [];
        }

        $pokemon = new Pokemon($nombre, $tipo, $elemento, $ataque, $potencia, $precision, $usos, $vida, $ataque, $defensa, $velocidad);
        $_SESSION['pokemones'][] = $pokemon;

        echo "<section class='respuesta'>";
        echo "<p>Enhorabuena, un ".$pokemon->MostrarInfo(). " salvaje ha eclosionado</p>";
        echo "</section>";
    }
    ?>


</body>
</html>
