@extends('layout.app')

@push('styles')
    <style>
        .ok {
            background-color: red;
            color: white;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="ok">{{ __('Dashboard') }}</div>


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        alert('Hello');
    </script>
@endpush
