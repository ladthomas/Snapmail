<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Mail\MessageNotification;

class MessageController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
            'photo' => 'nullable|image',
        ]);

        $token = Str::random(10);
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        DB::table('messages')->insert([
            'message' => $request->input('message'),
            'photo' => $photoPath,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Mail::to($request->input('email'))->send(new MessageNotification($token, $photoPath));

        return redirect('/')->with('status', 'Message envoyé avec succès!');
    }

    public function show($token)
{
    $message = DB::table('messages')->where('token', $token)->first();

    if ($message) {
        $photoPath = $message->photo;

        // on supp le token de la bdd apres visualiation du snap mail 
        DB::table('messages')->where('token', $token)->delete();

        return view('show', compact('message', 'photoPath'));
    } else {
        abort(404, 'Le message n\'existe pas ou a déjà été supprimé.');
    }
}


}
