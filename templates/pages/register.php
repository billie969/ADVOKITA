<?php
/** @var array<string, string> $formValues */
?>
<style>
.auth-page{
  --navy:#1e2b47;--navy-d:#18233b;--red:#b8212f;--red-l:#c8323f;--pink:#ef6a7d;
  --ink:#1b2438;--muted:#6b7385;--line:#e6e8ee;--field:#f8f9fb;--green:#1f8f55;
  position:relative;overflow:hidden;padding:32px 16px;color:var(--ink);
  font-family:Inter,system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;
  background:
    radial-gradient(circle at 10% 12%,rgba(239,106,125,.14),transparent 28%),
    radial-gradient(circle at 92% 92%,rgba(30,43,71,.08),transparent 35%),
    #f5f6fa;
}
.auth-page::before,.auth-page::after{content:"";position:absolute;border-radius:50%;border:56px solid rgba(30,43,71,.05);pointer-events:none}
.auth-page::before{width:280px;height:280px;top:-120px;right:-80px}
.auth-page::after{width:220px;height:220px;bottom:-110px;left:-60px;border-color:rgba(184,33,47,.06)}

.auth-split{
  position:relative;z-index:1;width:100%;max-width:900px;display:grid;grid-template-columns:45% 55%;
  background:#fff;border-radius:24px;overflow:hidden;
  box-shadow:0 30px 60px -20px rgba(30,43,71,.25),0 0 0 1px rgba(30,43,71,.04);
}
.auth-brand{
  position:relative;overflow:hidden;color:#fff;text-align:center;padding:40px 28px;
  background:linear-gradient(160deg,var(--navy),var(--navy-d));
  display:flex;flex-direction:column;align-items:center;justify-content:center;
}
.auth-brand::before,.auth-brand::after{content:"";position:absolute;border-radius:50%;border:38px solid rgba(255,255,255,.06)}
.auth-brand::before{width:200px;height:200px;top:-100px;right:-60px}
.auth-brand::after{width:150px;height:150px;bottom:-75px;left:-40px}
.auth-brand>*{position:relative;z-index:1}
.auth-logo{width:88px;height:88px;border-radius:22px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.14);display:grid;place-items:center;margin-bottom:28px}
.auth-brand-title{font-size:40px;font-weight:800;letter-spacing:.06em;line-height:1;margin:0}
.auth-brand-title span{color:var(--pink)}
.auth-brand-sub{margin:16px 0 0;font-size:14px;font-weight:500;color:#e8ebf2}
.auth-brand-line{width:48px;height:3px;border:0;border-radius:2px;background:var(--pink);opacity:1;margin:24px 0 20px}
.auth-brand-tag{font-size:11.5px;font-weight:500;letter-spacing:.14em;color:#aab2c4;text-transform:uppercase}

.auth-form{padding:48px 48px 36px}
.auth-eyebrow{display:flex;align-items:center;gap:10px;font-size:11.5px;font-weight:700;letter-spacing:.16em;color:var(--red);text-transform:uppercase}
.auth-eyebrow::before{content:"";width:22px;height:2px;background:var(--red)}
.auth-title{font-size:30px;font-weight:800;margin:10px 0 0;letter-spacing:-.02em}
.auth-lead{margin:8px 0 26px;font-size:14px;line-height:1.7;color:var(--muted)}
.auth-field{margin-top:18px}
.auth-label{display:block;font-size:13px;font-weight:700;margin-bottom:8px}
.auth-label b{color:var(--red)}
.auth-input{position:relative}
.auth-input>svg.ic{position:absolute;left:16px;top:50%;transform:translateY(-50%);color:#8b93a5;pointer-events:none}
.auth-input input{
  width:100%;height:50px;border:1px solid var(--line);border-radius:12px;background:var(--field);
  padding:0 46px;font:inherit;font-size:14px;color:var(--ink);transition:border-color .15s,box-shadow .15s,background .15s;
}
.auth-input input::placeholder{color:#9aa1b1}
.auth-input input:focus{outline:none;background:#fff;border-color:var(--red);box-shadow:0 0 0 4px rgba(184,33,47,.12)}
.auth-eye{position:absolute;right:8px;top:50%;transform:translateY(-50%);width:36px;height:36px;border:0;background:none;border-radius:8px;color:#8b93a5;cursor:pointer;display:grid;place-items:center}
.auth-eye:hover{color:var(--ink)}
.auth-eye:focus-visible{outline:2px solid var(--red)}
.auth-btn{
  width:100%;height:50px;margin-top:24px;border:0;border-radius:12px;cursor:pointer;color:#fff;font:inherit;font-size:14.5px;font-weight:700;
  background:linear-gradient(90deg,var(--red),var(--red-l));display:flex;align-items:center;justify-content:center;gap:10px;
  box-shadow:0 10px 20px -8px rgba(184,33,47,.55);transition:transform .15s,box-shadow .15s;
}
.auth-btn:hover{transform:translateY(-1px);box-shadow:0 14px 24px -8px rgba(184,33,47,.6)}
.auth-btn:focus-visible{outline:3px solid rgba(184,33,47,.35);outline-offset:2px}
.auth-switch{text-align:center;font-size:13.5px;color:var(--muted);margin:20px 0 0}
.auth-switch a{color:var(--red);font-weight:700;text-decoration:none}
.auth-switch a:hover{text-decoration:underline}
.auth-secure{margin-top:22px;padding-top:18px;border-top:1px solid var(--line);display:flex;align-items:center;justify-content:center;gap:8px;font-size:12px;color:var(--muted)}

@media (max-width:760px){
  .auth-split{grid-template-columns:1fr;max-width:460px}
  .auth-brand{padding:28px 24px}
  .auth-logo{width:60px;height:60px;border-radius:16px;margin-bottom:16px}
  .auth-logo svg{width:28px;height:28px}
  .auth-brand-title{font-size:30px}
  .auth-brand-sub{margin-top:10px}
  .auth-brand-line,.auth-brand-tag{display:none}
  .auth-form{padding:32px 24px 28px}
}
@media (prefers-reduced-motion:reduce){.auth-page *{transition:none!important}}
</style>

<main class="auth-page min-vh-100 d-flex align-items-center justify-content-center">
  <section class="auth-split">
    <aside class="auth-brand">
      <div class="auth-logo">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7.5 3v5.5c0 4.6-3.1 8.2-7.5 9.5-4.4-1.3-7.5-4.9-7.5-9.5V6L12 3z"/><path d="M8.5 12l2.5 2.5 4.5-5"/></svg>
      </div>
      <h1 class="auth-brand-title">ADVO<span>KITA</span></h1>
      <p class="auth-brand-sub">Whistleblowing &amp; Legal Aid System</p>
      <hr class="auth-brand-line">
      <small class="auth-brand-tag">Transparansi · Perlindungan · Keadilan</small>
    </aside>

    <form class="auth-form" method="post" action="<?= escape(url('register')) ?>" autocomplete="on">
      <?php csrf_input(); ?>
      <input type="hidden" name="action" value="register">

      <div class="auth-eyebrow">Mulai bergabung</div>
      <h2 class="auth-title">Buat Akun Baru</h2>
      <p class="auth-lead">Daftar menggunakan data mahasiswa untuk mengajukan laporan di ADVOKITA.</p>

      <div class="auth-field" style="margin-top:0">
        <label class="auth-label" for="registerName">Nama lengkap <b>*</b></label>
        <div class="auth-input">
          <svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-6 8-6s8 2 8 6"/></svg>
          <input id="registerName" name="fullName" maxlength="120" autocomplete="name" required placeholder="Masukkan nama lengkap" value="<?= escape($formValues['fullName'] ?? '') ?>">
        </div>
      </div>

      <div class="auth-field">
        <label class="auth-label" for="registerNim">NPM <b>*</b></label>
        <div class="auth-input">
          <svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16c.6-1.4 1.7-2 3-2s2.4.6 3 2M15 10h3M15 14h3"/></svg>
          <input id="registerNim" name="nim" required inputmode="numeric" pattern="[0-9]{4,20}" autocomplete="username" placeholder="Masukkan NPM Anda" value="<?= escape($formValues['nim'] ?? '') ?>">
        </div>
      </div>

      <div class="auth-field">
        <label class="auth-label" for="registerPassword">Kata sandi <b>*</b></label>
        <div class="auth-input">
          <svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 018 0v3"/></svg>
          <input type="password" id="registerPassword" name="password" minlength="8" maxlength="72" autocomplete="new-password" required placeholder="Minimal 8 karakter">
          <button class="auth-eye" type="button" data-toggle="registerPassword" aria-label="Tampilkan kata sandi">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
      </div>

      <div class="auth-field">
        <label class="auth-label" for="registerPasswordConfirm">Konfirmasi kata sandi <b>*</b></label>
        <div class="auth-input">
          <svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 018 0v3"/></svg>
          <input type="password" id="registerPasswordConfirm" name="passwordConfirm" minlength="8" maxlength="72" autocomplete="new-password" required placeholder="Ulangi kata sandi">
          <button class="auth-eye" type="button" data-toggle="registerPasswordConfirm" aria-label="Tampilkan konfirmasi kata sandi">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
      </div>

      <button class="auth-btn" type="submit">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6M22 11h-6"/></svg>
        Daftar ke ADVOKITA
      </button>
      <p class="auth-switch">Sudah punya akun? <a href="<?= escape(url('login')) ?>">Masuk di sini</a></p>
      <div class="auth-secure">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="#1f8f55"><path d="M12 2l8 3v6c0 5-3.4 9-8 11-4.6-2-8-6-8-11V5l8-3z"/></svg>
        Akses aman dan terlindungi
      </div>
    </form>
  </section>
</main>

<script>
(function () {
  document.querySelectorAll('[data-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var input = document.getElementById(btn.dataset.toggle);
      input.type = input.type === 'password' ? 'text' : 'password';
    });
  });
  var pass = document.getElementById('registerPassword');
  var confirm = document.getElementById('registerPasswordConfirm');
  function check() {
    confirm.setCustomValidity(confirm.value && confirm.value !== pass.value ? 'Konfirmasi kata sandi tidak sama.' : '');
  }
  pass.addEventListener('input', check);
  confirm.addEventListener('input', check);
})();
</script>