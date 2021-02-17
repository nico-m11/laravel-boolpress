<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PostModel;
use App\CategorieModel;
use App\PostInformationModel;
use App\TagModel;
use App\TagPostModel;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Pagination\Paginator;
use Dontev\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PostModel::all();
        $tag = TagModel::all();
        $page = PostModel::paginate(10);
        return view('home', compact('data', 'page', 'tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = TagModel::all();
        $category = CategorieModel::all();

        return view('create', compact('tag', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'inputPostTitle'=>'required | min:3',
            'inputPostAuthor'=>'required',
            'inputPostCategory'=> 'required',
            'inputPostDesc'=>'required',
            'user_id' => 'required',
            'inputPostTag'=>'required',
            'inputImage'=>'mimetypes:image/jpeg,image/png|max:1024',
        ]);

        $creaPost = new PostModel();
        $creaPost->title = $request->input('inputPostTitle');
        $creaPost->author = $request->input("inputPostAuthor");
        $creaPost->image = $request->input('image');
        $creaPost->user_id = id();
        $creaPost->category_id = $request->input("inputPostCategory");
        $creaPost->save();  

        $creaPostInf = new PostInformationModel();
        $creaPostInf->post_id = $creaPost->id;
        $creaPostInf->description = $request->input("inputPostDesc");
        $creaPostInf->slug = Str::slug($creaPost->title);
        $creaPostInf->save();
        
        
        $creaPost->tag();
        return view('succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data = PostModel::find($id);
       return view('detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PostModel::find($id);
        $categories = CategorieModel::all();
        $tags = TagModel::all();
        return view('edit', compact('data', 'categories', 'tags'));
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
        $validated = $request->validate([
            'inputPostTitle'=>'required | min:3',
            'inputPostAuthor'=>'required',
            'inputPostCategory'=> 'required',
            'inputPostDesc'=>'required',
            'user_id' => 'required',
            'inputPostTag'=>'required',
            'inputImage'=>'mimetypes:image/jpeg,image/png|max:1024',
        ]);
        
        $updatePost = PostModel::find($id);
        $updatePost->title = $request['inputPostTitle'];
        $updatePost->author = $request["inputPostAuthor"];
        $updatePost->category_id = $request["inputPostCategory"];
        $creaPost->image = $request['image'];
        $updatePost->save();

        
        $updatePostInformation = PostInformationModel::where('post_id', $updatePost->id)->first();
        $updatePostInformation->description = $request["inputPostDesc"];
        $updatePostInformation->slug = "prova-slug";
        $updatePostInformation->save();

        $updatePost->tag()->sync($request['inputPostTag']);

        //$tags = $request["inputPostTag"];
        //foreach ($tags as $tag) {
            //$updatePost->tag()->attach($tag);
        //}

        $data = PostModel::find($updatePost->id);
        return view('detail', compact('data'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elimina = PostModel::find($id);

        $elimina->postInformation()->delete();

        $tags = $elimina->tag;
        foreach($tags as $tag){
            $elimina->tag()->detach($tag->id);
        }

        $elimina->delete();

        return redirect()->back();
    }

    public function logged() {
        $utente = Auth::user();
        $message = 'Ciao' . ' ' . $utente->name;
        return view('benvenuto', compact('message'));
    }

    public function guest() {
        $message = 'Ciao Utente!';
        return view('benvenuto', compact('message'));
    }

}


   