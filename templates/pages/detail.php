
<?php
// Modul: Detail Laporan - Cek Otorisasi Pemilik Laporan
// Author: Natasya Surya Ramadhani (2455061002)
// Fungsi terkait: find_report() - hanya pemilik yang bisa lihat

/** @var array<string, mixed>|null $report */
?>

<main class="container page-content">
  <div style="padding:12px; max-width:100%; overflow-x:hidden;">

    <div class="page-heading">
      <span class="eyebrow">DETAIL LAPORAN</span>
      <h1>Detail Pengaduan</h1>
      <p class="text-secondary mb-0">Informasi status laporan dan tahapan penanganannya.</p>
    </div>

    <?php if ($report === null): ?>

      <section class="empty-state" aria-labelledby="detailEmptyTitle">
        <span class="empty-state-icon">
          <i class="bi bi-file-earmark-lock" aria-hidden="true"></i>
        </span>

        <h2 id="detailEmptyTitle">Laporan tidak ditemukan</h2>
        <p>Laporan tersebut tidak tersedia atau bukan milik akun Anda.</p>

        <a class="btn btn-outline-danger" href="<?= escape(url('history')) ?>">
          <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Kembali ke Riwayat
        </a>
      </section>

    <?php else: ?>

      <section class="detail-card">

        <div class="detail-summary">
          <div>
            <span class="eyebrow">
              <?= escape($report['case_number']) ?>

              <!-- Tombol Salin Nomor Kasus -->
              <button
                type="button"
                class="btn btn-sm btn-outline-secondary ms-2"
                onclick="navigator.clipboard.writeText(<?= htmlspecialchars(json_encode($report['case_number']), ENT_QUOTES, 'UTF-8') ?>).then(() => { this.innerText = 'Tersalin!'; }).catch(() => { this.innerText = 'Gagal menyalin'; });"
              >
                <i class="bi bi-clipboard me-1" aria-hidden="true"></i>
                Salin Nomor
              </button>
            </span>

            <h2><?= escape($report['title']) ?></h2>
            <p>Dikirim <?= escape(format_date($report['created_at'])) ?></p>
          </div>

          <span class="badge <?= escape(status_class($report['status'])) ?>">
            <?= escape(status_label($report['status'])) ?>
          </span>
        </div>

        <!-- Tombol Kembali ke Riwayat -->
        <a href="?page=history" style="display:inline-block; margin-bottom:15px; text-decoration:none; color:#4F46E5; font-weight:600;">
          &larr; Kembali ke Riwayat
        </a>

        <!-- Indikator Tahapan Status Pengaduan -->
        <?php
          $currentStatus = $report['status'];

          $statusSteps = [
            'pending' => 1,
            'process' => 2,
            'done' => 3
          ];

          $currentStep = $statusSteps[$currentStatus] ?? 1;
        ?>

        <div style="display:flex; flex-wrap:wrap; gap:10px; margin:15px 0;">

          <div style="padding:8px 12px; border-radius:20px; background:<?= $currentStep >= 1 ? '#FEF3C7' : '#E5E7EB' ?>">
            1. Menunggu
          </div>

          <div style="padding:8px 12px; border-radius:20px; background:<?= $currentStep >= 2 ? '#DBEAFE' : '#E5E7EB' ?>">
            2. Diproses
          </div>

          <div style="padding:8px 12px; border-radius:20px; background:<?= $currentStep >= 3 ? '#D1FAE5' : '#E5E7EB' ?>">
            3. Selesai
          </div>

        </div>

        <section class="detail-section">
          <p>Kategori: <?= escape($report['category']) ?></p>
          <p>Tanggal kejadian: <?= escape(format_date($report['incident_date'])) ?></p>
          <h3>Kronologi</h3>
          <p class="detail-description"><?= escape($report['chronology']) ?></p>
        </section>

        <?php if ($report['decision_note'] !== null): ?>
          <section class="detail-section">
            <h3>Catatan keputusan</h3>
            <p class="detail-description"><?= escape($report['decision_note']) ?></p>
          </section>
        <?php endif; ?>

        <?php if ($report['attachments'] !== []): ?>
          <section class="detail-section">
            <h3>Lampiran</h3>

            <?php foreach ($report['attachments'] as $attachment): ?>
              <a
                class="d-block mb-2"
                href="<?= escape(url('attachment', ['case' => $report['case_number'], 'id' => $attachment['id']])) ?>"
              >
                <?= escape($attachment['name']) ?>
              </a>
            <?php endforeach; ?>

          </section>
        <?php endif; ?>

      </section>

    <?php endif; ?>

    <div class="d-flex flex-wrap gap-2 mt-3 justify-content-center">
      <a class="btn btn-light" href="<?= escape(url('history')) ?>">
        <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Kembali ke Riwayat
      </a>

      <a class="btn btn-danger" href="<?= escape(url('report')) ?>">
        <i class="bi bi-plus-lg me-2" aria-hidden="true"></i>Buat Laporan Baru
      </a>
    </div>

  </div>
</main>
