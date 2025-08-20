<?php
    
    // Faz a conexão do arquivo conexao.php
    include_once('conexao.php');

    // Inicia uma nova seção quando abrir o site
    session_start();

    // Rodar o código quando o formulário "POST" for enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Verifica usuário e senha removendo espaços extras
        $username = trim($_POST['username']);  
        $password = trim($_POST['password']);

        // Consulta no banco com segurança contra sql injection
        $sql = "SELECT id, username, password, tipo_usuario FROM usuarios WHERE username = ?";

        // Prepara o SQL mas sem rodar ainda
        $stmt = $conn->prepare($sql);

        // Substitui o ? pelo real valor, sendo uma string "s"
        $stmt->bind_param("s", $username);

        // Agora executa a consulta ao banco
        $stmt->execute();

        // Guarda e verifica o resultado
        $result = $stmt->get_result();

        // Verifica se o usuário foi encontrado e/ou se há erro com o db
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
                header("Location: ../html/login.html");
                exit;
            }
        } else {
            // Usuário não encontrado
            $_SESSION['erro_login'] = "Usuário ou senha incorretos.";
            header("Location: ");
            exit;
        }
    }

?>