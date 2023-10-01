@if ($errors->any())
    <div class="alert alert-danger fade show main--alert-error d-flex justify-content-between align-items-center"
        role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button type="button" class="btn py-2 px-2 shadow-none rounded-pill main--alert-close-button"
            data-bs-dismiss="alert">
            @include('svg.x')
        </button>
    </div>
@endif
