<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting; // Gantilah YourModel dengan nama model yang sesuai

class EditorController extends Controller
{
    public function store(Request $request){
        // Validasi formulir jika diperlukan
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Simpan data ke dalam database
        $posting = new Posting(); // Gantilah YourModel dengan nama model yang sesuai
        $posting->title = $validatedData['title'];
        $posting->description = $validatedData['description'];
        $posting->save();

        // Redirect atau lakukan sesuatu setelah penyimpanan
        return redirect()->route('upload')->with('success', 'Post berhasil disimpan!');
    }

    public function uploadImage (Request $request){
        if ($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
}
