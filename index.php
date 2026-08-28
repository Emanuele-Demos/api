<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/conn.php';
include $_SERVER['DOCUMENT_ROOT'] . '/views/header.php';
?>

<main>
    <h1>pagina pubblica</h1>
</main>

<div classe="container">
    <div class="row">
        <div class="col-12">
        </div>
        <h2>Articoli PUBBLICI</h2>

    <?php
    // da modificare spostandola nei models
    $sql = "SELECT a.id_articolo,
            a.titolo,
            a.private,
            ar.nome AS argomento
    FROM articoli a
    INNER JOIN argomenti ar
    ON a.id_argomento = ar.id_argomento
    WHERE a.private = 0
    ORDER BY a.id_articolo DESC";


    $articoli = $conn->query($sql);

    ?>

    <?php if($articoli->num_rows > 0){ ?>

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Titolo</th>

                    <th>Argomento</th>

                    <th>Visualizza</th>

                </tr>

            </thead>

            <tbody>

                <?php while($articolo = $articoli->fetch_assoc()){ ?>

                    <tr>

                        <td>

                            <?php echo $articolo["id_articolo"]; ?>

                        </td>

                        <td>

                            <?php echo htmlspecialchars($articolo["titolo"]); ?>

                        </td>

                        <td>

                            <?php echo htmlspecialchars($articolo["argomento"]); ?>

                        </td>

                        <td>

                            <a
                                href="articolo_pubblico.php?id=<?php echo $articolo["id_articolo"]; ?>"
                                class="btn btn-success">

                                Leggi

                            </a>

                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    <?php } else { ?>

        <div class="alert alert-warning">

            Nessun articolo presente.

        </div>

    <?php } ?>
    </div>
</div>

<?php
include BASE_PATH . '/views/footer.php';