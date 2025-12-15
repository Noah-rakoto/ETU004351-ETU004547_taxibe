<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste voiture</title>
</head>
<body>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Jour</th>
                <th>Chauffeur</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Km total</th>
                <th>Total recette</th>
                <th>Total carburant</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($trajets)) : ?>
            <?php foreach ($trajets as $trajet): ?>
                <tr>
                    <td><?= htmlspecialchars($trajet['jour'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($trajet['chauffeur'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($trajet['marque'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($trajet['modele'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= number_format((float)($trajet['km_total'] ?? 0), 2, '.', ' ') ?></td>
                    <td><?= number_format((float)($trajet['total_recette'] ?? 0), 2, '.', ' ') ?></td>
                    <td><?= number_format((float)($trajet['total_carburant'] ?? 0), 2, '.', ' ') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="7">Aucun trajet trouvé.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>