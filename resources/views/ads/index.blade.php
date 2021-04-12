@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Ads</h1>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('admin.ads.create')}}" class="btn btn-sm btn-outline-secondary">
                <span data-feather="calendar"></span>
                Create New Ad
            </a>
        </div>
    </div>

    @forelse ($ads as $ad)
        <div class="row">
            <div class="card col-sm-12 col-md-6">
                <img src="{{$ad->image->getUrl()}}" class="card-img-top" alt="{{$ad->title}} Image">
                <div class="card-body">
                    <h5 class="card-title">{{$ad->title}}</h5>
                    <p class="card-text">{{$ad->desc}}</p>
                </div>
                <div class="card-body">
                    <a href="#" class="card-link">Edit </a>
                    <a href="#" class="card-link">Delete</a>
                </div>
            </div>
        </div>
    @empty
        <h2>no ads</h2>
    @endforelse
@endsection