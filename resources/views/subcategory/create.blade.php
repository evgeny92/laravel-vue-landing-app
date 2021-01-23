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
                        Add new subcategory
                        <form action="{{ route('subcategory.store') }}" method="post">
                            @csrf
                            @if(!empty($categories))
                                <div class="form-group mt-4">
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $one_category)
                                            <option value="{{ $one_category->id ?? '' }}">{{ $one_category->category_name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group mt-4">
                                <input type="text" class="form-control" name="subcategory_name"
                                       placeholder="Add new subcategory">
                                @error('subcategory_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Save subcategory
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
