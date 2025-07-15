<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Hospital Vida Saudável</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Hospital Vida Saudável</h1>
        <nav>
            <ul>
                <li><a href="?pagina=paciente">Área do Paciente</a></li>
                <li><a href="?pagina=medico">Área do Médico</a></li>
                <li><a href="?pagina=sobre">Sobre</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
        switch($pagina) {
            case 'paciente':
                echo '<h2>Área do Paciente</h2>';
                echo '<ul>';
                echo '<li><a href="?pagina=agendar">Agendar Consulta</a></li>';
                echo '<li><a href="?pagina=ver_consultas">Ver Consultas</a></li>';
                echo '<li><a href="?pagina=perfil_paciente">Perfil</a></li>';
                echo '</ul>';
                break;
            case 'agendar':
                echo '<h2>Agendar Consulta</h2>';
                echo '<form><label>Data: <input type="date" name="data"></label><br><label>Hora: <input type="time" name="hora"></label><br><button type="submit">Agendar</button></form>';
                break;
            case 'ver_consultas':
                echo '<h2>Consultas Agendadas</h2>';
                echo '<p>Você não possui consultas agendadas.</p>';
                break;
            case 'perfil_paciente':
                echo '<h2>Perfil do Paciente</h2>';
                echo '<p>Nome: João da Silva<br>Idade: 35<br>Plano: Ouro</p>';
                break;
            case 'medico':
                echo '<h2>Área do Médico</h2>';
                echo '<ul>';
                echo '<li><a href="?pagina=consultas_medico">Consultas Marcadas</a></li>';
                echo '<li><a href="?pagina=prontuario">Atualizar Prontuário</a></li>';
                echo '<li><a href="?pagina=perfil_medico">Perfil</a></li>';
                echo '</ul>';
                break;
            case 'consultas_medico':
                echo '<h2>Consultas Marcadas</h2>';
                echo '<p>Hoje: 14h - João da Silva<br>Amanhã: 10h - Maria Souza</p>';
                break;
            case 'prontuario':
                echo '<h2>Atualizar Prontuário</h2>';
                echo '<form><label>Paciente: <input type="text" name="paciente"></label><br><label>Observações:<br><textarea name="obs"></textarea></label><br><button type="submit">Salvar</button></form>';
                break;
            case 'perfil_medico':
                echo '<h2>Perfil do Médico</h2>';
                echo '<p>Nome: Dr. Carlos Pereira<br>Especialidade: Cardiologia</p>';
                break;
            case 'sobre':
                echo '<h2>Sobre o Hospital</h2>';
                echo '<p>O Hospital Vida Saudável oferece atendimento de excelência há mais de 20 anos.</p>';
                break;
            default:
                echo '<h2>Bem-vindo ao Hospital Vida Saudável</h2>';
                echo '<p>Escolha uma das áreas acima para acessar as funcionalidades.</p>';
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Hospital Vida Saudável</p>
    </footer>
</body>
</html>