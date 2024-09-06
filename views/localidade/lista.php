<!DOCTYPE html>
<html>
<head>
    <title>Lista de Localidades</title>
</head>
<body>
    <h1>Lista de Localidades</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Número</th>
            <th>CEP</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>País</th>
        </tr>
        <?php foreach ($localidades as $localidade): ?>
            <tr>
                <td><?php echo $localidade['id']; ?></td>
                <td><?php echo $localidade['rua']; ?></td>
                <td><?php echo $localidade['bairro']; ?></td>
                <td><?php echo $localidade['numero']; ?></td>
                <td><?php echo $localidade['cep']; ?></td>
                <td><?php echo $localidade['cidade']; ?></td>
                <td><?php echo $localidade['estado']; ?></td>
                <td><?php echo $localidade['pais']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
