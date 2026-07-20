<?php
require_once __DIR__ . '/data.php';

// map category_id => ten danh muc
$categoryMap = [];
foreach ($categories as $c) {
    $categoryMap[$c['id']] = $c['name'];
}

$tong = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MiniShop — Catalog (Buoi 1)</title>
    <style>
        table { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 5px; border: 1px solid black; }
        th { background: #ccc; }
    </style>
</head>
<body>
    <h2>Danh sach hang hoa</h2>
    <table border="1">
        <tr>
            <th>Ma hang</th>
            <th>Phan loai</th>
            <th>Ten san pham</th>
            <th>Don gia</th>
            <th>So luong ton</th>
            <th>Thanh tien</th>
        </tr>
        <?php foreach ($products as $p): 
            $tt = $p['price'] * $p['qty'];
            $tong = $tong + $tt;
            $tenDanhMuc = $categoryMap[$p['category_id']] ?? '—';
        ?>
        <tr>
            <td><?php echo htmlspecialchars($p['sku'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($tenDanhMuc, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo $p['price']; ?></td>
            <td><?php echo $p['qty']; ?></td>
            <td><?php echo $tt; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Tong gia tri kho = <?php echo $tong; ?></p>
    <p>So san pham = <?php echo count($products); ?></p>

    <h2>Debug</h2>
    <pre><?php var_dump($products); ?></pre>
</body>
</html>

<!-- MS_EXPECT product_count=8 inventory_value=41380000 -->