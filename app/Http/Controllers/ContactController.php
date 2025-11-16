<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $contact = Contact::create($request->all());
        return redirect()->route('contact.index')->with('success', 'Contact created successfully');
    }
}
