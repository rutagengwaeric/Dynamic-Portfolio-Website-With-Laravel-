<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSide;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;

class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
        $homeslider = HomeSide::find(1);
        return view('admin.home_slide.home_slide_all', [
            'homeslide' => $homeslider
        ]);
    }
    public function UpdateSlider(Request $request){

        $slide_id = $request->id;

        if($request->file('home_slide')){
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::read($image)->resize(636,832)->save('upload/home_slide/'.$name_gen);

            $save_url = 'upload/home_slide/'.$name_gen ;
            HomeSide::findOrFail($slide_id)->update([
                 'title' => $request->title,
                 'short_title' => $request->short_title,
                 'video_url' => $request->video_url,
                 'home_slide' => $save_url
            ]);

            $notification = array(
                'message' => 'Home Slide Updated with Image Successfully',
                 'alert'  => 'success'
            );
            return redirect()->back()->with($notification);


        }else{

            HomeSide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url
           ]);

           $notification = array(
               'message' => 'Home Slide Updated with Image Successfully',
                'alert'  => 'success'
           );
           return redirect()->back()->with($notification);

        }
        // End Else

    }
    // End method

}
