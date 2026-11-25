<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    setFlash('error', 'ID pengguna tidak valid.');
    header('Location: /Lab9Web/index.php?page=user/list');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role  = trim($_POST['role'] ?? 'User');

    if ($nama === '' || !validasiEmail($email)) {
        setFlash('error', 'Nama wajib diisi dan email harus valid.');
        header('Location: /Lab9Web/index.php?page=user/edit&id=' . $id);
        exit;
    }

    $stmt = mysqli_prepare($conn, "UPDATE users SET nama = ?, email = ?, role = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'sssi', $nama, $email, $role, $id);

    if (mysqli_stmt_execute($stmt)) {
        setFlash('sukses', 'Data pengguna berhasil diperbarui.');
    } else {
        setFlash('error', 'Gagal memperbarui data pengguna.');
    }
    header('Location: /Lab9Web/index.php?page=user/list');
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT id, nama, email, role FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$user) {
    setFlash('error', 'Data pengguna tidak ditemukan.');
    header('Location: /Lab9Web/index.php?page=user/list');
    exit;
}
?>
<section class="content">
    <h2>Edit Pengguna</h2>
    <form method="post" action="/Lab9Web/index.php?page=user/edit&id=<?= (int) $user['id'] ?>" class="form-box">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= e($user['nama']) ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= e($user['email']) ?>" required>

        <label>Role</label>
        <select name="role">
            <option value="User" <?= $user['role'] === 'User' ? 'selected' : '' ?>>User</option>
            <option value="Admin" <?= $user['role'] === 'Admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <div>
            <button type="submit" class="btn">Update</button>
            <a href="/Lab9Web/index.php?page=user/list" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</section>
