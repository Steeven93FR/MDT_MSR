document.addEventListener('DOMContentLoaded', () => {
    const activeItem = document.querySelector('.nav-item.active');
    if (activeItem) {
        activeItem.setAttribute('aria-current', 'page');
    }
});
