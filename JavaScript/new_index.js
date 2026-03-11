// ── SLIDESHOW ──
const slides = document.querySelectorAll('.slide');
const dotsWrap = document.getElementById('dots');
let cur = 0, timer;

slides.forEach((_, i) => {
  const d = document.createElement('div');
  d.className = 'dot' + (i === 0 ? ' active' : '');
  d.addEventListener('click', () => goTo(i));
  dotsWrap.appendChild(d);
});

function getDots() { return document.querySelectorAll('.dot'); }

function goTo(n) {
  slides[cur].classList.remove('active');
  getDots()[cur].classList.remove('active');
  cur = (n + slides.length) % slides.length;
  slides[cur].classList.add('active');
  getDots()[cur].classList.add('active');
  clearInterval(timer);
  timer = setInterval(() => goTo(cur + 1), 5500);
}

function nextSlide() { goTo(cur + 1); }
function prevSlide() { goTo(cur - 1); }

timer = setInterval(() => goTo(cur + 1), 5500);

// ── SWIPE SUPPORT (mobile) ──
let touchStartX = 0;
document.querySelector('.hero').addEventListener('touchstart', e => {
  touchStartX = e.touches[0].clientX;
}, { passive: true });
document.querySelector('.hero').addEventListener('touchend', e => {
  const diff = touchStartX - e.changedTouches[0].clientX;
  if (Math.abs(diff) > 50) diff > 0 ? nextSlide() : prevSlide();
});

// ── SCROLL REVEAL ──
const obs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in'); });
}, { threshold: 0.12 });
document.querySelectorAll('.rv').forEach(el => obs.observe(el));

// ── BOOKING FORM ──
function formDone(e) {
  e.preventDefault();
  document.getElementById('bFormWrap').style.display = 'none';
  document.getElementById('form-thanks').style.display = 'block';
}