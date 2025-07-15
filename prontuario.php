<h2>Atualizar Prontuário</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="msg-sucesso">Prontuário atualizado para o paciente ' . htmlspecialchars($_POST['paciente']) . '.</div>';
}
?>
<form method="post">
    <label>Paciente: <input type="text" name="paciente" required></label><br>
    <label>Observações:<br><textarea name="obs" required></textarea></label><br>
    <button type="submit">Salvar</button>
</form> 