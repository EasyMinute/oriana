const accordeons = document.querySelectorAll('.accordeons-card')
accordeons.forEach(elem => {
    elem.addEventListener('click', function() {
        this.classList.toggle('active')
    })
})