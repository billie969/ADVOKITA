
<?php
/** @var array<int, array<string, mixed>> $reports */
?>

<main class="container page-content">

  <!-- Header Halaman -->
  <div class="page-heading d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
    <div>
      <span class="eyebrow">RIWAYAT PENGADUAN</span>
      <h1>Riwayat Pengaduan</h1>
      <p class="text-secondary mb-0">
        Pantau status dan perkembangan setiap pengaduan yang telah Anda kirim melalui ADVOKITA.
      </p>
    </div>

    <a class="btn btn-danger" href="<?= escape(url('report')) ?>">
      <i class="bi bi-plus-lg me-2" aria-hidden="true"></i>
      Buat Laporan
    </a>
  </div>

  <?php if ($reports === []): ?>

    <!-- Kondisi Belum Ada Laporan -->
    <section class="empty-state" aria-labelledby="historyEmptyTitle">

      <span class="empty-state-icon">
        <i class="bi bi-file-earmark-text" aria-hidden="true"></i>
      </span>

      <h2 id="historyEmptyTitle">Belum Ada Riwayat Pengaduan</h2>

      <p>
        Anda belum mengirimkan laporan pengaduan.
        Setelah laporan dikirim, informasi status dan tindak lanjutnya
        akan ditampilkan pada halaman ini.
      </p>

      <a class="btn btn-danger" href="<?= escape(url('report')) ?>">
        <i class="bi bi-plus-lg me-2" aria-hidden="true"></i>
        Buat Pengaduan
      </a>

    </section>

  <?php else: ?>

    <!-- Daftar Riwayat Laporan -->
    <section class="report-list" aria-label="Daftar laporan pengaduan">

      <?php foreach ($reports as $reportItem): ?>

        <article class="report-row">

          <!-- Informasi Utama Laporan -->
          <div class="report-row-top">

            <div>
              <span class="report-number">
                <i class="bi bi-hash" aria-hidden="true"></i>
                <?= escape($reportItem['case_number']) ?>

                <span aria-hidden="true">·</span>

                <i class="bi bi-calendar3" aria-hidden="true"></i>
                <?= escape(format_date($reportItem['created_at'])) ?>
              </span>

              <h2><?= escape($reportItem['title']) ?></h2>

              <span class="report-category">
                <i class="bi bi-tag me-1" aria-hidden="true"></i>
                <?= escape($reportItem['category']) ?>
              </span>
            </div>

            <!-- Status Laporan -->
            <span class="badge <?= escape(status_class($reportItem['status'])) ?>">
              <?= escape(status_label($reportItem['status'])) ?>
            </span>

          </div>

          <!-- Catatan Admin -->
          <?php if (
              $reportItem['decision_note'] !== null
              && $reportItem['decision_note'] !== ''
          ): ?>

            <p class="report-decision-note">
              <i class="bi bi-chat-left-text me-2" aria-hidden="true"></i>
              <strong>Catatan Admin:</strong>
              <?= escape($reportItem['decision_note']) ?>
            </p>

          <?php endif; ?>

          <!-- Tombol Detail -->
          <a
            class="report-detail-link"
            href="<?= escape(url('detail', ['case' => $reportItem['case_number']])) ?>"
          >
            Lihat Detail Pengaduan
            <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
          </a>

        </article>

      <?php endforeach; ?>

    </section>

  <?php endif; ?>

</main>
