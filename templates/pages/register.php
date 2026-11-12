<?php
/** @var array<string, string> $formValues */
?>
<main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
  <section class="auth-card card border-0 overflow-hidden">
    <div class="brand-panel text-center text-white">
      <h1 class="brand-title mb-1">ADVOKITA</h1>
      <p class="brand-subtitle mb-0">Whistleblowing &amp; Legal Aid System</p>
    </div>
    <form class="auth-form" method="post" action="<?= escape(url('register')) ?>" autocomplete="on">
      <?php csrf_input(); ?>
      <input type="hidden" name="action" value="register">

      <div class="rg-eyebrow">Mulai bergabung</div>
      <h2 class="rg-title">Buat Akun Baru</h2>
      <p class="rg-lead">Daftar menggunakan data Anda untuk mengajukan laporan di ADVOKITA.</p>

      <div class="rg-field" style="margin-top:0">
        <label class="rg-label" for="registerName">Nama lengkap <b>*</b></label>
        <div class="rg-input">
          <svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-6 8-6s8 2 8 6"/></svg>
          <input id="registerName" name="fullName" maxlength="120" autocomplete="name" required placeholder="Masukkan nama lengkap" value="<?= escape($formValues['fullName'] ?? '') ?>">
        </div>
      </div>

      <div class="rg-field">
        <label class="rg-label" for="registerUserType">Tipe Pengguna <b>*</b></label>
        <div class="rg-input">
          <select id="registerUserType" name="user_type" required>
            <option value="" disabled selected>Pilih tipe pengguna</option>
            <option value="mahasiswa">Mahasiswa</option>
            <option value="dosen">Dosen</option>
            <option value="civitas">Civitas Fakultas</option>
          </select>
        </div>
      </div>

      <div class="rg-field">
        <label class="rg-label" for="registerNim">NPM/NIP <b>*</b></label>
        <div class="rg-input">
          <svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16c.6-1.4 1.7-2 3-2s2.4.6 3 2M15 10h3M15 14h3"/></svg>
          <input id="registerNim" name="nim" required inputmode="numeric" pattern="[0-9]{4,20}" autocomplete="username" placeholder="Masukkan NPM/NIP Anda" value="<?= escape($formValues['nim'] ?? '') ?>">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label" for="registerPassword">Kata sandi <span class="text-danger">*</span></label>
        <input class="form-control" type="password" id="registerPassword" name="password" minlength="8" maxlength="72" autocomplete="new-password" required placeholder="Minimal 8 karakter">
      </div>
      <div class="mb-4">
        <label class="form-label" for="registerPasswordConfirm">Konfirmasi kata sandi <span class="text-danger">*</span></label>
        <input class="form-control" type="password" id="registerPasswordConfirm" name="passwordConfirm" minlength="8" maxlength="72" autocomplete="new-password" required placeholder="Ulangi kata sandi">
      </div>
      <button class="btn btn-danger w-100" type="submit">Registrasi</button>
      <p class="auth-switch mb-0">Sudah punya akun? <a href="<?= escape(url('login')) ?>">Masuk di sini</a></p>
    </form>
  </section>
</main>
