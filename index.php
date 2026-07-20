<?php
require_once __DIR__ . '/data.php';

// tim ten danh muc theo id
function tenDM(int $id, array $cats): string {
    foreach ($cats as $c) {
        if ($c['id'] === $id) {
            return $c['name'];
        }
    }
    return 'Khong xac dinh';
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
            <th>STT</th>
            <th>Ma hang</th>
            <th>Phan loai</th>
            <th>Ten san pham</th>
            <th>Don gia</th>
            <th>So luong ton</th>
            <th>Thanh tien</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($products as $p): 
            $tt = $p['price'] * $p['qty'];
            $tong = $tong + $tt;
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo htmlspecialchars($p['sku']); ?></td>
            <td><?php echo tenDM($p['category_id'], $categories); ?></td>
            <td><?php echo htmlspecialchars($p['name']); ?></td>
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