<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(News::query()->paginate(20), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'content' => 'required',
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        $newsPost = News::create($request->all());
        return response($newsPost, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\News $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsPost = News::find($id);
        if (is_null($newsPost)) {
            return response()->json(['message' => 'news post not found'], 404);
        }

        return response()->json($newsPost::find($id), 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\News $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newsPost = News::find($id);
        if (is_null($newsPost)) {
            return response()->json(['message' => 'news post not found'], 404);
        }

        $newsPost = $newsPost->update($request->all());

        return response()->json($newsPost, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\News $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsPost = News::find($id);

        if (is_null($newsPost)) {
            return response()->json(['message' => 'news post not found'], 404);
        }

        $delete = $newsPost->delete();

        return response()->json($delete, 204);
    }
}
