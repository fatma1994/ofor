<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Note;
use Auth;

class Notecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $note=note::All();
        $note=\App\Note::orderBy('created_at','Desc')->get();
        return view('notes.index',compact('note'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eleve=\App\Eleve::pluck('matricule','id');
         $matiere=\App\Matiere::pluck('libelle','id');
         return view('notes.create',compact('eleve','matiere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data=$request->validate([
         'note'=>'required',
         'eleve_id'=>'required',
         'matiere_id'=>'required',
            ]);


        $note=new note();
         $note->note=$request->input('note');
         $note->eleve_id=$request->input('eleve_id');
        $note->matiere_id=$request->input('matiere_id');
        //eleves::create(['name'=>$elev]);
          $note->save();
          //return 'bien registrer';
          return redirect('/note');
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
         if(Auth::user()){
            if(Auth::user()->role === 'admin'){
                 $note=Note::find($id);
                $eleve=\App\Eleve::pluck('matricule','id');
                 $matiere=\App\Matiere::pluck('libelle','id');
               if($note){
                    return view('notes.edit',compact('note','eleve','matiere'));
                }
           }else{
                return redirect('/home');
            }
        }

        return redirect('/note');


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
        
        $note=\App\Note::find($id);
         if($note){
            $note->update([
        'note'=>$request->input('note'),
            'eleve_id'=>$request->input('eleve_id'),
             'matiere_id'=>$request->input('matiere_id'),
            ]);
         }
         return redirect('/note');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $note=Note::find($id);
        if($note)
            $note->delete();
        //return redirect()->route('inscriptions.index');
           return redirect('/note');
    }
}
