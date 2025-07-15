<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SUS do Paraguai</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>SUS do Paraguai</h1>
        <nav>
            <ul>
                <li><a href="?pagina=home">Início</a></li>
                <li><a href="?pagina=paciente">Área do Paciente</a></li>
                <li><a href="?pagina=medico">Área do Médico</a></li>
                <li><a href="?pagina=sobre">Sobre</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
        $permitidas = [
            'paciente', 'agendar', 'ver_consultas', 'perfil_paciente',
            'medico', 'consultas_medico', 'prontuario', 'perfil_medico',
            'sobre', 'home'
        ];
        if (!in_array($pagina, $permitidas)) {
            $pagina = 'home';
        }
        include $pagina . '.php';
        ?>
    </main>
    <footer>
        <p>&copy; 2024 SUS do Paraguai - Hospital Público</p>
    </footer>
</body>
</html>