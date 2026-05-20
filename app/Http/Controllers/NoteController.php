<?php
namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();

    }

    // public function store(Request $request)
    // {
    //     return $request->create($request->all());
    // }

    // post create a note
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'remarks' => 'nullable'
        ]);

        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'remarks' => $request->remarks
        ]);
        return response()->json($note, 201);
    }

    // show one note
    public function show($id)
    {
        // return Note::findorFail($id);
        $note = Note::find($id);
        if (!$note) {
            return response()->json([
                "status_code" => 404,
                "massage" => "not found!"
            ], 404);
        }

        return response()->json($note);
    }

    // put update a note 
    public function update(Request $request, $id = null)
    {
        // $note = Note::findorFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'remarks' => 'nullable'
        ]);

        $note = Note::find($id);
        if (!$note) {
            return response()->json([
                "status_code" => 404,
                "massage" => "not found!"
            ], 404);
        }

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'remarks' => $request->remarks
        ]);

        return response()->json($note);
    }

    public function destroy($id)
    {
        $note = Note::destroy($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        return response()->json(['message' => 'Note deleted successfully']);
    }


}