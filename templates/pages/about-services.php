<?php
require __DIR__ . '/about-style.php';
?>
<style>
/* login page styles from login.php */
.login-page {
  --adv-navy: #24344d;
  --adv-navy-dark: #18263b;
  --adv-red: #b42332;
  --adv-red-dark: #941b29;
  --adv-muted: #758195;
  --adv-border: #e2e7ef;
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 45px 18px;
  overflow: hidden;
  background:
    radial-gradient(circle at 10% 15%, rgba(180,35,50,.08), transparent 30%),
    radial-gradient(circle at 90% 85%, rgba(36,52,77,.11), transparent 32%),
    #f4f6fa;
}
.login-page::before,
.login-page::after {
  content: "";
  position: absolute;
  border-radius: 50%;
  pointer-events: none;
}
.login-page::before {
  width: 350px;
  height: 350px;
  top: -180px;
  right: -100px;
  border: 55px solid rgba(36,52,77,.045);
}
.login-page::after {
  width: 260px;
  height: 260px;
  bottom: -140px;
  left: -90px;
  border: 40px solid rgba(180,35,50,.045);
}
.login-card {
  position: relative;
  z-index: 1;
  display: grid;
  grid-template-columns: .9fr 1.1fr;
  width: 100%;
  max-width: 900px;
  min-height: 530px;
  overflow: hidden;
  border: 1px solid rgba(226,231,239,.8);
  border-radius: 23px;
  background: #fff;
  box-shadow: 0 22px 65px rgba(24,38,59,.12);
}
.login-form-panel {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 55px 48px;
}
</style>
<div class="login-page">
<<<<<<< HEAD
  <div class="login-card">
    <div class="login-form-panel">
=======
  <div class="login-card"><div class="login-form-panel">


>>>>>>> 56a0480 (Apply pending UI updates (about-services, login) and registration user type)
      <?php require __DIR__ . '/about-hero.php'; ?>
      <?php require __DIR__ . '/about-nav.php'; ?>
      <!-- Services Section -->
      <section id="layanan" class="adv-section reveal">
        <div class="adv-section-heading">
          <div>
            <span class="adv-eyebrow">04 — LAYANAN HUKUM</span>
            <h2>Layanan <span>Kami</span></h2>
            <p class="adv-section-description">Berikut layanan yang kami sediakan untuk membantu masyarakat.</p>
          </div>
          <span class="adv-section-number">04</span>
        </div>
        <div class="adv-service-grid">
          <div class="adv-service-card">
            <div class="adv-service-icon"><i class="bi bi-chat-square-text"></i></div>
            <span class="adv-service-number">01 / KONSULTASI</span>
            <h3>Konsultasi &amp; Arahan Hukum</h3>
            <p>Membantu masyarakat memperoleh informasi awal dan arahan mengenai langkah yang dapat dilakukan ketika menghadapi persoalan hukum.</p>
            <a href="<?= escape(url('contact')) ?>" class="adv-service-arrow"><i class="bi bi-arrow-up-right"></i></a>
          </div>
          <div class="adv-service-card">
            <div class="adv-service-icon"><i class="bi bi-briefcase"></i></div>
            <span class="adv-service-number">02 / AKSES BANTUAN</span>
            <h3>Akses Bantuan Hukum</h3>
            <p>Menghubungkan masyarakat dengan lembaga atau pihak kompeten untuk memperoleh layanan bantuan hukum lebih lanjut.</p>
            <a href="<?= escape(url('contact')) ?>" class="adv-service-arrow"><i class="bi bi-arrow-up-right"></i></a>
          </div>
          <div class="adv-service-card">
            <div class="adv-service-icon"><i class="bi bi-megaphone"></i></div>
            <span class="adv-service-number">03 / EDUKASI</span>
            <h3>Edukasi &amp; Kampanye Hukum</h3>
            <p>Menyelenggarakan seminar, workshop, dan materi edukatif untuk meningkatkan kesadaran hukum di masyarakat.</p>
            <a href="<?= escape(url('contact')) ?>" class="adv-service-arrow"><i class="bi bi-arrow-up-right"></i></a>
          </div>
        </div>
      </section>
      <?php require __DIR__ . '/about-footer.php'; ?>
    </div>
  </div>
</div>
