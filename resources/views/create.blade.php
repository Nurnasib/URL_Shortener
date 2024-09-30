@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('URLs') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('urls.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="original_url">Original URL</label>
                                    <input type="url" class="form-control @error('original_url') is-invalid @enderror" id="original_url" name="original_url" value="{{ old('original_url') }}" required>

                                    @error('original_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Shorten URL</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
