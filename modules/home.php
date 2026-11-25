<?php
$deskripsi = 'Aplikasi ini dibangun menerapkan konsep modularisasi PHP dengan memisahkan konfigurasi database, template layout, fungsi pembantu (helper), dan sistem routing berbasis whitelist.';
$hargaPaket = 250000;
$hargaPromo = hitungDiskon($hargaPaket, 20);
?>
<section class="content">
    <h2>Halaman Home</h2>
    <p><?= e(ringkasTeks($deskripsi, 120)) ?></p>

    <div class="card">
        <h3>Contoh Penggunaan Helper Harga &amp; Diskon</h3>
        <p>Harga Normal: <strong><?= e(formatRupiah($hargaPaket)) ?></strong></p>
        <p>Harga Setelah Diskon 20%: <strong><?= e(formatRupiah($hargaPromo)) ?></strong></p>
    </div>
</section>
