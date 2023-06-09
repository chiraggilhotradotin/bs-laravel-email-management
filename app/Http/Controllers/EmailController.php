<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', ['emails'=>Email::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:emails'
        ]);
        $email = new Email();
        $email->name = $request->name;
        $email->email = $request->email;
        $email->save();
        return redirect(route('emails.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $email = Email::findOrFail($id);
        return view("edit",['email'=>$email]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required|max:255|email|unique:emails,email,$id"
        ]);
        $email = Email::findOrFail($id);
        $email->name = $request->name;
        $email->email = $request->email;
        $email->save();
        return redirect()->route("emails.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Email::find($id)->delete();
        return redirect(route('emails.index'));
    }
}
