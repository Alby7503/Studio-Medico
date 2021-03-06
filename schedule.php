<?php
require_once 'utility.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazione</title>
    <?php bootstrap(); ?>
</head>

<body>
    <div class="container">
        <p><?php navbar(); ?></p>
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
                <input type="date" class="form-control form-control-sm" id="nascita" name="data_nascita" autocomplete="bday" required>
            </div>
            <!--Data-Ora visita-->
            <div class="col-md-6">
                <label for="data-ora_visita" class="form-label">Data-Ora visita</label>
                <input type="datetime-local" class="form-control" id="data-ora_visita" name="data-ora_visita" required>
            </div>
            <!--Tipo visita-->
            <div class="col-md-6">
                <label for="visita" class="form-label">Visita</label>
                <select id="visita" class="form-select form-select-lg" name="visita" required>
                    <?php
                    $result = query("SELECT id_visita, nome, costo FROM visita");
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_visita'] . '">' . $row['nome'] . ' (' . $row['costo'] . '???)</option>';
                    }
                    ?>
                </select>
            </div>
            <!--Privacy-->
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="privacy" required>
                    <label class="form-check-label" for="privacy">
                        Acconsento al trattamento dei miei dati personali secondo i <a href="privacy.txt">termini e le condizioni del servizio</a>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Prenota</button>
            </div>
        </form>
        <br>
        <?php
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
                if (isset($_POST[$key]) and !empty($_POST[$key])) {
                    $paziente[$key] = $_POST[$key];
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    <strong>Errore!</strong> Non hai inserito tutti i dati richiesti.
                    </div>';
                    die();
                }
            }
            $sql = 'INSERT INTO paziente(';
            $sql .= implode(',', array_keys($paziente));
            $sql .= ') VALUES (';
            $sql .= str_repeat('?,', count($paziente) - 1);
            $sql .= '?)';
            list($id_paziente, $result) = bind_query($sql, array_values($paziente));

            $visita = $_POST['visita'];
            $medico = 'SELECT id_medico FROM medico WHERE cod_specializzazione = (SELECT cod_specializzazione FROM visita WHERE id_visita = ?)';
            $medico = bind_query($medico, [$visita])[1]->fetch_assoc()['id_medico'];
            list($data, $ora) = explode('T', $_POST['data-ora_visita']);

            $appuntamento = [
                'cod_medico' => $medico,
                'cod_visita' => $visita,
                'cod_paziente' => $id_paziente,
                'data' => $data,
                'ora' => $ora
            ];

            $sql = 'INSERT INTO prenotazione(';
            $sql .= implode(',', array_keys($appuntamento));
            $sql .= ') VALUES (';
            $sql .= str_repeat('?,', count($appuntamento) - 1);
            $sql .= '?)';
            list($id_appuntamento, $result) = bind_query($sql, array_values($appuntamento));

            if ($id_appuntamento) {
                echo '<div class="alert alert-success" role="alert">
                    Appuntamento prenotato con successo!
                </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    Errore durante la prenotazione!
                </div>';
            }
        }
        ?>
    </div>

    <script>
        document.getElementById('data-ora_visita').min = new Date().toISOString().substring(0, 16);
    </script>
</body>

</html>