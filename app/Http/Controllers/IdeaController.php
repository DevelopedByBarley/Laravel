<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);


        $validated["user_id"] = auth()->user()->id;

        Idea::create($validated);



        return redirect('/')->with('success', 'Idea created successfully!');
    }

    public function show(Idea $idea)
    {
        /*  return view('ideas.show', [
            'idea' => $idea
        ]); */

        return view('ideas.show', compact('idea'));
    }








    public function destroy(Idea $idea)
    {
        if (auth()->user()->id !== $idea->user_id) abort(404);

        $idea->delete();
        return redirect('/')->with('success', 'Idea deleted successfully!');
    }





    /*

    public function destroy( $id) {
        $idea = Idea::where('id', $id)->firstOrFail(); // A first() mint fetch(), a get() mint fetchAll(). firstOfFail() pedig 404-re irányit ha sikertelen a keresés!!

        $idea->delete();
        return redirect('/')->with('success', 'Idea deleted successfully!');
    }
    */


    public function edit(Idea $idea)
    {
        if(auth()->user()->id !== $idea->user_id) abort(404);
        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        if (auth()->user()->id !== $idea->user_id) abort(404);

        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        /* $idea->content = request()->get('content');
        $idea->save(); */

        $idea->update($validated);

        return redirect()->route('idea.show', $idea->id)->with("success", "Idea updated successfully!");
    }
}
