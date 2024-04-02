const projectsBlock = document.querySelector('.projects')

if (projectsBlock) {
    const projectsFilterButtons = projectsBlock.querySelectorAll('.projects__header__wrap .choise-chips')
    const projectCards = projectsBlock.querySelectorAll('.projects__list .project-card')

    projectsFilterButtons.forEach(button => {
        button.addEventListener('click', function (e){
            e.preventDefault();
            var dataTarget = button.dataset.target

            projectsFilterButtons.forEach(item => {
                item.classList.remove('active')
            })
            button.classList.add('active')

            projectCards.forEach(card => {
                console.log(card)
                if (card.dataset.target === dataTarget || dataTarget === "all") {
                    card.classList.remove('hidden')
                } else {
                    card.classList.add('hidden')
                }
            })
        })
    })
}