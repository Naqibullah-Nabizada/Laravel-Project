@if (session('alert-section-info'))
    <div class="alert alert-info alert-dismissible show fade">
            <h4 class="alert-heading">خطا!</h4>
            <hr>
            <p>{{ session('alert-section-info') }}</p>
            <button type="button" class="close" data-dismiss="close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
