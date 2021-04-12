@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Ad</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-7">
            <form action="{{route('admin.ads.store')}}" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="mb-3">
                    <label for="holder_id" class="form-label text-capitalize">Ad Holder</label>
                    <select name="holder_id" id="holder_id" class="form-select @error('holder_id') is-invalid @enderror">
                        <option selected>Please Select The Ad Holder</option>
                        @forelse ($holders as $holder)
                            <option value="{{$holder->id}}">{{$holder->title}}</option>
                        @empty
                            <option>please contact system admin about this field !</option>
                        @endforelse
                    </select>
                    @error('holder_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label text-capitalize">Title</label>
                    <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Ad title" value="{{old('title')}}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label text-capitalize">Description</label>
                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="3" placeholder="Enter Ad Description">{{old('desc')}}</textarea>
                    @error('desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_from" class="form-label text-capitalize">Date From</label>
                    <input name="date_from" id="date_from" type="date" class="form-control @error('date_from') is-invalid @enderror" value="{{old('date_from')}}">
                    @error('date_from')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_to" class="form-label text-capitalize">Date To</label>
                    <input name="date_to" id="date_to" type="date" class="form-control @error('date_to') is-invalid @enderror" value="{{old('date_to')}}">
                    @error('date_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label text-capitalize">duration</label>
                    <input name="duration" id="duration" type="number" min="1" class="form-control @error('duration') is-invalid @enderror" value="{{old('duration')}}">
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="frequency" class="form-label text-capitalize">frequency</label>
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <input name="frequency" id="frequency" type="number" min="1" class="col-sm-12 col-md-10 form-control @error('frequency') is-invalid @enderror" value="{{old('frequency')}}">
                            @error('frequency')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <select class="form-select @error('frequency_type') is-invalid @enderror" name="frequency_type" id="frequency_type">
                                <option value="m" selected>Minutes</option>
                                <option value="h">Hours</option>
                            </select>
                            @error('frequency_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-capitalize">image</label>
                    <input name="image" id="image" type="file" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>

@endsection