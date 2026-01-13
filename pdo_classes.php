<?php

$host = '127.0.0.1';
$db   = 'eshop';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Chyba připojení k databázi: " . $e->getMessage());
}

$sql = "SELECT id, nazev, popis, cena, skladem FROM produkty ORDER BY cena DESC";
$stmt = $pdo->query($sql);

$produkty = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Výpis produktů z PDO</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .price {
            color: green;
            font-weight: bold;
        }
    </style>
    </head>
<body>

<div class="container">
    <h1>Produkty z Databáze (PDO::FETCH_OBJ)</h1>

    <?php if (empty($produkty)): ?>
        <p style="text-align: center; color: gray;">Databáze je prázdná, vložte data do tabulky 'produkty'.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Popis</th>
                    <th>Cena</th>
                    <th>Skladem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produkty as $produkt): ?>
                    <tr>
                        <td><?= htmlspecialchars($produkt->id) ?></td>
                        <td><strong><?= htmlspecialchars($produkt->nazev) ?></strong></td>
                        <td><?= htmlspecialchars($produkt->popis) ?></td>
                        <td class="price"><?= number_format($produkt->cena, 0, ',', ' ') ?> Kč</td>
                        <td><?= htmlspecialchars($produkt->skladem) ?> ks</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>