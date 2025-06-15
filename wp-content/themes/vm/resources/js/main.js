console.log('test')

    const submenuToggles = document.querySelectorAll('.header__submenu-toggle');
    submenuToggles.forEach(toggle => {
        toggle.addEventListener('change', (e) => {
            if (toggle.checked) {
                submenuToggles.forEach(other => {
                    if (other !== toggle) {
                        other.checked = false;
                    }
                });
            }
        });
    });
    document.addEventListener('click', (e) => {
        const isClickInsideMenu = e.target.closest('.header__menu');

        if (!isClickInsideMenu) {
            submenuToggles.forEach(toggle => {
                toggle.checked = false;
            });
        }
    });
    const burgerCheckbox = document.getElementById('menu-toggle');
    const nav = document.querySelector('.header__nav');

    document.addEventListener('click', (e) => {
        const isClickInsideMenu = nav.contains(e.target) || e.target === burgerCheckbox || e.target.closest('.header__burger');

        if (!isClickInsideMenu && burgerCheckbox.checked) {
            burgerCheckbox.checked = false; // Ferme le menu
        }
    });
