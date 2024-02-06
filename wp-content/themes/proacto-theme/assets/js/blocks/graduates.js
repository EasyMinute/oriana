const gradYears = document.querySelectorAll('.graduates__header .default-dropdown li')
const gradContainer = document.getElementById('graduates_response')

if (gradYears) {
    gradYears.forEach(elem => {
        elem.addEventListener('click', function() {
            let id = this.dataset.cat
            let ajaxurl = gradContainer.dataset.url

            jQuery.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'filter_grads', // The action hook name on the server side
                    id: id // Passing the 'id'
                },
                success: function(response) {

                    gradContainer.innerHTML = response;
                },
                error: function(error) {
                    // Handle error
                    console.error('Error:', error);
                }
            });
        })
    })
}