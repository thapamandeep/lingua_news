document.addEventListener('DOMContentLoaded', () => {

    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.querySelector('.sidebar-overlay');

    const dropdowns = document.querySelectorAll('.dropdown');
    const navLinks = document.querySelectorAll('.menu a');

    const currentPath = window.location.pathname;

    // STOP if layout missing
    if (!sidebar || !overlay || !menuToggle) return;

    const openSidebar = () => {
        sidebar.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    };

    const closeSidebar = () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    };

    const toggleSidebar = () => {
        sidebar.classList.contains('active') ? closeSidebar() : openSidebar();
    };

    menuToggle.addEventListener('click', toggleSidebar);
    overlay.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeSidebar();
    });

    dropdowns.forEach(dropdown => {
        const button = dropdown.querySelector('.dropdown-btn');
        if (!button) return;

        button.addEventListener('click', () => {

            const isActive = dropdown.classList.contains('active');

            dropdowns.forEach(d => d.classList.remove('active'));

            if (!isActive) dropdown.classList.add('active');
        });
    });

    navLinks.forEach(link => {

    link.classList.remove('active'); // IMPORTANT RESET

    let linkPath;

    try {
        linkPath = new URL(link.href, window.location.origin).pathname;
    } catch {
        return;
    }

    if (linkPath === currentPath) {

        link.classList.add('active');

        const parent = link.closest('.dropdown');
        if (parent) parent.classList.add('active');
    }

    link.addEventListener('click', () => {

        navLinks.forEach(item => item.classList.remove('active'));
        link.classList.add('active');

        if (window.innerWidth <= 992) {
            closeSidebar();
        }
    });
});

});