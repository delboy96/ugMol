<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PostsController extends Controller
{

    private $data=[];

    public function index()
    {
        $model = new Post();
        $this->data['posts'] = $model->all();

        return view('admin.posts', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $postModel = new Post();
        $articleModel = new Article();
        $this->data['post'] = $postModel->find($id);
        $this->data['articles'] = $articleModel->allArticles();
        $this->data['news'] = $articleModel->allNews();

        return view('pages.single', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.components.Posts.insertForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        //
        $model = new Post();

        $title= $request['title'];
        $subtitle= $request['subtitle'];
        $body= $request['body'];
        $citat= $request['citat'];
        $datum=$request['datum'];
        $img_path= $request['img_path'];

        try {
            $model->create($title, $subtitle, $body, $citat, $datum, $img_path);

            return redirect(route("posts.index"))->with("Uspeh!", "Uspešno dodat događaj!");
        } catch (QueryException $e) {
//            Log::error($e->getMessage());
            return redirect()->back()->with("Greška.", "Desila se greška, pokušajte ponovo.");
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
        $model = new Post();
        $this->data['post'] = $model->find($id);

        return view('admin.components.Posts.updateForm', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $model = new Post();
        $model->title = $request->input('title');
        $model->subtitle = $request->input('subtitle');
        $model->body = $request->input('body');
        $model->citat = $request->input('citat');
        $model->datum = $request->input('datum');
        $model->img_path = $request->input('img_path');
        try {
            $model->update($id);

            return redirect()->back()->with("Uspeh!", "Uspešno izmenjen događaj!");
        } catch (QueryException $e) {
//            Log::error($e->getMessage());
            return redirect()->back()->with("Greška.", "Desila se greška, pokušajte ponovo.");
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
            $model = new Post();
            $model->delete($id);
            return redirect()->back()->with("Uspeh!", "Uspešno ste obrisali događaj!");
        } catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with("Greška.", "Došlo je do greške, pokušajte ponovo.");
        }
    }
}
