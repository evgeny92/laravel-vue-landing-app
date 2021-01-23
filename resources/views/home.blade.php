@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="d-inline-block">
                            {{ __('Dashboard') }}
                        </div>
                        <form method="post" class="d-inline-block" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>

                    <div class="card-body">
                        {{ __('You are logged in!') }}
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-success w-50 m-1" href="{{ route('category.create') }}">Add new category</a>
                            <a class="btn btn-success w-50 m-1" href="{{ route('category.index') }}">Show categories</a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-success w-50 m-1" href="{{ route('subcategory.create') }}">Add new subcategory</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
