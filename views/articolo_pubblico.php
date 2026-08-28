<?php

require_once "conn.php"

$id = intval($_GET["id"]);

$title = "Visualizza Articolo";

include "header.php";

// Recupera l'articolo con il relativo argomento
$sql = "SELECT
            articoli.id_articolo,
            articoli.titolo,
            articoli.corpo,
            argomenti.nome
        FROM articoli
        INNER JOIN argomenti
            ON a.id_argomento = ar.id_argomento
        WHERE a.id_articolo = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {

    echo "<div class='container mt-5'>";
    echo "<div class='alert alert-danger'>";
    echo "Articolo non trovato.";
    echo "</div>";
    echo "</div>";

    include "footer.php";
    exit();
}

$articolo = $result->fetch_assoc();

?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2>
                <?php echo htmlspecialchars($articolo["titolo"]); ?>
            </h2>

        </div>

        <div class="card-body">

            <p>
                <strong>Argomento:</strong>
                <?php echo htmlspecialchars($articolo["argomento"]); ?>
            </p>

            <hr>

            <p style="text-align: justify; white-space: pre-line;">
                <?php echo htmlspecialchars($articolo["corpo"]); ?>
            </p>

        </div>

        <div class="card-footer">

            <a href="articoli.php" class="btn btn-secondary">
                Torna agli articoli
            </a>

        </div>

    </div>

</div>

<?php

$stmt->close();
$conn->close();

include "footer.php";

?>