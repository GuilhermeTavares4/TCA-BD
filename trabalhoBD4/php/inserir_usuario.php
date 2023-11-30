<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

    if (isset($_POST["submit"])){
        if ($_POST["senha"] === $_POST["confsenha"]){                
            $emails = "select email from usuarios";
            $result = pg_query($dbconn, $emails);
            $guidiimestre = false;

            while ($row = pg_fetch_row($result)) {
                if ($row[0] === $_POST["email"]) {
                    $guidiimestre = true;
                    break;
                }
            }

            if(!$guidiimestre) {
                $hashed = password_hash($_POST["senha"], PASSWORD_DEFAULT);
                $query = "insert into usuarios (nome, email, senha, tipo) values ('{$_POST["nome"]}', '{$_POST["email"]}',  '{$hashed}',  {$_POST["tipo"]})";
                pg_query($dbconn, $query);
                header("Location: http://localhost:8080/index.php");
            }
        }
    }
?>