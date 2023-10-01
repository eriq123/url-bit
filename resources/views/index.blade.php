@extends('layout.main')
@section('content')
    <div class="container py-0">
        <div class="main--form d-flex flex-column">

            <div class="flex-grow-1 d-flex flex-column justify-content-center">
                <h1 class="text-center text-uppercase display-1 text-primary-emphasis">{{ config('app.name') }}</h1>
                <h3 class="text-center text-italic text-uppercase text-light-emphasis">Shorten long url links</h3>
            </div>
            <form action="{{ route('shorten') }}" method="POST" class="align-items-end">
                @csrf

                <div class="main--input-group input-group input-group-lg bg-white rounded-pill d-flex">
                    <input type="text" name='url' required placeholder="Paste your looooooooong url links"
                        class="main--input form-control bg-white border border-0 rounded-pill" autocomplete='off'>
                    <button class="btn btn-outline-primary main--button rounded-pill text-uppercase" type='submit'>
                        Shorten
                    </button>
                </div>
            </form>
        </div>

        @if (isset($sites) && count($sites) > 0)
            <div class="py-5 px-3 my-5 border border-black-1 rounded-4 bg-white">
                @foreach ($sites as $site)
                    <div class="card mb-3 border border-0 border-bottom rounded-0">
                        <div class="card-body d-flex justify-content-between flex-row">

                            <a href="{{ route('redirect', ['url' => $site->new_path]) }}" target="_blank"
                                class="align-self-center pe-4 d-inline-block" data-bs-toggle="tooltip"
                                data-bs-placement="right" data-bs-title="{{ Str::limit($site->full_path, 50) }}">
                                {{ Request::root() }}/{{ $site->new_path }}
                            </a>

                            <button type='button' class="btn d-inline home--button-copy" data-bs-toggle="tooltip"
                                data-bs-placement="right" data-bs-title="Copy link"
                                onClick='copy("{{ Request::root() }}/{{ $site->new_path }}")'>
                                @include('svg.copy')
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script>
        function copy(text) {
            navigator.clipboard.writeText(text)
        }
    </script>
@endsection
