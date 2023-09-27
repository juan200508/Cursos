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
    let formCreate = document.querySelector('#formCreate')

    formCreate.addEventListener('submit', (event) => {
        event.preventDefault();

        let formData = new FormData(formCreate);

        axios.post('applicant/store', formData)
            .then((result) => {
                Swal.fire({
                    title: result.data.message,
                    icon: 'success',
                    confirmButtonText: 'Listo',
                    showCloseButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                }).then((reponse) => {
                    if (reponse.isConfirmed) {
                        window.location.href = result.data.url;
                    }
                })
            })
            .catch((error) => {
                console.log(error);
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
</script>
