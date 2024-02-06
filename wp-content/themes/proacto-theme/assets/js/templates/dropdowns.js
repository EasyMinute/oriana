const dropdowns = document.querySelectorAll('.default-dropdown')

dropdowns.forEach(dropdown => {
    const trigger = dropdown.querySelector('.default-dropdown__opener')
    trigger.addEventListener('click', function(){
        dropdown.classList.toggle('active')
    })

    const options = dropdown.querySelectorAll('.default-dropdown__list li')
    options.forEach(option => {
        option.addEventListener('click', function() {
            let text = option.innerText;
            dropdown.classList.remove('active')
            trigger.innerText = text
        })
    })
})