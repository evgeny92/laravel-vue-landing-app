@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="d-inline-block">
                            All categories
                        </div>
                        <div>
                            <a class="btn btn-warning" href="{{ route('home') }}">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <categories-component v-bind:categories="{{ $categories }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
