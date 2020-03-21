<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

//        $users->links('pages.index');

        return view('pages.index', $this->data);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $model = new Post();
        if($search != null){
            $post = $model->where($search);
            if (count ( $post ) > 0)
                return view ( 'pages.search' )->withDetails  ( $post )->withQuery  ( $search );
            else
                return view ( 'pages.search' )->withMessage  ( 'No Posts found. Try to search again !' );
        }
        return redirect(route('index'));
    }

    /**
     * @return View
     */
    public function contactForm() : View
    {
        return view('pages.contact');
    }

    /**
     * @return Factory|View
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * @return Factory|View
     */
    public function loginForm()
    {
        return view('pages.loginForm');
    }

    /**
     * @return Factory|View
     */
    public function registerForm()
    {
        return view('pages.regForm');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
