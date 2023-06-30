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
    <div class="container">
        <div class="">
            <h1 class="display-4 mx-3">Update Article</h1>
            <hr>
            <form name="" action="{{ route('article.update', ['article' => $article]) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group col-md-6">
                    <label for="title" class="font-weight-bold">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $article['title'] }}" required>
                    <span class="text-danger"> {{ $errors->first('title') }} </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="description" class="font-weight-bold">description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ $article['description'] }}" required>
                    <span class="text-danger"> {{ $errors->first('description') }} </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="image" class="font-weight-bold">Featured Image</label> <br />
                    <input type="file" id="image" name="image" value="{{ $article['image'] }}" required>
                    <span class="text-danger"> {{ $errors->first('image') }} </span>
                </div>
                <div class="form-group form-check mx-3">
                    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" value="1" checked>
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
</body>

</html>
