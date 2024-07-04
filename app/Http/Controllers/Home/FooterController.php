<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    //
    public function FooterSetup(){
        $footerData =  Footer::find(1);
        return view('admin.footer.all_footer',[
            'footerData' => $footerData
        ]);
    }
    public function UpdateFooter(Request $request){
        $id = $request->id;

        Footer::findOrFail($id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright
        ]);
        $notification = array(
           'message' => 'Footer Updated Successfully',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);

    }
}
