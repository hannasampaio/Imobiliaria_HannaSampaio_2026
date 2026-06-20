document.addEventListener('DOMContentLoaded', function () {
    const style = getComputedStyle(document.documentElement);
    const colorNavy = style.getPropertyValue('--navy').trim() || '#0b1f3a';
    const colorGold = style.getPropertyValue('--gold').trim() || '#c9a227';
    const colorError = style.getPropertyValue('--error').trim() || '#dc3545';

    if (window.HannaApp?.success) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: window.HannaApp.success,
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            background: '#ffffff',
            color: colorNavy,
            iconColor: colorGold,
            showClass: { popup: '' },
            hideClass: { popup: '' },
            customClass: { popup: 'toast-hanna-success' }
        });
    }

    if (window.HannaApp?.error) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: window.HannaApp.error,
            showConfirmButton: false,
            timer: 4500,
            timerProgressBar: true,
            background: '#ffffff',
            color: colorNavy,
            iconColor: colorError,
            customClass: { popup: 'toast-hanna-error' }
        });
    }

    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const titulo = form.dataset.title || 'Eliminar registo?';
            const texto = form.dataset.text || 'Esta ação não pode ser desfeita.';

            Swal.fire({
                title: titulo,
                text: texto,
                icon: 'warning',
                showCancelButton: true,
                reverseButtons: true,
                confirmButtonText: '<i class="bi bi-trash-fill"></i> Sim, eliminar',
                cancelButtonText: '<i class="bi bi-x-circle"></i> Cancelar',
                confirmButtonColor: colorGold,
                cancelButtonColor: colorNavy,
                background: '#ffffff',
                color: colorNavy,
                buttonsStyling: true,
                customClass: {
                    popup: 'swal-hanna-popup',
                    title: 'swal-hanna-title',
                    confirmButton: 'swal-hanna-confirm',
                    cancelButton: 'swal-hanna-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
