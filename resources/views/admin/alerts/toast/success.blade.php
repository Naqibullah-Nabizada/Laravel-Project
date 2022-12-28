@if (session('toast-success'))
    <section class="toast position-fixed flex-row-reverse" data-delay="7000"
        style="opacity: 100% !important; left: 0; top: 4rem; width: 20rem; max-width: 80%; ">
        <section class="toast-body bg-success">
            <div class="toast-header">
                <strong class="me-auto">فروشگاه آمازون</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <strong class="ml-auto">
                    <span class="ml-auto text-white">{{ session('toast-success') }}</span>
                </strong>
            </div>
        </section>
    </section>

@endif
