let nav = document.querySelector('nav');

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        nav.classList.add('bg-green-400', 'backdrop-blur-sm', 'bg-white/30');
    } else {
        nav.classList.remove('bg-green-400', 'backdrop-blur-sm', 'bg-white/30');
    }
})