<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->mobile = $request->mobile;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return $contact;
    }
}
