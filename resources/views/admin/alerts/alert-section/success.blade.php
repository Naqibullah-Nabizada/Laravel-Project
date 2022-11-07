@if (session('alert-section-success'))
    <div class="alert alert-success alert-dismissible show fade">
            <h4 class="alert-heading">موفقیت!</h4>
            <hr>
            <p>{{ session('alert-section-success') }}</p>
            <button type="button" class="close" data-dismiss="close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
