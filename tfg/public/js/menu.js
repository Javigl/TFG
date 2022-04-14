(function(){
    const openButton = document.querySelector('.nav__menu');
    const menu = document.querySelector('.nav__link');
    const closeMenu = document.querySelector('.nav__close');

    openButton.addEventListener('click', ()=>{
<<<<<<< HEAD
        menu.classList.add('nav__link--show')
    })
=======
        menu.classList.add('nav__link--show');
    });
>>>>>>> develop

    closeMenu.addEventListener('click', ()=>{
        menu.classList.remove('nav__link--show');
    })
<<<<<<< HEAD
=======

>>>>>>> develop
})();