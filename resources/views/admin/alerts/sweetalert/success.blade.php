@if (session('swal-success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'اعلان موفقیت',
                text: '{{ session('swal-success') }}',
                confirmButtonText: 'باشه',
            });
        });
    </script>
@endif
