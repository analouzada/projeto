<!DOCTYPE html>
<html>
<head>
    <title>Lista de Treinadores</title>
</head>
<body>
    <h1>Lista de Treinadores</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>CPF</th>
            <th>RG</th>
        </tr>
        <?php foreach ($treinadores as $treinador): ?>
            <tr>
                <td><?php echo $treinador['id']; ?></td>
                <td><?php echo $treinador['nome']; ?></td>
                <td><?php echo $treinador['idade']; ?></td>
                <td><?php echo $treinador['altura']; ?></td>
                <td><?php echo $treinador['peso']; ?></td>
                <td><?php echo $treinador['cpf']; ?></td>
                <td><?php echo $treinador['rg']; ?></td>
                <?php
                                echo "<td><a class='btn-editar' style='color:blue;'
                                href='atualizartreinador.php?id={$treinador['id']}'>Atualizar</a></td>";

                            ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
