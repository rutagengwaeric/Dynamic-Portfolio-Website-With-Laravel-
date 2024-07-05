<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function Contact(){
        return view('frontend.contact');
    }

    public function StoreContact(Request $request){

        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',
           'subject' =>'required',
           'message' =>'required',
        ]);
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
           'subject' => $request->subject,
           'message' => $request->message,
           'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Message Sent Successfully',
             'alert'  =>'success'
        );
        return redirect()->back()->with($notification);
        // End Method
}

public function ContactMessages(){

    $contact = Contact::latest()->get();
    return view('admin.contact.all_message',[
        'contact' => $contact
    ]);
}

public function DeleteContact($id){

    $contact = Contact::findOrFail($id);
    $contact->delete();
    $notification = array(
        'message' => 'Contact Message Deleted Successfully',
         'alert'  =>'success'
    );
    return redirect()->back()->with($notification);
}



}
