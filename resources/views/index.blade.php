@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('URLs') }}<span class="float-end"><a href="{{ route('urls.create') }}" class="btn btn-success">Add URL</a></span></div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>original URL</th>
                                    <th>short URL</th>
                                    <th>count</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($urls)
                            @foreach($urls as $url)
                                <tr>
                                    <td><a href="{{ $url->original_url }}" target="_blank">{{ $url->original_url }}</a></td>
                                    <td><a href="{{ route('urls.show', $url->short_url) }}" target="_blank">{{ route('urls.show', $url->short_url) }}</a></td>
                                    <td>{{$url->count}}</td>
                                </tr>
                            @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
