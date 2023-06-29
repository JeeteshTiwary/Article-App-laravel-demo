<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\models\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Article::paginate(5);
        return view('article.index', ['articles' => $data]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|between:3,191',
            'description' => 'required|max:255',
            'image' => 'required',
            //|image',
            'checkbox' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/articles/images';
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
        $data = Article::find($id);
        return view('article.edit', ['articles' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Article::find($id);
        return view('article.edit', ['article' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|between:3,191',
            'description' => 'required|min:20',
            'image' => 'required',//|image',
            'checkbox' => 'required',
        ]);

        $article = Article::find($article->id);
        $imageToDelete = public_path('articles/images/').$article->image;
        // dd($imageToDelete);
        dd($request);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = public_path().'/articles/images';
            dd($path);
            $uplaod = $file->move($path, $fileName);
            dd($fileName);
        }

        $article->title = $request->title;
        $article->description = $request->description;
        // $article->image = $fileName;
        $article->save();

        if (file_exists($imageToDelete)) {
            // unlink($imageToDelete);
            dd('file found');
        }

        session()->flash("msg", "Record has been updated!!");
        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $imageToDalete = public_path() . '/articles/images/' . $article->image;
        if (file_exists($imageToDalete)) {
            unlink($imageToDalete);
        }
        $delete = $article->delete();
        session()->flash("msg", "Record has been deleted!!");
        return redirect('article');
    }
}