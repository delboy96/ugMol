<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    private $data = [];

    public function index()
    {
        $model = new Post();
        $this->data['posts'] = $model->all();

        return view('pages.index', $this->data);
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

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function create()
//    {
//        return view('form');
//    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
//     */
//    public function store(Request $request)
//    {
//        //
//        $model = new Post();
//
//        $title= $request['title'];
//        $subtitle= $request['subtitle'];
//        $body= $request['body'];
//
//        $model->create($title, $subtitle, $body);
//
//        return \redirect("/");
////        dd(request()->all());
//
//    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
