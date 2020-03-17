<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticlesController extends Controller
{

    private $data = [];

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function showArticle($id)
    {
        $articleModel = new Article();
        $this->data['article'] = $articleModel->showArticle($id);
        $this->data['articles'] = $articleModel->allArticles();
        $this->data['news'] = $articleModel->allNews();

        return view('pages.article', $this->data);
    }

    public function showNews($id)
    {
        $articleModel = new Article();
        $this->data['n'] = $articleModel->showNews($id);
        $this->data['articles'] = $articleModel->allArticles();
        $this->data['news'] = $articleModel->allNews();

        return view('pages.news', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


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
