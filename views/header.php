<?php $aktif = $_GET['page'] ?? 'home'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP Modular - Lab9Web</title>
    <link rel="stylesheet" href="/Lab9Web/assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>Pemisahan Template, Helper Function, Routing Whitelist, dan CRUD</p>
    </header>
    <nav>
        <a href="/Lab9Web/index.php?page=home" class="<?= $aktif === 'home' ? 'active' : '' ?>">Home</a>
        <a href="/Lab9Web/index.php?page=profil" class="<?= $aktif === 'profil' ? 'active' : '' ?>">Profil</a>
        <a href="/Lab9Web/index.php?page=kontak" class="<?= $aktif === 'kontak' ? 'active' : '' ?>">Kontak</a>
        <a href="/Lab9Web/index.php?page=user/list" class="<?= str_starts_with($aktif, 'user/') ? 'active' : '' ?>">Data User (CRUD)</a>
    </nav>
    <main>
        <?php tampilkanFlash(); ?>
