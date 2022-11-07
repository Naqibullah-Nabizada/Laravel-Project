{{-- @if (session('toast-success')) --}}
    <section class="toast" data-delay="5000">
        <section class="toast-header">موفقیت</section>
        <section class="toast-body d-flex bg-success">
            <span class="ml-auto">{{ session('toast-success') }}</span>
            <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </section>
    </section>

    <script>
        $(document).ready(function() {
            $(".toast").toast('show');
        });
    </script>
{{-- @endif --}}
