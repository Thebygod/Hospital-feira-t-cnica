<?php
    
    // Faz a conexão do arquivo conexao.php
    include_once('conexao.php');

    // Inicia uma nova seção quando abrir o site
    session_start();

    // Rodar o código quando o formulário "POST" for enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);  // Verifica usuário e senha removendo espaços extras
    $password = trim($_POST['password']);

        // Consulta no banco
        $sql = "SELECT id, username, password, tipo_usuario FROM usuarios WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifica a senha
            // Se estiver usando texto puro: ($password === $row['password'])
            // Se estiver usando hash: password_verify($password, $row['password'])
            if ($password === $row['password']) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

                // Se deu certo, vai pra main.php
                header("Location: main.php");
                exit;
            } else {
                // Senha incorreta
                $_SESSION['erro_login'] = "Usuário ou senha incorretos.";
                header("Location: login.html");
                exit;
            }
        } else {
            // Usuário não encontrado
            $_SESSION['erro_login'] = "Usuário ou senha incorretos.";
            header("Location: login.html");
            exit;
        }
    }

?>