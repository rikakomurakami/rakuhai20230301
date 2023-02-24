<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function show()
    {
        // $role = Auth::user()->role;
        return view('contact');
    }

    public function confirm(Request $request)
    {
        // $role = Auth::user()->role;
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->message = $validatedData['message'];
        $contact->save();

        return view('contact_confirm', compact('validatedData'));
    }

    public function complete(Request $request)
    {
        // $role = Auth::user()->role;
        // ここでメール送信などの処理

        return view('contact_complete');
    }
    
}
