<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role  = trim($_POST['role'] ?? 'User');

    if ($nama === '' || !validasiEmail($email)) {
        setFlash('error', 'Nama wajib diisi dan format email harus valid.');
        header('Location: /Lab9Web/index.php?page=user/add');
        exit;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO users (nama, email, role) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sss', $nama, $email, $role);

    if (mysqli_stmt_execute($stmt)) {
        setFlash('sukses', 'Data pengguna berhasil ditambahkan.');
    } else {
        setFlash('error', 'Gagal menyimpan data (email mungkin sudah terdaftar).');
    }
    header('Location: /Lab9Web/index.php?page=user/list');
    exit;
}
?>
<section class="content">
    <h2>Tambah Pengguna</h2>
    <form method="post" action="/Lab9Web/index.php?page=user/add" class="form-box">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Role</label>
        <select name="role">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select>

        <div>
            <button type="submit" class="btn">Simpan</button>
            <a href="/Lab9Web/index.php?page=user/list" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</section>
