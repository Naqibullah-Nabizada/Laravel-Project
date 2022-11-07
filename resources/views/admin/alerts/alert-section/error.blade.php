@if (session('alert-section-error'))
    <div class="alert alert-danger alert-dismissible show fade">
            <h4 class="alert-heading">خطا!</h4>
            <hr>
            <p>{{ session('alert-section-error') }}</p>
            <button type="button" class="close" data-dismiss="close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
