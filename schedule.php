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
        <form class="row g-3">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="Mario" autocomplete="name">
            </div>
            <div class="col-md-6">
                <label for="cognome" class="form-label">Cognome</label>
                <input type="text" class="form-control" id="cognome" placeholder="Rossi" autocomplete="family-name">
            </div>
            <div class="col-12">
                <label for="indirizzo" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="indirizzo" placeholder="Via Roma 42" autocomplete="street-address">
            </div>
            <div class="col-md-6">
                <label for="nascita" class="form-label">Data di nascita</label>
                <input type="date" class="form-control" id="nascita" autocomplete="bday">
            </div>
            <div class="col-md-6">
                <label for="visita" class="form-label">Visita</label>
                <!--<select id="visita" class="form-select">-->
                    <?php
                    $result = query("SELECT nome FROM visita");
                    var_dump($result);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                    }
                    ?>
                <!--</select>-->
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Acconsento al trattamento dei miei dati personali secondo <a href="privacy.txt">i termini e le condizioni del servizio</a>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
</body>

</html>