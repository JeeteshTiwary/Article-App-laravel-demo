@extends('article.article')
@section('content')

    <div>
        <div class="mt-5 d-flex justify-content-between align-items-center">
            <h2 class="h2"> My Articles </h2>
            <a class="btn btn-outline-success" href="{{ Route('article.create') }}">Add Article</a>
        </div>
        @if ($articles[0])
            <form action="{{ route('article.index') }}" method="GET">
                <div class="m-2 form-row align-items-center justify-content-end">
                    <div class="col-auto">
                        <input type="text" name="search" placeholder="Search..." value="{{ $search }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </div>
            </form>

            <table class="table table-striped table-responsive{-sm|-md|-lg|-xl}">
                <thead class="table-dark">
                    <th> Sr.no. </th>
                    <th>
                        Title
                        <a href="{{ route('article.index', ['sort' => 'asc', 'search' => $search]) }}">
                            &#8593;</a>
                        <a href="{{ route('article.index', ['sort' => 'desc', 'search' => $search]) }}">
                            &#8595;</a>
                    </th>
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
                            <td><img src="{{ asset('articles/images/' . $article->image) }}" alt="Image"
                                    style="height:100px;width:100px;"> </td>
                            <td class="d-flex">
                                <a href="{{ route('article.edit', $article->id) }}" class="mr-md-3 btn btn-outline-info">
                                    Update </a>
                                <form method="post" action="{{ route('article.destroy', $article->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            No articles found!
        @endif
    </div>
    <div>
        {{ $articles->links() }}
    </div>
@endsection
