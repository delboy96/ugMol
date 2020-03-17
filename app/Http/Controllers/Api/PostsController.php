<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;



class PostsController extends Controller
{
    /**
     * Display a listing of the recourse.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $Model = new Post();

        return \response()->json($Model->all(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $model = new Post();
        $post = $model->find($id);

        if ($post === null) {
            return \response()->json(['message' => 'No post found.'], \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND);
        }
        return \response()->json('$post', \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param CreatePostRequest $request
//     * @return JsonResponse
//     */
//    public function store(CreatePostRequest $request): JsonResponse
//    {
//        $model = new Post();
//        $data = $request->validated();
//        if ($model->create($data)) {
//            return \response()->json(['message' => 'Successfully inserted'], 201);
//        } else {
//            return \response()->json(['message' => 'Not inserted'], 409);
//        }
//    }



//    /**
//     * Update the specified resource in storage.
//     *
//     * @param Request $request
//     * @param int $id
//     * @return Response
//     */
//    public function update(UpdatePostRequest $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param int $id
//     * @return Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
