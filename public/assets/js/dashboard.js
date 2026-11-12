// KILAS INFO (NEWS TICKER)
(function() {
  var list = document.getElementById('tickerList');
  if (!list) return;
  var items = list.querySelectorAll('.news-ticker-item');
  if (items.length <= 1) return;

  var current = 0;
  var total = items.length;
  var timer = null;

  function getItemHeight() {
    return items[0] ? items[0].offsetHeight || 24 : 24;
  }

  function moveTo(index) {
    current = (index + total) % total;
    var h = getItemHeight();
    list.style.transform = 'translateY(-' + (current * h) + 'px)';
  }

  function start() {
    stop();
    timer = setInterval(function() {
      moveTo(current + 1);
    }, 4000);
  }

  function stop() {
    if (timer) {
      clearInterval(timer);
      timer = null;
    }
  }

  var wrap = document.getElementById('newsTickerBar');
  if (wrap) {
    wrap.addEventListener('mouseenter', stop);
    wrap.addEventListener('mouseleave', start);
  }

  var prev = document.getElementById('tickerPrev');
  var next = document.getElementById('tickerNext');
  if (prev) {
    prev.addEventListener('click', function(e) {
      e.preventDefault();
      moveTo(current - 1);
      start();
    });
  }
  if (next) {
    next.addEventListener('click', function(e) {
      e.preventDefault();
      moveTo(current + 1);
      start();
    });
  }

  start();
})();

// ANNOUNCEMENT HORIZONTAL SLIDER
(function() {
  var wrap  = document.getElementById('announcementTrack');
  if (!wrap) return;
  var slides   = Array.from(wrap.querySelectorAll('.announcement-slide'));
  if (!slides.length) return;

  var prevBtn  = document.getElementById('announcementPrev');
  var nextBtn  = document.getElementById('announcementNext');
  var dotsWrap = document.getElementById('announcementDots');

  // Berapa slide yang terlihat sekaligus (1 di mobile, 2 di desktop)
  function perPage() {
    return window.innerWidth <= 768 ? 1 : 2;
  }

  var current = 0; // indeks slide paling kiri yang tampil

  function maxIndex() {
    return Math.max(0, slides.length - perPage());
  }

  function applyTransform() {
    var pp   = perPage();
    var gap  = 16;
    // Lebar satu slide = (wrap.offsetWidth - gap*(pp-1)) / pp
    var slideW = (wrap.offsetWidth - gap * (pp - 1)) / pp;
    var offset = current * (slideW + gap);
    wrap.style.transform = 'translateX(-' + offset + 'px)';
  }

  function updateButtons() {
    if (prevBtn) prevBtn.disabled = current <= 0;
    if (nextBtn) nextBtn.disabled = current >= maxIndex();
  }

  function updateDots() {
    if (!dotsWrap) return;
    var dots = dotsWrap.querySelectorAll('.announcement-dot');
    dots.forEach(function(d, i) {
      d.classList.toggle('active', i === current);
    });
  }

  function goTo(idx) {
    current = Math.max(0, Math.min(idx, maxIndex()));
    applyTransform();
    updateButtons();
    updateDots();
  }

  // Buat dots — satu per "halaman"
  if (dotsWrap) {
    dotsWrap.innerHTML = '';
    var totalDots = maxIndex() + 1;
    for (var i = 0; i < totalDots; i++) {
      (function(idx) {
        var dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'announcement-dot' + (idx === 0 ? ' active' : '');
        dot.setAttribute('aria-label', 'Ke slide ' + (idx + 1));
        dot.addEventListener('click', function() { goTo(idx); });
        dotsWrap.appendChild(dot);
      })(i);
    }
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', function() { goTo(current - 1); });
  }
  if (nextBtn) {
    nextBtn.addEventListener('click', function() { goTo(current + 1); });
  }

  // Recalculate saat resize
  window.addEventListener('resize', function() { goTo(Math.min(current, maxIndex())); });

  // Init
  goTo(0);
})();
