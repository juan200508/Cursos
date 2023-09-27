<script>
    // Method for disable and enable a service - ADMINISTRATOR
    let buttons = document.querySelectorAll('.button')
    buttons.forEach((button) => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            // Help with ChatGPT for get the id of the service
            let idUser = this.dataset.id;
            let id = this.id;

            let url = id === 'enable' ? `user/enable/${idUser}` : `user/disable/${idUser}`

            console.log(id);
            axios.put(url)
                .then((result) => {
                    Swal.fire({
                        icon: 'info',
                        title: result.data.message,
                        showConfirmButton: false,
                        timer: 1700
                    }).then(() => {
                        location.reload();
                    })
                })
                .catch((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: error.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
        })
    });

// Method for create an applicant - ADMINISTRATOR
let formCreate = document.querySelectorAll('#formCreate')

formCreate.addEventListener('submit', (event) => {
    event.preventDefault();

    let formData = new FormData(formCreate);
    const formObject = Object.fromEntries(formData);


    console.log(formObject);
})

</script>
