@extends('article.article')
@section('content')
    <div class="container">
        <div class="">
            <div class="mt-5 d-flex justify-content-between align-items-center col-md-6">
                <h2 class="h2"> Add Article </h2>
                <a class="btn btn-outline-warning" href="{{ Route('article.index') }}">Back</a>
            </div>
            <hr>
            <form name="" action="{{ Route('article.store') }}" method="post" enctype="multipart/form-data">
                {{ method_field('POST') }}
                @csrf
                <div class="form-group col-md-6">
                    <label for="title" class="font-weight-bold">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        placeholder="your article title here..">
                    <span class="text-danger"> {{ $errors->first('title') }} </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="description" class="font-weight-bold">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ old('description') }}" placeholder="your article description here..">
                    <span class="text-danger"> {{ $errors->first('description') }} </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="image" class="font-weight-bold">Featured Image</label> <br />
                    <input type="file" id="image" name="image" value="{{ old('image') }}">
                    <span class="text-danger"> {{ $errors->first('image') }} </span>
                </div>
                <div class="form-group form-check mx-3">
                    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" value="1" checked
                        required>
                    <label class="form-check-label" for="checkbox">Check me out</label>
                    <span class="text-danger"> {{ $errors->first('checkbox') }} </span>
                </div>
                <div class="d-flex justify-content-between align-items-center col-md-6">
                    <button type="submit" class="btn btn-outline-primary mx-3">Add Article</button>
                    <input type="reset" value="Reset Form" class="btn btn-outline-danger" />
                </div>
            </form>
        </div>
    </div>
@endsection
