<?php
function cf_prediction($diameter, $tinggi) {
    $cf = [];

    // Aturan Certainty Factor
    if ($diameter >= 0.08 && $diameter <= 0.10 && $tinggi >= 6.0 && $tinggi <= 7.5) {
        $cf['Douglas Fir'] = 0.85;
    }

    if ($diameter >= 0.09 && $diameter <= 0.11 && $tinggi >= 6.2 && $tinggi <= 6.9) {
        $cf['White Pine'] = 0.75;
    }

    if ($diameter >= 0.05 && $diameter <= 0.07 && $tinggi >= 4.5 && $tinggi <= 5.5) {
        $cf['Douglas Fir'] = 0.65;
    }

    if ($diameter >= 0.07 && $diameter <= 0.085 && $tinggi >= 5.5 && $tinggi <= 6.5) {
        $cf['White Pine'] = 0.6;
    }

    // Jika tidak ada aturan cocok
    if (empty($cf)) {
        $cf['Tidak Diketahui'] = 0.0;
    }

    return $cf;
}
?>