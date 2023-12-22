const menuAncestros = document.querySelectorAll('.header .menu-item-has-children')

menuAncestros.forEach(elem => {
    elem.addEventListener('click', function(e) {
        e.stopPropagation()
        menuAncestros.forEach(child => {
            if (child != elem) {
                child.classList.remove('opened')
            }
        })
        elem.classList.toggle('opened')
    })
})

window.addEventListener('click', function (){
    menuAncestros.forEach(elem => {
        elem.classList.remove('opened')
    })
})


const headerBurger = document.querySelector('#header-burger')
const headerNav = document.querySelector('#header-nav')
headerBurger.addEventListener('click', function() {
    this.classList.toggle('active')
    headerNav.classList.toggle('active')
})