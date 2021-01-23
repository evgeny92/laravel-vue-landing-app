@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-6 d-flex flex-column justify-content-center">
                <div><h1>Link building is one of the most important thing in <span class="text-prime-color">SEO</span></h1></div>
                <div><h4>Every little helps. Submit your domain and get do follow backlink from our website</h4></div>
                <div class="py-5"><a href="{{ route('domain.create') }}" class="btn btn-primary">Submit your domain</a></div>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end align-items-center">
                    <img class="w-100 py-5 pl-5" src="{{ asset('img/backlink-img.png') }}" alt="Main img">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <h2 class="font-weight-bolder">Categories</h2>
        </div>
        <domain-display-component
                v-bind:domains="{{ $domains }}"
                v-bind:categories="{{ $categories }}"
                v-bind:subcategories="{{ $subcategories }}"/>
    </div>


@stop
