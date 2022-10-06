<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticelRequset;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AricleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticlesResource::collection(Article::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticelRequset $request)
    {
        $data = [];
        if ($request->hasFile('image')) {
            $dPath = 'acticle/';
            $img   = $request->file('image');
            $fName = $img->getClientOriginalName();
            $request->file('image')->storeAs($dPath, $fName);
            $path  = $dPath . '' . $fName;
            Storage::disk('public')->put($path, file_get_contents($request->file('image')));

            $image = $path;
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'image' => $image
        ];
        Article::create($data);

        return response()->json([
            'code' => 201,
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Article::find($id);
        return ArticleResource::collection(Article::where('id', $id)->get());
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
