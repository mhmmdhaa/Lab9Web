<?php
function e(?string $nilai): string
{
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float
{
    $potongan = $harga * ($persen / 100);
    return max(0, $harga - $potongan);
}

function validasiEmail(string $email): bool
{
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $batas = 80): string
{
    $bersih = trim(strip_tags($teks));
    if (mb_strlen($bersih) <= $batas) {
        return $bersih;
    }
    return mb_substr($bersih, 0, $batas) . '...';
}

function setFlash(string $tipe, string $pesan): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function tampilkanFlash(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        $kelas = $flash['tipe'] === 'sukses' ? 'alert-success' : 'alert-error';
        echo '<div class="alert ' . e($kelas) . '">' . e($flash['pesan']) . '</div>';
    }
}
