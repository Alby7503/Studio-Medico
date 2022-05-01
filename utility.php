<?php
const db_name = 'studio_medico';
function bootstrap()
{
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
}

function navbar()
{
    echo file_get_contents('navbar.html');
}

function connect()
{
    $conn = new mysqli('127.0.0.1', 'root', '');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $dbExists = $conn->query('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "' . db_name . '"');
    if (!$dbExists) {
        $sql = explode(';', file_get_contents('SM.sql'));
        foreach ($sql as $query)
            if (trim($query) != '')
                $conn->query($query);
    }
    $conn->select_db(db_name);

    return $conn;
}

function query($sql)
{
    $conn = connect();
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function bind_query($sql, $params)
{
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    $insert_id = $stmt->insert_id;
    $stmt->close();
    $conn->close();
    return array($insert_id, $result);
}
