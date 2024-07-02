<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Intervention\Image\Laravel\Facades\Image;

class AboutController extends Controller
{
    public function AboutPage(){
        $aboutData = About::find(1);
        return view('admin.about_page.about_page',[
            'aboutData' => $aboutData
        ]);
    }


    public function UpdateAbout(Request $request){
        // Get the about ID from the request
        $about_id = $request->id;

        if($request->file('about_image')){
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::read($image)->resize(523,605)->save('upload/home_about/'.$name_gen);

            $save_url = 'upload/home_about/'.$name_gen ;
            About::findOrFail($about_id)->update([
                 'title' => $request->title,
                 'short_title' => $request->short_title,
                 'short_description' => $request->short_description,
                 'long_description' => $request->long_description,
                 'about_image' => $save_url,

            ]);

            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                 'alert-type'  => 'success'
            );
            return redirect()->back()->with($notification);


        }else{

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
           ]);

           $notification = array(
               'message' => 'About Page Updated with Image Successfully',
                'alert-type'  => 'success'
           );
           return redirect()->back()->with($notification);

        }
        // End Else
    }
    // End Method


    public function HomeAbout(){
        $aboutData = About::find(1);
        return view('frontend.about_page',[
            'about_page' => $aboutData
        ]);
    }
    // End Method

    public function AboutMultiImage(){
        return view('admin.about_page.multi_image');
    }
    // End Method

    public function StoreMultiImage(Request $request){

        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::read($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen ;
            MultiImage::Insert([
                 'multi_image' => $save_url,
                 'created_at' => Carbon::now(),

            ]);

        }
        // End of For Each Loop

            $notification = array(
                'message' => 'Multi Inserted Image Successfully',
                 'alert'  => 'warning'
            );
            return redirect()->back()->with($notification);




    }
    // End Method


    public function AllMultiImage(){

        $multiImages = MultiImage::latest()->get();
        return view('admin.about_page.all_multi_image',[
            'multiImages' => $multiImages
        ]);

    }
    // End Method

        public function EditMultiImage($id){


            $multiImage = MultiImage::findOrFail($id);
            return view('admin.about_page.edit_multi_image',[
                'multiImage' => $multiImage
            ]);

        }
    // End Method

        public function UpdateMultiImage(Request $request){

            $id = $request->id;
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::read($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen ;
            MultiImage::findOrFail($id)->update([
                'multi_image' => $save_url,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Multi Image Updated Successfully',
                 'alert-type'  => 'success'
            );
            return redirect()->route('all.multi.image')->with($notification);
        }
        // End method

        public function DeleteMultiImage($id){

            $multi = MultiImage::findOrFail($id);
            $img = $multi->multi_image;
            unlink($img);
            MultiImage::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Multi Image Deleted Successfully',
                 'alert-type'  => 'success'
            );
            return redirect()->back()->with($notification);



        }

}
