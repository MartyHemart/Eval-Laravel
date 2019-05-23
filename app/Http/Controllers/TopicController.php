<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

class TopicController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('create','store','edit','update','destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $topics = Topic::orderBy('id', 'desc')->get();
       return view('index', ['topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $topic = New Topic;
    $topic->titre = $request->input('titre');
    $topic->message = $request->input('message');
    $topic->save();
    return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {

      $topic = Topic::findOrFail($topic);
      return view('show', ['topic'=>$topic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
      $topic = Topic::findOrFail($topic->id);
      return view('edit', ['topic'=>$topic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Topic $topic)
    {
      $topic->titre = $request->input('titre');
      $topic->message = $request->input('message');
      $topic->save();
      return redirect()->route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
       $topic->delete();
       return redirect('/');
    }

    public function Search(){
     $search = \Request::get('search');
     $results = Topic::where('titre', 'like', '%'.$search.'%')
                 ->orderBy('titre')
                 ->paginate(20);

  return view('search', ['results'=>$results]);
}
}
