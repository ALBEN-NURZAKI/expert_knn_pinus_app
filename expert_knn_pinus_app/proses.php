<?php
require 'cf_rules.php';
require 'knn_data.php';

function hitung_jarak($d1, $t1, $d2, $t2) {
    return sqrt(pow($d1 - $d2, 2) + pow($t1 - $t2, 2));
}

// Ambil input dari form
$diameter = floatval($_POST['diameter']);
$tinggi = floatval($_POST['tinggi']);

// ----------------------------
// KNN
$jarak_data = [];

foreach ($data_latih as $data) {
    $jarak = hitung_jarak($diameter, $tinggi, $data['diameter'], $data['tinggi']);
    $jarak_data[] = [
        'label' => $data['label'],
        'jarak' => $jarak
    ];
}

// Urutkan berdasarkan jarak terdekat
usort($jarak_data, fn($a, $b) => $a['jarak'] <=> $b['jarak']);

// Ambil K tetangga terdekat
$tetangga = array_slice($jarak_data, 0, $k);

// Hitung voting label terbanyak
$vote = [];
foreach ($tetangga as $t) {
    $vote[$t['label']] = ($vote[$t['label']] ?? 0) + 1;
}
arsort($vote);
$knn_result = array_key_first($vote);
$knn_confidence = round(($vote[$knn_result] / $k) * 100);

// ----------------------------
// Certainty Factor (CF)
$cf_result = cf_prediction($diameter, $tinggi);

// ----------------------------
// Tampilkan Hasil
echo "<!DOCTYPE html><html lang='id'><head><meta charset='UTF-8'><title>Hasil Prediksi</title>
<style>
body { font-family: Arial, sans-serif; background: #f0f8ff; padding: 30px; }
.container { background: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
h2 { color: #2e7d32; }
a { display: inline-block; margin-top: 20px; text-decoration: none; color: white; background: #2e7d32; padding: 10px 15px; border-radius: 5px; }
</style>
</head><body><div class='container'>";

echo "<h2>Hasil Prediksi Jenis Pohon Pinus</h2>";
echo "<p><strong>Input:</strong><br>Diameter: {$diameter} m<br>Tinggi: {$tinggi} m</p>";

echo "<h3>🔍 Hasil dari KNN</h3>";
echo "<p>Jenis: <strong>$knn_result</strong><br>Confidence: <strong>{$knn_confidence}%</strong></p>";

echo "<h3>🧠 Hasil dari Expert System (Certainty Factor)</h3>";
if (!empty($cf_result)) {
    foreach ($cf_result as $jenis => $cf) {
        echo "<p>Jenis: <strong>$jenis</strong><br>CF: <strong>" . ($cf * 100) . "%</strong></p>";
    }
} else {
    echo "<p>Tidak ada aturan CF yang cocok untuk data ini.</p>";
}

echo "<a href='index.php'>🔁 Coba Lagi</a>";
echo "</div></body></html>";
?>