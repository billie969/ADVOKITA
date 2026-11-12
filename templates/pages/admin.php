<?php
/** @var int $pendingCount */
/** @var int $announcementCount */
/** @var array<string, string> $formValues */
/** @var array<int, array<string, mixed>> $reports */
/** @var array<int, array<string, mixed>> $announcements */

$totalReports = count($reports);
$approvedCount = count(array_filter($reports, static fn(array $r): bool => ($r['status'] ?? '') === 'approved'));
$rejectedCount = count(array_filter($reports, static fn(array $r): bool => ($r['status'] ?? '') === 'rejected'));
$publishedAnnouncements = count(array_filter($announcements, static fn(array $a): bool => !empty($a['is_published'])));
?>

<style>
/* ===================================
   ADVOKITA ADMIN PANEL PAGE
   SELARAS DENGAN DASHBOARD & REPORT
=================================== */

.admin-page {
  --adv-navy: #24344d;
  --adv-dark: #18263b;
  --adv-red: #b42332;
  --adv-red-accent: #ed8991;
  --adv-red-light: #fff0f1;
  --adv-text: #45546a;
  --adv-muted: #8290a2;
  --adv-border: #e7eaf0;
  --adv-soft: #f7f8fa;
  color: var(--adv-text);
  padding-bottom: 60px;
}

/* HERO BANNER */
.admin-hero {
  position: relative;
  min-height: 270px;
  display: flex;
  align-items: center;
  padding: 42px 45px;
  background: linear-gradient(120deg, #18263b, #30445f);
  border-radius: 14px;
  overflow: hidden;
  color: white;
  margin-bottom: 22px;
}

.admin-hero-content {
  max-width: 640px;
  position: relative;
  z-index: 2;
}

.admin-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 9px;
  font-size: 10px;
  font-weight: 800;
  letter-spacing: 2px;
  color: #e1e6ef;
}

.admin-eyebrow span {
  width: 7px;
  height: 7px;
  background: var(--adv-red-accent);
  border-radius: 50%;
  display: inline-block;
}

.admin-hero h1 {
  font-size: clamp(30px, 4vw, 40px);
  color: white;
  font-weight: 800;
  letter-spacing: -1px;
  margin: 18px 0 12px;
}

.admin-hero h1 span {
  color: var(--adv-red-accent);
}

.admin-hero-content > p {
  max-width: 560px;
  color: #d0d8e4;
  font-size: 13px;
  line-height: 1.85;
  margin-bottom: 20px;
}

.admin-hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-bottom: 20px;
}

.btn-admin-hero-primary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(135deg, #b42332, #cf3142);
  color: #fff !important;
  font-size: 13px;
  font-weight: 700;
  padding: 10px 20px;
  border-radius: 8px;
  text-decoration: none;
  box-shadow: 0 4px 14px rgba(180, 35, 50, 0.35);
  transition: all .25s ease;
}

.btn-admin-hero-primary:hover {
  background: linear-gradient(135deg, #991a27, #b42332);
  transform: translateY(-1px);
  box-shadow: 0 6px 18px rgba(180, 35, 50, 0.45);
}

.btn-admin-hero-secondary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: #f1f4f9 !important;
  font-size: 13px;
  font-weight: 600;
  padding: 10px 18px;
  border-radius: 8px;
  text-decoration: none;
  backdrop-filter: blur(4px);
  transition: all .25s ease;
}

.btn-admin-hero-secondary:hover {
  background: rgba(255, 255, 255, 0.18);
  color: #fff !important;
  border-color: rgba(255, 255, 255, 0.35);
}

.admin-hero-note {
  display: flex;
  align-items: center;
  gap: 9px;
  color: #dce3ec;
  font-size: 11px;
}

.admin-hero-note i {
  color: #ef9299;
  font-size: 16px;
}

/* HERO DECORATION */
.admin-hero-decoration {
  position: absolute;
  width: 300px;
  height: 100%;
  right: 25px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  pointer-events: none;
}

.admin-hero-circle {
  width: 205px;
  height: 205px;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,.17);
  box-shadow: 0 0 0 30px rgba(255,255,255,.025),
              0 0 0 60px rgba(255,255,255,.02);
}

.admin-hero-icon {
  position: absolute;
  font-size: 95px;
  color: #ee929a;
  transform: rotate(-8deg);
}

.admin-hero-watermark {
  position: absolute;
  right: 10px;
  top: -65px;
  font-size: 290px;
  font-weight: 900;
  color: rgba(255,255,255,.025);
}

/* INTRO NOTICE BAR */
.admin-intro-bar {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 16px 20px;
  background: #fff6f6;
  border: 1px solid #f5e0e2;
  border-radius: 9px;
  margin-bottom: 22px;
}

.admin-intro-icon {
  min-width: 42px;
  height: 42px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: white;
  color: var(--adv-red);
  border-radius: 9px;
  font-size: 21px;
  box-shadow: 0 2px 6px rgba(180, 35, 50, 0.08);
}

.admin-intro-body strong {
  display: block;
  color: var(--adv-navy);
  font-size: 13px;
  font-weight: 700;
}

.admin-intro-body p {
  font-size: 11px;
  line-height: 1.7;
  color: var(--adv-muted);
  margin: 3px 0 0;
}

.admin-intro-body p span {
  color: var(--adv-red);
  font-weight: 700;
}

/* STATS GRID */
.admin-stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
  gap: 16px;
  margin-bottom: 22px;
}

.admin-stat-card {
  background: white;
  border: 1px solid var(--adv-border);
  border-radius: 11px;
  padding: 18px 20px;
  display: flex;
  align-items: center;
  gap: 15px;
  box-shadow: 0 3px 12px rgba(36, 52, 77, 0.03);
  transition: transform .2s ease, box-shadow .2s ease;
}

.admin-stat-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(36, 52, 77, 0.06);
}

.admin-stat-icon {
  min-width: 46px;
  height: 46px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
}

.admin-stat-icon.icon-warning {
  background: #fff8eb;
  color: #d97706;
}

.admin-stat-icon.icon-navy {
  background: #f0f4f9;
  color: var(--adv-navy);
}

.admin-stat-icon.icon-success {
  background: #f0fdf4;
  color: #16a34a;
}

.admin-stat-icon.icon-announcement {
  background: #fff0f1;
  color: var(--adv-red);
}

.admin-stat-data {
  display: flex;
  flex-direction: column;
}

.admin-stat-number {
  font-size: 22px;
  font-weight: 800;
  color: var(--adv-navy);
  line-height: 1.2;
}

.admin-stat-label {
  font-size: 11px;
  color: var(--adv-muted);
  font-weight: 600;
  margin-top: 2px;
}

/* SECTION CARDS */
.admin-section-card {
  padding: 26px;
  border: 1px solid var(--adv-border);
  background: white;
  border-radius: 11px;
  box-shadow: 0 3px 15px rgba(36,52,77,.025);
  margin-bottom: 22px;
}

.admin-section-heading {
  display: flex;
  align-items: center;
  gap: 14px;
  position: relative;
  padding-bottom: 20px;
  margin-bottom: 22px;
  border-bottom: 1px solid #edf0f4;
}

.admin-section-icon {
  min-width: 47px;
  height: 47px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  background: var(--adv-red-light);
  color: var(--adv-red);
  font-size: 22px;
}

.admin-section-label {
  display: block;
  color: var(--adv-red);
  font-size: 9px;
  font-weight: 800;
  letter-spacing: 1.5px;
  margin-bottom: 4px;
}

.admin-section-heading h2 {
  font-size: 17px;
  color: var(--adv-navy);
  font-weight: 800;
  margin: 0 0 4px;
}

.admin-section-heading p {
  font-size: 11px;
  color: var(--adv-muted);
  margin: 0;
}

.admin-section-number {
  position: absolute;
  right: 0;
  top: 0;
  color: #edf0f4;
  font-size: 30px;
  font-weight: 900;
}

/* REPORT CARDS */
.admin-reports-stack {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.admin-report-card {
  background: #ffffff;
  border: 1px solid var(--adv-border);
  border-radius: 10px;
  padding: 20px 22px;
  box-shadow: 0 2px 8px rgba(36, 52, 77, 0.03);
  transition: all .2s ease;
}

.admin-report-card:hover {
  border-color: #d5dde6;
  box-shadow: 0 4px 14px rgba(36, 52, 77, 0.06);
}

.admin-report-card.is-pending {
  border-left: 4px solid #f59e0b;
}

.admin-report-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
  margin-bottom: 12px;
}

.admin-report-meta {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.admin-report-case {
  font-size: 11px;
  font-weight: 800;
  color: var(--adv-navy);
  background: #f1f4f9;
  padding: 3px 9px;
  border-radius: 5px;
  letter-spacing: .5px;
}

.admin-report-date {
  font-size: 11px;
  color: var(--adv-muted);
}

.admin-report-cat {
  font-size: 11px;
  background: #f8fafc;
  color: var(--adv-navy);
  font-weight: 600;
  padding: 3px 8px;
  border: 1px solid #edf1f6;
  border-radius: 5px;
}

/* STATUS PILLS */
.badge-status-pill {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 4px 10px;
  border-radius: 20px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .2px;
}

.badge-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  display: inline-block;
}

.badge-status-pending {
  background: #fff8eb;
  color: #b45309;
  border: 1px solid #fed7aa;
}
.badge-status-pending .badge-dot {
  background: #f59e0b;
}

.badge-status-approved {
  background: #f0fdf4;
  color: #15803d;
  border: 1px solid #bbf7d0;
}
.badge-status-approved .badge-dot {
  background: #22c55e;
}

.badge-status-rejected {
  background: #fef2f2;
  color: #b91c1c;
  border: 1px solid #fecaca;
}
.badge-status-rejected .badge-dot {
  background: #ef4444;
}

.admin-report-title {
  font-size: 16px;
  font-weight: 800;
  color: var(--adv-navy);
  margin: 0 0 8px;
}

.admin-submitter-bar {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
  font-size: 12px;
  color: var(--adv-muted);
  margin-bottom: 14px;
}

.admin-submitter-badge {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 2px 9px;
  border-radius: 6px;
  font-size: 11px;
  font-weight: 600;
}

.admin-submitter-badge.badge-anon {
  background: #fff1f2;
  color: #e11d48;
  border: 1px solid #ffe4e6;
}

.admin-submitter-badge.badge-public {
  background: #f0fdf4;
  color: #15803d;
  border: 1px solid #dcfce7;
}

/* KRONOLOGI BOX */
.admin-chronology-box {
  background: var(--adv-soft);
  border: 1px solid #eaedf3;
  border-radius: 8px;
  padding: 14px 16px;
  margin-bottom: 14px;
}

.admin-chronology-title {
  font-size: 11px;
  font-weight: 700;
  color: var(--adv-navy);
  text-transform: uppercase;
  letter-spacing: .5px;
  margin-bottom: 6px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.admin-chronology-text {
  font-size: 13px;
  line-height: 1.7;
  color: #3b4859;
  margin: 0;
  white-space: pre-wrap;
}

/* ATTACHMENTS */
.admin-attachments-list {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 14px;
}

.admin-attachment-btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: #f1f5f9;
  border: 1px solid #e2e8f0;
  color: var(--adv-navy);
  font-size: 11px;
  font-weight: 600;
  padding: 5px 11px;
  border-radius: 6px;
  text-decoration: none;
  transition: all .2s ease;
}

.admin-attachment-btn:hover {
  background: #e2e8f0;
  color: var(--adv-navy);
}

/* DECISION NOTE DISPLAY */
.admin-decision-note-box {
  background: #f0f7ff;
  border-left: 3px solid #2563eb;
  border-radius: 6px;
  padding: 10px 14px;
  margin-bottom: 12px;
}

.admin-decision-note-label {
  font-size: 11px;
  font-weight: 700;
  color: #1e40af;
  margin-bottom: 3px;
}

.admin-decision-note-text {
  font-size: 12px;
  color: #1e293b;
  margin: 0;
  line-height: 1.5;
}

/* DECISION ACTION FORM */
.admin-decision-form {
  background: #fafbfd;
  border: 1px solid #e5e9f0;
  border-radius: 8px;
  padding: 14px 16px;
  margin-top: 14px;
}

.admin-form-textarea {
  width: 100%;
  padding: 10px 12px;
  background: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 6px;
  font-size: 12px;
  color: var(--adv-navy);
  resize: vertical;
  transition: border-color .2s ease;
}

.admin-form-textarea:focus {
  outline: none;
  border-color: var(--adv-red);
  box-shadow: 0 0 0 3px rgba(180, 35, 50, 0.1);
}

.btn-decision-reject {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: #ffffff;
  border: 1px solid #ef4444;
  color: #dc2626 !important;
  font-size: 12px;
  font-weight: 700;
  padding: 7px 16px;
  border-radius: 6px;
  transition: all .2s ease;
}

.btn-decision-reject:hover {
  background: #fee2e2;
  color: #b91c1c !important;
}

.btn-decision-approve {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: linear-gradient(135deg, #b42332, #cf3142);
  border: none;
  color: #ffffff !important;
  font-size: 12px;
  font-weight: 700;
  padding: 7px 18px;
  border-radius: 6px;
  box-shadow: 0 2px 8px rgba(180, 35, 50, 0.25);
  transition: all .2s ease;
}

.btn-decision-approve:hover {
  background: linear-gradient(135deg, #991a27, #b42332);
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(180, 35, 50, 0.35);
}

/* ANNOUNCEMENT FORM */
.admin-create-announcement-card {
  background: var(--adv-soft);
  border: 1px solid #e7ecf3;
  border-radius: 10px;
  padding: 22px;
  margin-bottom: 24px;
}

.admin-create-announcement-card h3 {
  font-size: 14px;
  font-weight: 800;
  color: var(--adv-navy);
  margin-bottom: 14px;
}

.admin-announcement-item {
  background: #ffffff;
  border: 1px solid var(--adv-border);
  border-radius: 9px;
  padding: 16px 18px;
  margin-bottom: 12px;
  transition: all .2s ease;
}

.admin-announcement-item:hover {
  border-color: #cbd5e1;
}

.admin-announcement-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  margin-bottom: 8px;
}

.admin-announcement-title {
  font-size: 14px;
  font-weight: 700;
  color: var(--adv-navy);
  margin: 0;
}

.admin-announcement-body {
  font-size: 12px;
  color: #475569;
  line-height: 1.6;
  margin-bottom: 12px;
}

/* EMPTY STATES */
.admin-empty-box {
  text-align: center;
  padding: 40px 20px;
  background: var(--adv-soft);
  border: 1px dashed #d5dde6;
  border-radius: 9px;
}

.admin-empty-title {
  font-size: 15px;
  font-weight: 700;
  color: var(--adv-navy);
  margin: 10px 0 4px;
}

.admin-empty-sub {
  font-size: 12px;
  color: var(--adv-muted);
  margin: 0;
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .admin-hero {
    padding: 30px 22px;
  }
  .admin-hero-decoration {
    display: none;
  }
  .admin-hero h1 {
    font-size: 26px;
  }
  .admin-section-card {
    padding: 20px 16px;
  }
  .admin-section-number {
    display: none;
  }
  .admin-stats-grid {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 480px) {
  .admin-stats-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<main class="container page-content advokita-page admin-page">

  <!-- HERO BANNER -->
  <section class="admin-hero">
    <div class="admin-hero-content">
      <span class="admin-eyebrow">
        <span></span> PANEL ADMINISTRASI &amp; MODERASI ADVOKITA
      </span>

      <h1>Kelola <span>Layanan.</span></h1>

      <p>
        Tinjau laporan pengaduan mahasiswa yang masuk, berikan pertimbangan hukum objektif,
        perbarui status penanganan kasus, dan terbitkan pengumuman resmi ke seluruh pengguna kampus.
      </p>

      <div class="admin-hero-actions">
        <a class="btn-admin-hero-primary" href="#sectionReports">
          <i class="bi bi-inbox-fill"></i>
          <span>Tinjau Laporan (<?= $pendingCount ?>)</span>
        </a>
        <a class="btn-admin-hero-secondary" href="#sectionAnnouncements">
          <i class="bi bi-megaphone"></i>
          <span>Kelola Pengumuman</span>
        </a>
      </div>

      <div class="admin-hero-note">
        <i class="bi bi-shield-check"></i>
        <span>Hak akses administrator · Menjaga transparansi, keadilan, dan akuntabilitas kampus</span>
      </div>
    </div>

    <div class="admin-hero-decoration" aria-hidden="true">
      <div class="admin-hero-circle"></div>
      <i class="bi bi-person-gear admin-hero-icon"></i>
      <span class="admin-hero-watermark">A</span>
    </div>
  </section>

  <!-- INTRO NOTICE BAR -->
  <div class="admin-intro-bar">
    <div class="admin-intro-icon">
      <i class="bi bi-shield-exclamation"></i>
    </div>
    <div class="admin-intro-body">
      <strong>Panduan Verifikasi &amp; Moderasi Pengaduan</strong>
      <p>
        Setiap keputusan (disetujui atau ditolak) disertai catatan keputusan akan langsung dapat diakses
        dan dipantau oleh mahasiswa yang bersangkutan pada menu <span>Riwayat Kasus</span> mereka.
      </p>
    </div>
  </div>

  <!-- STATS OVERVIEW -->
  <section class="admin-stats-grid" aria-label="Statistik Administrasi">
    <div class="admin-stat-card">
      <div class="admin-stat-icon icon-warning">
        <i class="bi bi-hourglass-split"></i>
      </div>
      <div class="admin-stat-data">
        <span class="admin-stat-number"><?= $pendingCount ?></span>
        <span class="admin-stat-label">Menunggu Ditinjau</span>
      </div>
    </div>

    <div class="admin-stat-card">
      <div class="admin-stat-icon icon-navy">
        <i class="bi bi-folder2-open"></i>
      </div>
      <div class="admin-stat-data">
        <span class="admin-stat-number"><?= $totalReports ?></span>
        <span class="admin-stat-label">Total Laporan Masuk</span>
      </div>
    </div>

    <div class="admin-stat-card">
      <div class="admin-stat-icon icon-success">
        <i class="bi bi-check-circle-fill"></i>
      </div>
      <div class="admin-stat-data">
        <span class="admin-stat-number"><?= $approvedCount ?></span>
        <span class="admin-stat-label">Laporan Disetujui</span>
      </div>
    </div>

    <div class="admin-stat-card">
      <div class="admin-stat-icon icon-announcement">
        <i class="bi bi-megaphone-fill"></i>
      </div>
      <div class="admin-stat-data">
        <span class="admin-stat-number"><?= $publishedAnnouncements ?></span>
        <span class="admin-stat-label">Pengumuman Terbit</span>
      </div>
    </div>
  </section>

  <!-- SECTION 01: TINJAUAN LAPORAN PENGADUAN -->
  <section class="admin-section-card" id="sectionReports" aria-labelledby="adminReportsHeading">
    <div class="admin-section-heading">
      <div class="admin-section-icon">
        <i class="bi bi-inbox-fill"></i>
      </div>
      <div>
        <span class="admin-section-label">BAGIAN 01</span>
        <h2 id="adminReportsHeading">Tinjauan Laporan Pengaduan</h2>
        <p>Daftar seluruh laporan pengaduan mahasiswa yang masuk ke sistem advokasi.</p>
      </div>
      <span class="admin-section-number">01</span>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <span class="badge bg-warning bg-opacity-10 text-warning-emphasis border border-warning-subtle px-3 py-2 rounded-pill fw-bold">
        <i class="bi bi-clock-history me-1"></i> <?= escape($pendingCount) ?> Menunggu Ditinjau
      </span>
      <span class="text-muted small fw-semibold">
        Total <?= escape($totalReports) ?> Laporan
      </span>
    </div>

    <?php if ($reports === []): ?>
      <div class="admin-empty-box">
        <i class="bi bi-inbox text-muted" style="font-size: 2.2rem;"></i>
        <p class="admin-empty-title">Belum Ada Laporan yang Masuk</p>
        <p class="admin-empty-sub">Saat mahasiswa mengirimkan pengaduan, daftar kasus akan ditampilkan di sini.</p>
      </div>
    <?php else: ?>
      <div class="admin-reports-stack">
        <?php foreach ($reports as $reportItem): ?>
          <?php
            $status = (string) ($reportItem['status'] ?? 'pending');
            $isPending = ($status === 'pending');
            $badgeClass = match ($status) {
                'approved' => 'badge-status-approved',
                'rejected' => 'badge-status-rejected',
                default => 'badge-status-pending',
            };
          ?>
          <article class="admin-report-card <?= $isPending ? 'is-pending' : '' ?>">
            <div class="admin-report-top">
              <div class="admin-report-meta">
                <span class="admin-report-case">
                  <i class="bi bi-hash"></i><?= escape($reportItem['case_number']) ?>
                </span>
                <span class="admin-report-date">
                  <i class="bi bi-calendar-event me-1"></i><?= escape(format_date($reportItem['created_at'])) ?>
                </span>
                <span class="admin-report-cat">
                  <i class="bi bi-tag me-1"></i><?= escape($reportItem['category']) ?>
                </span>
              </div>

              <span class="badge-status-pill <?= $badgeClass ?>">
                <span class="badge-dot"></span>
                <?= escape(status_label($status)) ?>
              </span>
            </div>

            <h3 class="admin-report-title"><?= escape($reportItem['title']) ?></h3>

            <div class="admin-submitter-bar">
              <?php if (is_checked($reportItem['is_anonymous'])): ?>
                <span class="admin-submitter-badge badge-anon">
                  <i class="bi bi-incognito"></i> Laporan Anonim
                </span>
              <?php else: ?>
                <span class="admin-submitter-badge badge-public">
                  <i class="bi bi-person-check-fill"></i> <?= escape($reportItem['submitter_name'] ?? 'Pengguna') ?> (NPM: <?= escape($reportItem['submitter_nim'] ?? '-') ?>)
                </span>
              <?php endif; ?>

              <span>
                <i class="bi bi-clock me-1"></i> Kejadian: <?= escape(format_date($reportItem['incident_date'])) ?>
              </span>
            </div>

            <div class="admin-chronology-box">
              <div class="admin-chronology-title">
                <i class="bi bi-card-text"></i> Kronologi Permasalahan
              </div>
              <p class="admin-chronology-text"><?= escape($reportItem['chronology']) ?></p>
            </div>

            <?php if (!empty($reportItem['attachments'])): ?>
              <div class="mb-2">
                <span class="text-muted small fw-bold d-block mb-1">
                  <i class="bi bi-paperclip me-1"></i> Bukti Lampiran:
                </span>
                <div class="admin-attachments-list">
                  <?php foreach ($reportItem['attachments'] as $attachment): ?>
                    <a class="admin-attachment-btn" href="<?= escape(url('attachment', ['case' => $reportItem['case_number'], 'id' => $attachment['id']])) ?>" target="_blank" rel="noopener">
                      <i class="bi bi-file-earmark-arrow-down-fill text-danger"></i>
                      <span><?= escape($attachment['name']) ?></span>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($reportItem['decision_note'] !== null && $reportItem['decision_note'] !== ''): ?>
              <div class="admin-decision-note-box">
                <div class="admin-decision-note-label">
                  <i class="bi bi-chat-square-quote-fill me-1"></i> Catatan Keputusan:
                </div>
                <p class="admin-decision-note-text"><?= escape($reportItem['decision_note']) ?></p>
              </div>
            <?php endif; ?>

            <?php if ($isPending): ?>
              <form class="admin-decision-form" method="post" action="<?= escape(url('admin')) ?>">
                <?php csrf_input(); ?>
                <input type="hidden" name="action" value="decision">
                <input type="hidden" name="reportId" value="<?= escape($reportItem['id']) ?>">

                <label class="form-label text-dark fw-bold small mb-1" for="note-<?= escape($reportItem['id']) ?>">
                  <i class="bi bi-pencil-square me-1"></i> Catatan Pertimbangan untuk Pelapor (Opsional)
                </label>
                <textarea
                  class="admin-form-textarea mb-3"
                  id="note-<?= escape($reportItem['id']) ?>"
                  name="note"
                  maxlength="2000"
                  rows="2"
                  placeholder="Tuliskan catatan pertimbangan hukum atau alasan persetujuan/penolakan..."
                ></textarea>

                <div class="d-flex flex-wrap justify-content-end gap-2">
                  <button class="btn-decision-reject" type="submit" name="decision" value="rejected">
                    <i class="bi bi-x-circle"></i> Tolak Laporan
                  </button>
                  <button class="btn-decision-approve" type="submit" name="decision" value="approved">
                    <i class="bi bi-check-circle-fill"></i> Setujui Laporan
                  </button>
                </div>
              </form>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- SECTION 02: KELOLA PENGUMUMAN -->
  <section class="admin-section-card" id="sectionAnnouncements" aria-labelledby="adminAnnouncementsHeading">
    <div class="admin-section-heading">
      <div class="admin-section-icon">
        <i class="bi bi-megaphone-fill"></i>
      </div>
      <div>
        <span class="admin-section-label">BAGIAN 02</span>
        <h2 id="adminAnnouncementsHeading">Kelola Pengumuman Kampus</h2>
        <p>Terbitkan informasi resmi untuk ditampilkan pada beranda mahasiswa.</p>
      </div>
      <span class="admin-section-number">02</span>
    </div>

    <!-- FORM BUAT PENGUMUMAN -->
    <div class="admin-create-announcement-card">
      <h3><i class="bi bi-plus-circle-fill text-danger me-2"></i>Buat Pengumuman Baru</h3>
      <form method="post" action="<?= escape(url('admin')) ?>">
        <?php csrf_input(); ?>
        <input type="hidden" name="action" value="announcement-create">

        <div class="mb-3">
          <label class="form-label text-dark fw-bold small" for="announcementTitle">
            Judul Pengumuman <span class="text-danger">*</span>
          </label>
          <input
            class="form-control"
            id="announcementTitle"
            name="title"
            maxlength="120"
            required
            placeholder="Contoh: Sosialisasi Bantuan Hukum dan Hak Mahasiswa 2026"
            value="<?= escape($formValues['title'] ?? '') ?>"
          >
        </div>

        <div class="mb-3">
          <label class="form-label text-dark fw-bold small" for="announcementBody">
            Isi Pengumuman <span class="text-danger">*</span>
          </label>
          <textarea
            class="form-control"
            id="announcementBody"
            name="body"
            rows="3"
            maxlength="3000"
            required
            placeholder="Tuliskan isi pengumuman lengkap secara jelas..."
          ><?= escape($formValues['body'] ?? '') ?></textarea>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
          <div class="form-check">
            <input
              class="form-check-input"
              id="announcementPublished"
              name="isPublished"
              type="checkbox"
              <?= !isset($formValues['action']) || isset($formValues['isPublished']) ? 'checked' : '' ?>
            >
            <label class="form-check-label small fw-semibold" for="announcementPublished">
              Terbitkan langsung ke Beranda Mahasiswa
            </label>
          </div>

          <button class="btn btn-danger btn-sm rounded-3 px-3 py-2 fw-bold" type="submit">
            <i class="bi bi-send-fill me-1"></i> Simpan &amp; Terbitkan
          </button>
        </div>
      </form>
    </div>

    <!-- DAFTAR PENGUMUMAN YANG ADA -->
    <h3 class="fw-bold fs-6 text-dark mb-3">
      <i class="bi bi-list-task me-1"></i> Daftar Pengumuman (<?= escape($announcementCount) ?>)
    </h3>

    <?php if ($announcements === []): ?>
      <div class="admin-empty-box">
        <i class="bi bi-megaphone text-muted" style="font-size: 2rem;"></i>
        <p class="admin-empty-title">Belum Ada Pengumuman</p>
        <p class="admin-empty-sub">Pengumuman yang dibuat melalui form di atas akan muncul di sini.</p>
      </div>
    <?php else: ?>
      <div class="admin-announcements-stack">
        <?php foreach ($announcements as $announcement): ?>
          <article class="admin-announcement-item">
            <div class="admin-announcement-top">
              <h4 class="admin-announcement-title"><?= escape($announcement['title']) ?></h4>
              <span class="badge <?= $announcement['is_published'] ? 'bg-success' : 'bg-secondary' ?> rounded-pill px-2 py-1 small">
                <?= $announcement['is_published'] ? '● Terbit' : '○ Draf' ?>
              </span>
            </div>

            <p class="admin-announcement-body"><?= escape($announcement['body']) ?></p>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2 border-top">
              <span class="text-muted small">
                <i class="bi bi-clock me-1"></i> Diperbarui: <?= escape(format_date($announcement['updated_at'] ?? $announcement['published_at'])) ?>
              </span>

              <div class="d-flex gap-2">
                <form method="post" action="<?= escape(url('admin')) ?>" class="mb-0">
                  <?php csrf_input(); ?>
                  <input type="hidden" name="action" value="announcement-toggle">
                  <input type="hidden" name="announcementId" value="<?= escape($announcement['id']) ?>">
                  <input type="hidden" name="isPublished" value="<?= $announcement['is_published'] ? '0' : '1' ?>">
                  <button class="btn btn-sm btn-outline-secondary" type="submit">
                    <i class="bi <?= $announcement['is_published'] ? 'bi-eye-slash' : 'bi-eye' ?> me-1"></i>
                    <?= $announcement['is_published'] ? 'Sembunyikan' : 'Terbitkan' ?>
                  </button>
                </form>

                <form method="post" action="<?= escape(url('admin')) ?>" class="mb-0">
                  <?php csrf_input(); ?>
                  <input type="hidden" name="action" value="announcement-delete">
                  <input type="hidden" name="announcementId" value="<?= escape($announcement['id']) ?>">
                  <button class="btn btn-sm btn-outline-danger" type="submit">
                    <i class="bi bi-trash me-1"></i> Hapus
                  </button>
                </form>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

</main>
