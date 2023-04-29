<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function create()
    {
        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $name = $req->post('name');
        $category = $req->post('category');
        $description = $req->post('description');
        //dealing files here
        $file = $req->file('video');
        $filename = $file->getClientOriginalName();
        $file->move('videos',$filename);
        $filepath = "videos/".$filename;

        //thumbnail
        $file = $req->file('thumbnail');
        $filename = $file->getClientOriginalName();
        $file->move('videos',$filename);
        $filepathimg = "videos/".$filename;

        //insertion
        $f = new movies();
        $f->name = $name;
        $f->video = $filepath;
        $f->thumbnail = $filepathimg;
        $f->category = $category;
        $f->description = $description;
        $f->uid = auth()->id();
        $f->save();
        $data = movies::all();
        //echo $data;
        return view('movie',['data'=>$data]);  
    }
    public function show()
    {
        $data = movies::all();
        //echo $data;
        return view('movie',['data'=>$data]);     
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(movies $movies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, movies $movies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //$data = movies::find($id);
        movies::find($id)->delete();
        $idd = auth()->id();
        $data = movies::where('uid',$idd)->get();
        return view('mymovies',['data'=>$data]);  
        //
    }
    public function showspecific()
    {
        //$data = movies::find($id);
        $id = auth()->id();
        $data = movies::where('uid',$id)->get();
        return view('mymovies',['data'=>$data]);  
        //
    }
    public function watch($id)
    {
        $data = movies::find($id);
        $d = $this->getmov($data->category);

        movies::where('id', $id)->update([
       'views' => movies::raw('views + 1'),
       ]);



        //$data->views= ($data->views +1);
        //$data = movies::get()->where('category', $category);
        return view('watch',['data'=>$data,'dd'=>$d]);

    }
    public function getmov($category)
    {
        $data = movies::get()->where('category', $category);
        return $data;
        //
    }
}
