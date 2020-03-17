<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontEndController extends Controller
{
    private $data=[];
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $postModel = new Post();
        $articleModel = new Article();
        $this->data['posts'] = $postModel->all();
        $this->data['slider'] = $postModel->latest();
        $this->data['articles'] = $articleModel->allArticles();
        $this->data['news'] = $articleModel->allNews();

        return view('pages.index', $this->data);
    }

    /**
     * @return View
     */
    public function contactForm() : View
    {
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function loginForm()
    {
        return view('pages.loginForm');
    }

    public function registerForm()
    {
        return view('pages.regForm');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
