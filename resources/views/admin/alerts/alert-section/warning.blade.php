@if (session('alert-section-warning'))
    <div class="alert alert-warning alert-dismissible show fade">
            <h4 class="alert-heading">خطا!</h4>
            <hr>
            <p>{{ session('alert-section-warning') }}</p>
            <button type="button" class="close" data-dismiss="close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
