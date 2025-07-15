<h2>Agendar Consulta</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="msg-sucesso">Consulta agendada para ' . htmlspecialchars($_POST['data']) . ' às ' . htmlspecialchars($_POST['hora']) . '.</div>';
}
?>
<form method="post">
    <label>Data: <input type="date" name="data" required></label><br>
    <label>Hora: <input type="time" name="hora" required></label><br>
    <button type="submit">Agendar</button>
</form> 