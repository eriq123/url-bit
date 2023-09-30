@extends('layout.main')
@section('content')
    <div class="container py-0">
        <form action="{{ route('shorten') }}" method="POST" class="main--form d-flex align-items-end">
            @csrf
            <div class="main--input-group input-group input-group-lg bg-white rounded-pill d-flex">
                <input type="text" name='url' required placeholder="Paste your looooooooong url links"
                    class="main--input form-control bg-white border border-0 rounded-pill">
                <button class="btn btn-outline-primary main--button rounded-pill text-uppercase" type='submit'>
                    Shorten
                </button>
            </div>
        </form>
        <div class="py-5">
            @foreach ($sites as $site)
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between flex-row">

                        <a href="{{ route('redirect', ['url' => $site->new_path]) }}" target="_blank"
                            class="align-self-center">
                            {{ Request::root() }}/{{ $site->new_path }}
                        </a>

                        <button type='button' class="btn d-inline">
                            Copy
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
