@extends('layout.main')
@section('content')
    <div class="container py-5">
        <form action="{{ route('shorten') }}" method="POST" class="main--form">
            @csrf
            <div class="input-group bg-light main--input-group">
                <input type="text" name='url' required class="main--input form-control bg-light border border-0">
                <button class="btn btn-primary-outlined main--button" type='submit'>
                    Shorten
                    @include('svg.send')
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
