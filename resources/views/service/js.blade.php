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


</script>
