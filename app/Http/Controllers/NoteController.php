<?php
namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        // $notes = Note::all(); not all note 
        $notes = NOte::where('user_fk_id', auth()->id())->get(); // get only her note
        
        
        // return view('index', compact('notes'));

          if ($request->is('api/*')) { // chekc is call by api route or web route
            return response()->json($notes); // api route
        }

        return view('index', compact('notes'));

    }

    //  create note page for web
    public function create()
    {
        
        // return view('notes.create');
        return view('create');
    }

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
            'remarks' => $request->remarks,
            'user_fk_id' => auth()->id(), // Assuming you have authentication set up
        ]);
        // return response()->json($note, 201);

        if ($request->is('api/*')) { // chekc is call by api route or web route
           return response()->json($note, 201); // api route
        }

        // return view('index', compact('notes.create'));
        return view('create',compact('note'));
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
    //     if ($note->user_fk_id !== auth()->id()) {
    //     abort(403); // Forbidden
    // }

        if (!$note) {
            return response()->json([
                "status_code" => 404,
                "massage" => "not found!"
            ], 404);
        }

        if($note->user_fk_id !== auth()->id()) {
            return response()->json([
                "status_code" => 403,
                "message" => "Forbidden: You do not have permission to update this note."
            ], 403);
        }
      

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'remarks' => $request->remarks
        ]);

        return response()->json($note);
    }

    public function destroy(Request $request, $id)
    {
        $note = Note::destroy($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        if($note->user_fk_id !== auth()->id()) {
            return response()->json([
                "status_code" => 403,
                "message" => "Forbidden: You do not have permission to delete this note."
            ], 403);
        }
        
        
          if ($request->is('api/*')) { // chekc is call by api route or web route
            return response()->json(['message' => 'Note deleted successfully']);
            }

        //  return redirect()->route('index')
         return redirect()->route('notes')
                     ->with('success', 'Note deleted successfully.');
    }


}