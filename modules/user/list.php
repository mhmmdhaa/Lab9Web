<?php
$result = mysqli_query($conn, "SELECT id, nama, email, role FROM users ORDER BY id ASC");
?>
<section class="content">
    <div class="header-row">
        <h2>Data Pengguna</h2>
        <a href="/Lab9Web/index.php?page=user/add" class="btn">+ Tambah Pengguna</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= e($row['nama']) ?></td>
                        <td><?= e($row['email']) ?></td>
                        <td><?= e($row['role']) ?></td>
                        <td class="aksi">
                            <a href="/Lab9Web/index.php?page=user/edit&id=<?= (int) $row['id'] ?>" class="btn-sm">Edit</a>
                            <form method="post" action="/Lab9Web/index.php?page=user/delete" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                                <button type="submit" class="btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;">Belum ada data pengguna.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>
