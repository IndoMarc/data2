<?php

$fileName = 'produk_1771054531331.json';

if (file_exists($fileName)) {
    $jsonData = file_get_contents($fileName);
    $produkList = json_decode($jsonData, true);

    if (!empty($produkList)) {
        echo "<table border='1' cellpadding='10'>";
        echo "<thead>
                <tr>
                    <th>PLU</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Barcode</th>
                    <th>Rak</th>
                </tr>
              </thead>";
        echo "<tbody>";

        foreach ($produkList as $produk) {
            $barcode = isset($produk['BARCD']) ? implode(', ', $produk['BARCD']) : '-';
            
            echo "<tr>";
            echo "<td>" . $produk['PLU'] . "</td>";
            echo "<td>" . $produk['DESC2'] . "</td>";
            echo "<td>" . number_format($produk['PRICE'], 0, ',', '.') . "</td>";
            echo "<td>" . $barcode . "</td>";
            echo "<td>" . $produk['NAMA_RAK'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "File JSON kosong atau format salah.";
    }
} else {
    echo "File $fileName tidak ditemukan.";
}

?>