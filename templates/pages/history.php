
<?php
// Modul: Riwayat Pengaduan Mahasiswa
// Author: Natasya Surya Ramadhani (2455061002)
// Fungsi terkait: report_rows(), find_report() di public/index.php

/** @var array<int, array<string, mixed>> $reports */
/** @var array<string, string> $filters */

$filters = $filters ?? ['case' => '', 'status' => ''];
?>

<main class="container page-content">
  <div style="padding:12px; max-width:100%; overflow-x:hidden;">

    <div class="page-heading d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
      <div>
        <span class="eyebrow">RIWAYAT</span>
        <h1>Riwayat Pengaduan</h1>
        <p class="text-secondary mb-0">Pantau perkembangan setiap pengaduan yang Anda kirim.</p>
      </div>

      <a class="btn btn-danger" href="<?= escape(url('report')) ?>">
        <i class="bi bi-plus-lg me-2" aria-hidden="true"></i>Buat Laporan
      </a>
    </div>

    <!-- Filter Riwayat - Natasya -->
    <form method="get" action="<?= escape(url('history')) ?>" class="d-flex flex-wrap gap-2 mb-4">

      <input
        type="text"
        name="case"
        class="form-control"
        style="max-width:220px"
        placeholder="Cari nomor kasus..."
        value="<?= escape($filters['case']) ?>"
      >

      <!-- Filter Status -->
      <select name="status" class="form-select" style="max-width:180px">
        <option value="">Semua Status</option>
        <option value="pending" <?= $filters['status'] === 'pending' ? 'selected' : '' ?>>Menunggu</option>
        <option value="process" <?= $filters['status'] === 'process' ? 'selected' : '' ?>>Diproses</option>
        <option value="done" <?= $filters['status'] === 'done' ? 'selected' : '' ?>>Selesai</option>
      </select>

      <!-- Filter Kategori -->
      <select name="category" class="form-select" style="max-width:180px" onchange="this.form.submit()">
        <option value="">Semua Kategori</option>
        <option value="Pidana" <?= ($_GET['category'] ?? '') === 'Pidana' ? 'selected' : '' ?>>Pidana</option>
        <option value="Perdata" <?= ($_GET['category'] ?? '') === 'Perdata' ? 'selected' : '' ?>>Perdata</option>
        <option value="Keluarga" <?= ($_GET['category'] ?? '') === 'Keluarga' ? 'selected' : '' ?>>Keluarga</option>
      </select>

      <!-- Filter Urutan -->
      <select name="sort" class="form-select" style="max-width:160px" onchange="this.form.submit()">
        <option value="newest" <?= ($_GET['sort'] ?? 'newest') === 'newest' ? 'selected' : '' ?>>Terbaru</option>
        <option value="oldest" <?= ($_GET['sort'] ?? '') === 'oldest' ? 'selected' : '' ?>>Terlama</option>
      </select>

      <button class="btn btn-danger" type="submit">Cari</button>
      <a class="btn btn-light" href="<?= escape(url('history')) ?>">Reset</a>
    </form>

    <?php if ($reports === []): ?>

      <!-- Tampilan ketika belum ada laporan -->
      <div style="text-align:center; padding:30px; color:#6B7280;">
        <div style="font-size:32px;">📂</div>
        <p>Belum ada laporan.</p>
        <p style="font-size:13px;">Buat laporan pertama kamu di menu Dashboard, ya!</p>
        <a href="?page=dashboard" style="display:inline-block; margin-top:10px; padding:8px 14px; background:#4F46E5; color:white; border-radius:8px; text-decoration:none;">Buat Laporan</a>
      </div>

    <?php else: ?>

      <section class="report-list" aria-label="Daftar laporan">
        <?php foreach ($reports as $reportItem): ?>
          <article class="report-row">

            <div class="report-row-top">
              <div>
                <span class="report-number">
                  <?= escape($reportItem['case_number']) ?> · <?= escape(format_date($reportItem['created_at'])) ?>
                </span>

                <h2><?= escape($reportItem['title']) ?></h2>

                <span class="report-category">
                  <?= escape($reportItem['category']) ?>
                </span>
              </div>

              <span class="badge <?= escape(status_class($reportItem['status'])) ?>">
                <?= escape(status_label($reportItem['status'])) ?>
              </span>
            </div>

            <a class="report-detail-link" href="<?= escape(url('detail', ['case' => $reportItem['case_number']])) ?>">
              Lihat detail <i class="bi bi-arrow-right" aria-hidden="true"></i>
            </a>

            <?php if ($reportItem['decision_note'] !== null): ?>
              <p class="report-decision-note">
                Catatan admin: <?= escape($reportItem['decision_note']) ?>
              </p>
            <?php endif; ?>

          </article>
        <?php endforeach; ?>
      </section>

    <?php endif; ?>

  </div>
</main>
