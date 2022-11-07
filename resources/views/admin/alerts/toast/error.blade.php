@if (session('toast-error'))
    <section class="toast" data-delay="5000">
        <section class="toast-header">خطا!</section>
        <section class="toast-body">
            <span class="ml-auto">{{ session('toast-error') }}</span>
            <button type="button" class="mr-2 close" data-dismiss="toast">
                <span aria-hidden="true">&times;</span>
            </button>
        </section>
    </section>

    <script>
        $(document).ready(function() {
            $(".toast").toast('show');
        });
    </script>
@endif
