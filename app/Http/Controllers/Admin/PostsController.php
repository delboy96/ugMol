<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Models\Article;
use App\Models\Post;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PostsController extends Controller
{

    private $data = [];

    public function index()
    {
        $post = new Post();
        $this->data['posts'] = $post->all();

        return view('admin.posts', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function show($id)
    {
        $post = new Post();
        $article = new Article();
        $this->data['post'] = $post->find($id);
        $this->data['articles'] = $article->allArticles();
        $this->data['news'] = $article->allNews();

        return view('pages.single', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.components.Posts.insertForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateRequest $request)
    {
        $post = new Post();

        if ($request->hasFile('img')) {
            // Upload slike
            $file = $request->file('img');
            $directory = public_path("assets/img/posts/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);
            $post->img = "assets/img/posts/" . $fileName;
        }

        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->body = $request->input('body');
        $post->citat = $request->input('citat');
        $post->datum = $request->input('datum');
        try {
            if ($post->create()) {
                return redirect(route("posts.index"))->with("message", "Uspešno dodat događaj!");
            } else {
                return redirect()->back()->with("error", "Desila se greška, događaj nije dodat.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Desila se greška, pokušajte ponovo.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = new Post();
        $this->data['post'] = $post->find($id);

        return view('admin.components.Posts.updateForm', $this->data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function delete($id)
    {
        $post = new Post();
        $this->data['post'] = $post->find($id);

        return view('admin.components.Posts.deleteForm', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateRequest $request, $id)
    {
        $post = new Post();

        if ($request->hasFile('img')) {
            // Upload slike
            $file = $request->file('img');
            $directory = public_path("assets/img/posts/");
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);
            $post->img = "assets/img/posts/" . $fileName;
        }

        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->body = $request->input('body');
        $post->citat = $request->input('citat');
        $post->datum = $request->input('datum');
        try {
            $post->update($id);

            return redirect(route("posts.index"))->with("message", "Uspešno izmenjen događaj!");
//            return redirect()->back()->with("Uspeh!", "Uspešno izmenjen događaj!");
        } catch (QueryException $e) {
//            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Desila se greška, događaj nije izmenjen.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $post = new Post();
            if ($post->delete($id)) {
                return redirect(route("posts.index"))->with("message", "Uspešno ste obrisali događaj!");
            } else {
                return redirect()->back()->with("error", "Došlo je do greške, događaj nije obrisan.");
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Došlo je do greške, pokušajte ponovo.");
        }
    }
}
