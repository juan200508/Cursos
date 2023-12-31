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
    let formEdit = document.querySelectorAll('#formEdit')

    formEdit.forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault()

            let formData = new FormData(form);

            // Help with Tabine to autocomplete some code lines
            axios.post('{{ route('services.update') }}', formData)
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
                        title: error.response.data.message,
                        icon: 'error',
                        confirmButtonText: 'Listo',
                        showCloseButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    })
                });
        })
    })

    // Method for inscription a applicant to a service
    let buttonsIns = document.querySelectorAll('.buttonIns')
    buttonsIns.forEach((button) => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            // Help with ChatGPT for get the id of the service
            let service_id = this.dataset.id;
            let id = this.id;

            console.log(service_id);

            let url = id === 'inscription' ? `inscriptions/store/${service_id}` :
                `inscriptions/cancel/${service_id}`

            console.log(id);
            axios.post(url)
                .then((result) => {
                    console.log(result);
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
                    console.log(error);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: error.response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
        })
    });
</script>
