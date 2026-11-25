<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    setFlash('error', 'Metode penghapusan tidak diizinkan.');
    header('Location: /Lab9Web/index.php?page=user/list');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    if (mysqli_stmt_execute($stmt)) {
        setFlash('sukses', 'Data pengguna berhasil dihapus.');
    } else {
        setFlash('error', 'Gagal menghapus data pengguna.');
    }
}
header('Location: /Lab9Web/index.php?page=user/list');
exit;
