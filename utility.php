<?php
function bootstrap()
{
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
}

function query($sql)
{
    $conn = new mysqli('127.0.0.1', 'root', '', 'studio_medico');

    //$conn = new mysqli(socket: '/Users/albertovona/.bitnami/stackman/machines/xampp/volumes/root/var/mysql/mysql.sock', port: 3306, username: 'root', password: '', database: 'studio_medico');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function bind_query($sql, $params)
{
    $conn = new mysqli('127.0.0.1', 'root', '', 'studio_medico');
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
