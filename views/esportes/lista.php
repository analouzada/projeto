<!DOCTYPE html>
<html>
<head>
    <title>Lista de Esportes</title>
</head>
<body>
    <h1>Lista de Esportes</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Modalidade</th>
            <th>Ano da Olimpíada</th>
        </tr>
        <?php foreach ($esportes as $esporte): ?>
            <tr>
                <td><?php echo $esporte['id_esporte']; ?></td>
                <td><?php echo $esporte['modalidade']; ?></td>
                <td><?php echo $esporte['ano_olimpiada']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
