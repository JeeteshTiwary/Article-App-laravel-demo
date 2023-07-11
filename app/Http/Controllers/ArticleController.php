<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\models\Article;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort', 'asc');
        $query = Article::query();
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        $query->orderBy('title', $sort);

        $articles = $query->paginate(5);

        return view('article.index', compact('articles', 'search', 'sort'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = public_path('articles/images');
            $uplaod = $file->move($path, $fileName);
        }

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->image = $fileName;
        $article->save();
        $request->session()->flash("title", $article->title);
        return redirect('article');
        // return redirect()->back()->with('success', 'Article has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Article::findOrfail($id);
        return view('article.edit', ['articles' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Article::findOrfail($id);
        return view('article.edit', ['article' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, Article $article): RedirectResponse
    {
        $validated = $request->validated();

        $article->title = $request->input('title');
        $article->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = public_path('articles/images/');
            $file->move($path, $fileName);

            if ($article->image && file_exists($path . '/' . $article->image)) {
                unlink($path . '/' . $article->image);
            }

            $article->image = $fileName;
        }

        $article->save();

        session()->flash("msg", "Record has been updated!!");
        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrfail($id);
        $path = public_path('articles/images/');
        if (file_exists(file_exists($path . '/' . $article->image))) {
            unlink($path . '/' . $article->image);
        }
        $delete = $article->delete();
        if ($delete) {
            session()->flash("msg", "Record has been deleted!!");
            return redirect('article');
        }
    }
}