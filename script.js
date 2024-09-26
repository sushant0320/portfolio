const header = document.querySelector("header");

window.addEventListener("scroll", function() {
    header.classList.toggle("sticky", window.scrollY > 200);
});

let menu = document.querySelector('#menu-icon');
let navlist = document.querySelector('.navlist'); 

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('open');
};

window.onscroll = () => {
    menu.classList.remove('bx-x');
    navlist.classList.remove('open');
};

const sr = ScrollReveal({
    distance: '40px',
    duration: 2050,
    delay: 200,
    reset: true
});

// Existing ScrollReveal effects
sr.reveal('.hero-text', { origin: 'top' });
sr.reveal('.about-img, .service-item, .about-text', { origin: 'bottom' });
sr.reveal('.about-text h2, .text-center, .right-contact h2', { origin: 'top' });
sr.reveal('.left-contact', { origin: 'left' });
sr.reveal('.right-contact', { origin: 'right' });
sr.reveal('.end-section', { origin: 'top' });

// New ScrollReveal effects for blog section
sr.reveal('.section-title', { origin: 'top', interval: 200 });
sr.reveal('.blog-card', { origin: 'bottom', interval: 200 });
sr.reveal('.read-more', { origin: 'bottom', delay: 300 });
