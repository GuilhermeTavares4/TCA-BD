<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

    if (isset($_POST["submit"])){            
        $login = "select email, senha from usuarios";
        $result = pg_query($dbconn, $login);
        $guidiimestre = false;

        while ($row = pg_fetch_row($result)) {
            if ($row[0] == $_POST["email"]) {
                $guidiimestre = true;
                if(password_verify($_POST["senha"], $row[1])) {
                    $_SESSION["email"] = $_POST["email"];
                    $query = "SELECT tipo, nome FROM usuarios WHERE email = '{$_POST['email']}'";
                    $result2 = pg_query($dbconn, $query);
                    while ($row = pg_fetch_row($result2)) {
                        $_SESSION["tipo"] = $row[0];                        
                        $_SESSION["nome"] = $row[1];                        
                    }
                    header("Location: http://localhost:8080/main.php");
                    break;
                } else {
                    header("Location: http://localhost:8080/index.php?err=1");
                    break;
                }
            }
        }

        if (!$guidiimestre) {
            header("Location: http://localhost:8080/index.php?err=0");
        }
    }
?>