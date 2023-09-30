@extends('layout.main')
@section('content')
    <div class="container">
        <form action="{{ route('shorten') }}" method="POST">
            @csrf
            <div class="input-group pt-3">
                <input type="text" name='url' required class="form-control">
                <button class="btn" type='submit'>
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
