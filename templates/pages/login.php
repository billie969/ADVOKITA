<?php
/** @var array<string, string> $formValues */
?>
<main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
  <section class="auth-card card border-0 overflow-hidden">
    <div class="brand-panel text-center text-white">
      <h1 class="brand-title mb-1">ADVOKITA</h1>
      <p class="brand-subtitle mb-0">Whistleblowing &amp; Legal Aid System</p>
    </div>
    <form class="auth-form" method="post" action="<?= escape(url('login')) ?>" autocomplete="on">
      <?php csrf_input(); ?>
      <input type="hidden" name="action" value="login">
      <div class="mb-4"><h2>Masuk ke ADVOKITA</h2><p class="text-secondary mb-0">Gunakan akun mahasiswa atau admin Anda.</p></div>
      <div class="mb-3">
        <label class="form-label" for="loginNim">NPM <span class="text-danger">*</span></label>
        <input class="form-control" id="loginNim" name="nim" required inputmode="numeric" pattern="[0-9]{4,20}" autocomplete="username" placeholder="Masukkan NPM Anda" value="<?= escape($formValues['nim'] ?? '') ?>">
      </div>
<<<<<<< HEAD
      <div class="mb-3">
        <label class="form-label" for="loginPassword">Kata sandi <span class="text-danger">*</span></label>
        <input class="form-control" type="password" id="loginPassword" name="password" minlength="8" maxlength="72" autocomplete="current-password" required placeholder="Minimal 8 karakter">
      </div>
      <button class="btn btn-danger w-100" type="submit">Masuk</button>
      <p class="auth-switch mb-0">Belum punya akun? <a href="<?= escape(url('register')) ?>">Daftar di sini</a></p>
    </form>
=======

      <form
        method="post"
        action="<?= escape(url('login')) ?>"
        autocomplete="on"
      >

        <?php csrf_input(); ?>

        <input type="hidden" name="action" value="login">

        <!-- NPM -->
        <div class="login-field">

          <label for="loginNim">
            NPM <span class="login-required">*</span>
          </label>

          <div class="login-input-wrap">

            <i class="bi bi-person" aria-hidden="true"></i>

            <input
              class="login-input"
              type="text"
              id="loginNim"
              name="nim"
              required
              inputmode="numeric"
              pattern="[0-9]{4,20}"
              autocomplete="username"
              placeholder="Masukkan NPM/NIP Anda"
              value="<?= escape($formValues['nim'] ?? '') ?>"
            >

          </div>

        </div>

        <!-- PASSWORD -->
        <div class="login-field">

          <label for="loginPassword">
            Kata Sandi <span class="login-required">*</span>
          </label>

          <div class="login-input-wrap">

            <i class="bi bi-lock" aria-hidden="true"></i>

            <input
              class="login-input"
              type="password"
              id="loginPassword"
              name="password"
              minlength="8"
              maxlength="72"
              autocomplete="current-password"
              required
              placeholder="Masukkan kata sandi"
            >

            <button
              class="login-password-toggle"
              type="button"
              id="togglePassword"
              aria-label="Tampilkan kata sandi"
              aria-controls="loginPassword"
              aria-pressed="false"
            >
              <i class="bi bi-eye" aria-hidden="true"></i>
            </button>

          </div>

        </div>

        <!-- SUBMIT -->
        <button class="login-submit" type="submit">
          <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i>
          Masuk ke ADVOKITA
        </button>

        <p class="login-register">
          Belum punya akun?
          <a href="<?= escape(url('register')) ?>">Daftar di sini</a>
        </p>

        <div class="login-security">
          <i class="bi bi-shield-lock-fill" aria-hidden="true"></i>
          Akses aman dan terlindungi
        </div>

      </form>

    </div><!-- /.login-form-panel -->

>>>>>>> 56a0480 (Apply pending UI updates (about-services, login) and registration user type)
  </section>
</main>
