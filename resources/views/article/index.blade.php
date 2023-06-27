<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Article List | Laravel Demo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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

                        @if (session('title'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <span> Article "{{ session('title') }}" has been added !! </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('msg'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <span> {{ session('msg') }} </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div>
                            <div class="mt-5 d-flex justify-content-between align-items-center">
                                <h2 class="h2"> My Articles </h2>
                                <a class="btn btn-outline-success" href="{{ Route('article.create') }}">Add Article</a>
                            </div>
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <th> Sr.no. </th>
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th> Image </th>
                                    <th> Operations </th>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $key => $article)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $article['title'] }} </td>
                                            <td> {{ $article['description'] }} </td>
                                            <td><img src="{{ base_path() }}/storage/app/public/images/articles/images/{{ $article['image'] }}" style="height:100px;width:100px;">  </td>
                                            <td class="d-flex">
                                                <a href="{{ route('article.edit', $article->id) }}"
                                                    class="mr-md-3 btn btn-outline-info"> Update </a>
                                                <form method="post"
                                                    action="{{ route('article.destroy', $article->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
