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
                        <div>
                            <a class="btn btn-warning" href="{{ route('home') }}">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        Add new category
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-group mt-4">
                                <input type="text" class="form-control" name="category_name" placeholder="Add new category">
                                @error('category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Save category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
