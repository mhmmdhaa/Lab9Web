<?php
$profilTeks = 'Proyek Lab9Web merupakan hasil refactoring aplikasi PHP prosedural menjadi struktur direktori modular yang rapi, aman dari path traversal, serta mudah dipelihara untuk pengembangan fitur lanjutan.';
$biayaLayanan = 150000;
?>
<section class="content">
    <h2>Profil Aplikasi</h2>
    <p><?= e(ringkasTeks($profilTeks, 140)) ?></p>
    <ul>
        <li><strong>Arsitektur:</strong> Front Controller Router (<code>index.php</code>)</li>
        <li><strong>Keamanan:</strong> Whitelist Routing, Escaping XSS, dan Prepared Statement MySQLi</li>
        <li><strong>Estimasi Biaya Modul:</strong> <?= e(formatRupiah($biayaLayanan)) ?> (Diskon 10%: <?= e(formatRupiah(hitungDiskon($biayaLayanan))) ?>)</li>
    </ul>
</section>
