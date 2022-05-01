<?php
require_once 'utility.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appuntamento</title>
    <?php bootstrap(); ?>
</head>

<body>
    <div class="container">
        <h1 class="text-primary">Prenota appuntamento</h1>
        <br>
        <form class="row g-3 needs-validation" method="POST">
            <!--Nome-->
            <div class="col-md-5">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Mario" autocomplete="name" required>
            </div>
            <!--Cognome-->
            <div class="col-md-5">
                <label for="cognome" class="form-label">Cognome</label>
                <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Rossi" autocomplete="family-name" required>
            </div>
            <!--Genere-->
            <div class="col-md-2">
                <label for="genere" class="form-label">Genere</label>
                <select class="form-control" id="genere" name="genere" autocomplete="sex" required>
                    <option value="M">Maschio</option>
                    <option value="F">Femmina</option>
                </select>
            </div>
            <!--Indirizzo-->
            <div class="col-6">
                <label for="indirizzo" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Via Roma 42" autocomplete="street-address" required>
            </div>
            <!--Data di nascita-->
            <div class="col-md-6">
                <label for="nascita" class="form-label">Data di nascita</label>
                <input type="date" class="form-control" id="nascita" name="data_nascita" autocomplete="bday" required>
            </div>
            <!--Data visita-->
            <div class="col-md-6">
                <label for="data-ora_visita" class="form-label">Data-Ora visita</label>
                <input type="datetime-local" class="form-control" id="data-ora_visita" name="data-ora_visita" required>
            </div>
            <!--Tipo visita-->
            <div class="col-md-6">
                <label for="visita" class="form-label">Visita</label>
                <select id="visita" class="form-select" name="visita" required>
                    <?php
                    $result = query("SELECT id_visita, nome FROM visita");
                    var_dump($result);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id_visita'] . "'>" . $row['nome'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <!--Privacy-->
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="privacy" required>
                    <label class="form-check-label" for="privacy">
                        Acconsento al trattamento dei miei dati personali secondo <a href="privacy.txt">i termini e le condizioni del servizio</a>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Prenota</button>
            </div>
        </form>
        <?php
        var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $info = [
                'nome',
                'cognome',
                //'indirizzo' => $_POST['indirizzo'],
                'data_nascita',
                'genere'
            ];
            $paziente = array();
            foreach ($info as $key) {
                $paziente[$key] = $_POST[$key];
            }
            $sql = 'INSERT INTO paziente(';
            $sql .= implode(',', array_keys($paziente));
            $sql .= ') VALUES (';
            $sql .= str_repeat('?,', count($paziente) - 1);
            $sql .= '?)';
            $result = bind_query($sql, array_values($paziente));

            $medico = 'SELECT id_medico FROM medico WHERE cod_specializzazione = ' . $_POST['visita'];
            $visita = $_POST['visita'];
            $paziente = $result->insert_id;
        }
        ?>
    </div>
</body>

</html>