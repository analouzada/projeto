<!DOCTYPE html>
<html>
<head>
    <title>Lista de Treinadores</title>
</head>
<body>
    <h1>Lista de Treinadores</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Nacionalidade</th>
        </tr>
        <?php foreach ($treinadores as $treinador): ?>
            <tr>
                <td><?php echo $treinador['id_treinador']; ?></td>
                <td><?php echo $treinador['nome']; ?></td>
                <td><?php echo $treinador['idade']; ?></td>
                <td><?php echo $treinador['nacionalidade']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
