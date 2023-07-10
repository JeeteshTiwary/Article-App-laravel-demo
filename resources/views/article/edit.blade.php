<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Update Article | Laravel Demo</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="container">
                            <div class="">
                                <h1 class="display-4 mx-3">Update Article</h1>
                                <hr>
                                <form name="" action="{{ route('article.update', ['article' => $article]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mt-3 form-group col-md-6">
                                        <label for="title" class="font-weight-bold">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $article['title'] }}" required>
                                        <span class="text-danger"> {{ $errors->first('title') }} </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description" class="font-weight-bold">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ $article['description'] }}" required>
                                        <span class="text-danger"> {{ $errors->first('description') }} </span>
                                    </div>
                                    <div class="form-group col-md-6 d-flex justify content-align-center">
                                        <label for="image" class="font-weight-bold">Featured Image</label> <br />
                                        <input type="file" id="image" name="image" required>
                                        <span class="text-danger"> {{ $errors->first('image') }} </span>
                                        <span> Previous image: <img src="{{ asset('articles/images/' . $article->image) }}" alt="Image" style="height:100px;width:100px;"> </span>
                                    </div>
                                    <div class="form-group form-check mx-3">
                                        <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox"
                                            value="1" checked>
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        <span class="text-danger"> {{ $errors->first('checkbox') }} </span>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-primary mx-3">Update</button>
                                        <a class="btn btn-outline-danger" href="/article"> Back </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
