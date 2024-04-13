console.log(' * header.jsの読み込み確認');


document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(function (menuItem) {
        menuItem.addEventListener('mouseenter', function () {
            console.log('aaaa');
            const subMenu = menuItem.querySelector('.sub-menu');
            if (subMenu) {
                subMenu.classList.remove('hidden');
            }
        });

        menuItem.addEventListener('mouseleave', function () {
            console.log('bbbb');

            const subMenu = menuItem.querySelector('.sub-menu');
            if (subMenu) {
                subMenu.classList.add('hidden');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('ohmorilab__site-header');

    window.addEventListener('scroll', function () {
        // スクロール量が50pxより大きいかどうかを確認
        if (window.scrollY > 50) {
            header.classList.remove('bg-transparent');
            header.classList.add('bg-white');
        } else {
            header.classList.remove('bg-white');
            header.classList.add('bg-transparent');
        }
    });
});
