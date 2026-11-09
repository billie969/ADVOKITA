<?php
/** @var string $title */
/** @var string $page */
/** @var array{role: string, fullName: string}|null $user */
/** @var string|null $error */
/** @var string|null $success */
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal pengaduan dan bantuan hukum mahasiswa ADVOKITA">
    <title><?= escape($title) ?> — ADVOKITA</title>
    <link rel="icon" href="/favicon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">
  </head>
  <body class="<?= in_array($page, ['login', 'register'], true) ? 'auth-page' : '' ?>" data-page="<?= escape($page) ?>">
    <?php if (!in_array($page, ['login', 'register'], true)): ?>
      <header class="site-header bg-white border-bottom sticky-top">
        <div class="container d-flex align-items-center h-100">
          <a class="site-brand text-decoration-none" href="<?= escape(url($user['role'] === 'admin' ? 'admin' : 'dashboard')) ?>">
            <span class="brand-icon"><i class="bi bi-bank" aria-hidden="true"></i></span>
            <span><b>ADVOKITA</b><small><?= $user['role'] === 'admin' ? 'Panel Administrasi' : 'Legal Aid System' ?></small></span>
          </a>
          <?php if ($user['role'] === 'user'): ?>
            <nav class="main-nav ms-lg-5" aria-label="Navigasi utama">
              <a class="<?= $page === 'dashboard' ? 'active' : '' ?>" href="<?= escape(url('dashboard')) ?>"><i class="bi bi-house" aria-hidden="true"></i><span>Beranda</span></a>
              <a class="<?= $page === 'report' ? 'active' : '' ?>" href="<?= escape(url('report')) ?>"><i class="bi bi-plus-circle" aria-hidden="true"></i><span>Pengaduan</span></a>
              <a class="<?= in_array($page, ['history', 'detail'], true) ? 'active' : '' ?>" href="<?= escape(url('history')) ?>"><i class="bi bi-clock-history" aria-hidden="true"></i><span>Riwayat</span></a>
            </nav>
          <?php endif; ?>
          <div class="d-flex align-items-center gap-2 ms-auto">
            <div class="user-info d-none d-md-flex">
              <span class="avatar"><?= escape(strtoupper(substr($user['fullName'], 0, 1))) ?></span>
              <span><b><?= escape($user['fullName']) ?></b><small><?= $user['role'] === 'admin' ? 'Admin' : 'Mahasiswa' ?></small></span>
            </div>
            <form method="post" action="/index.php">
              <?php csrf_input(); ?>
              <input type="hidden" name="action" value="logout">
              <button class="btn btn-outline-danger btn-sm" type="submit"><i class="bi bi-box-arrow-right me-1" aria-hidden="true"></i> Keluar</button>
            </form>
          </div>
        </div>
      </header>
    <?php endif; ?>

    <?php if ($error !== null || $success !== null): ?>
      <div class="container notification-container <?= in_array($page, ['login', 'register'], true) ? 'auth-messages' : 'page-content pb-0' ?>">
        <?php if ($error !== null): ?>
          <div class="alert alert-danger" role="alert"><?= escape($error) ?></div>
        <?php endif; ?>
        <?php if ($success !== null): ?>
          <div class="alert alert-success" role="status"><?= escape($success) ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php require APP_ROOT . '/templates/pages/' . $page . '.php'; ?>

    <?php if (!in_array($page, ['login', 'register'], true)): ?>
      <footer class="site-footer">
        <div class="container d-flex flex-column flex-sm-row justify-content-between gap-2">
          <b>ADVOKITA</b><span>Lembaga Bantuan Hukum Kampus</span>
        </div>
      </footer>
      <?php if ($user['role'] === 'user'): ?>
        <nav class="main-nav mobile-nav" aria-label="Navigasi seluler">
          <a class="<?= $page === 'dashboard' ? 'active' : '' ?>" href="<?= escape(url('dashboard')) ?>"><i class="bi bi-house" aria-hidden="true"></i><span>Beranda</span></a>
          <a class="<?= $page === 'report' ? 'active' : '' ?>" href="<?= escape(url('report')) ?>"><i class="bi bi-plus-circle" aria-hidden="true"></i><span>Pengaduan</span></a>
          <a class="<?= in_array($page, ['history', 'detail'], true) ? 'active' : '' ?>" href="<?= escape(url('history')) ?>"><i class="bi bi-clock-history" aria-hidden="true"></i><span>Riwayat</span></a>
        </nav>
      <?php endif; ?>
    <?php endif; ?>
  </body>
</html>
