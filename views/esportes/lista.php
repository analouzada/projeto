<!DOCTYPE html>
<html>
<head>
    <title>Lista de Esportes</title>
</head>
<body>
    <h1>Lista de Esportes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Modalidade</th>
            <th>Ano da Olimpíada</th>
        </tr>
        <?php foreach ($esportes as $esporte): ?>
            <tr>
                <td><?php echo $esporte['id']; ?></td>
                <td><?php echo $esporte['modalidade']; ?></td>
                <td><?php echo $esporte['ano_olimpiada']; ?></td>
                <?php
                                echo "<td><a class='btn-editar' style='color:blue;'
                                href='atualizaresporte.php?id={$esporte['id']}'>Atualizar</a></td>";

                            ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
