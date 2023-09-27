@extends('layout.main')
@section('content')
    <form action="{{ route('shorten') }}" method="POST">
        @csrf
        <div class="input-group">
            <input type="text" name='url' required class="form-control">
            <button class="btn" type='submit'>
                @include('svg.send')
            </button>
        </div>
    </form>
@endsection
