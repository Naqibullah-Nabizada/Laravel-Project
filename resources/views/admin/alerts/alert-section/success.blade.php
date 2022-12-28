@if (session('alert-section-success'))
    <div class="alert alert-success alert-dismissible w-25 mr-0">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p>{{ session('alert-section-success') }}</p>

    </div>
@endif
