const filters = document.querySelectorAll('.teachers__header .default-dropdown__list li')
const teacherCards = document.querySelectorAll('.teacher_card')
if (filters) {
    filters.forEach(filter => {
        filter.addEventListener('click', function() {
            let cat = this.dataset.cat
            console.log(cat)
            console.log(cat == 'all')
            if (cat == 'all') {
                teacherCards.forEach(card => {
                    card.classList.remove('hidden')
                })
            } else {
                teacherCards.forEach(card => {
                    if (card.dataset.cat == cat) {
                        card.classList.remove('hidden')
                    } else {
                        card.classList.add('hidden')
                    }
                })
            }
        })
    })
}