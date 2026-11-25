<?php
$hasilPesan = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    if ($nama === '' || $pesan === '') {
        $hasilPesan = '<div class="alert alert-error">Nama dan pesan wajib diisi.</div>';
    } elseif (!validasiEmail($email)) {
        $hasilPesan = '<div class="alert alert-error">Format email tidak valid!</div>';
    } else {
        $hasilPesan = '<div class="alert alert-success">Terima kasih, ' . e($nama) . '. Pesan dari ' . e($email) . ' berhasil divalidasi.</div>';
    }
}
?>
<section class="content">
    <h2>Kontak Kami</h2>
    <?= $hasilPesan ?>
    <form method="post" action="/Lab9Web/index.php?page=kontak" class="form-box">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>Alamat Email</label>
        <input type="text" name="email" placeholder="contoh@domain.com" required>

        <label>Pesan</label>
        <textarea name="pesan" rows="4" required></textarea>

        <button type="submit" class="btn">Kirim Pesan</button>
    </form>
</section>
