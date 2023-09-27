<script>
    // Method for disable and enable a service - ADMINISTRATOR
    let buttons = document.querySelectorAll('.button')
    buttons.forEach((button) => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            // Help with ChatGPT for get the id of the service
            let idService = this.dataset.id;
            let id = this.id;

            let url = id === 'enable' ? `services/enable/${idService}` : `services/disable/${idService}`

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
                        position: 'top-end',
                        icon: 'error',
                        title: error.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
        })
    });

    // Method for create a service
    let formCreate = document.querySelector('#formCreate')

    formCreate.addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(formCreate);

        axios.post('services/store', formData)
            .then((result) => {
                Swal.fire({
                    icon: 'success',
                    title: result.data.message,
                    showConfirmButton: false,
                    timer: 1700
                }).then(() => {
                    location.reload();
                })
            })
            .catch((error) => {
                Swal.fire({
                    title: error.data.message,
                    icon: 'error',
                    confirmButtonText: 'Listo',
                    showCloseButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                })
            })
    })

    // Capture message from update service
    let formEdit = document.querySelector('#formEdit').addEventListener('submit', (event) => {
        event.preventDefault()
    })
</script>
