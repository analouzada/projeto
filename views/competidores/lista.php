<!DOCTYPE html>
<html>
<head>
    <title>Lista de Competidores</title>
</head>
<body>
    <h1>Lista de Competidores</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Peso</th>
            <th>Altura</th>
            <th>Sexo</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Equipe</th>
        </tr>
        <?php foreach ($competidores as $competidor): ?>
            <tr>
                <td><?php echo $competidor['id_competidor']; ?></td>
                <td><?php echo $competidor['nome']; ?></td>
                <td><?php echo $competidor['idade']; ?></td>
                <td><?php echo $competidor['peso']; ?></td>
                <td><?php echo $competidor['altura']; ?></td>
                <td><?php echo $competidor['sexo']; ?></td>
                <td><?php echo $competidor['cpf']; ?></td>
                <td><?php echo $competidor['rg']; ?></td>
                <td><?php echo $competidor['equipe']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

