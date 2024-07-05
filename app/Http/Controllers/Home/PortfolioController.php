<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class PortfolioController extends Controller
{

    public function AllPortfolio(){

        $allPortifolios = Portfolio::latest()->get();
        return view('admin.portfolio.all_portfolio', [
            'allPortifolios' => $allPortifolios
        ]);

    }
    public function AddPortfolio(){

        return view('admin.portfolio.add_portfolio');
    }
    public function StorePortfolio(Request $request){

        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'required'
        ],[
            'portfolio_name.required' => 'Portfolio name is required',
            'portfolio_title.required' => 'Portfolio title is required',
            'portfolio_description.required' => 'Portfolio description is required',
            'portfolio_image.required' => 'Portfolio image is required'
        ]

    );

    $image = $request->file('portfolio_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::read($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);

    $save_url = 'upload/portfolio/'.$name_gen ;
    Portfolio::insert([
         'portfolio_name' => $request->portfolio_name,
         'portfolio_title' => $request->portfolio_title,
         'portfolio_description' => $request->portfolio_description,
         'portfolio_image' => $save_url,
         'created_at' => Carbon::now()
    ]);

    $notification = array(
        'message' => ' Portfolio Added Successfully',
         'alert'  => 'success'
    );
    return redirect()->route('all.portifolio')->with($notification);





    }
    // End Method

    public function EditPortfolio($id){

        $portfolio = Portfolio::find($id);

        return view('admin.portfolio.edit_portfolio' ,[
            'portfolio' => $portfolio
        ]);

    }
    // End Method

    public function UpdatePortfolio(Request $request){

        $portfolio_id = $request->id;
        $old_image = $request->portfolio_image;
        $image = $request->file('portfolio_image');
        if($image){
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::read($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen ;
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_description'=> $request->portfolio_description,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_image' => $save_url,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Portfolio With Image Updated Successfully',
                 'alert'  => 'success'
            );
            return redirect()->route('all.portifolio')->with($notification);
        }else{

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_description'=> $request->portfolio_description,
                'portfolio_title' => $request->portfolio_title,
                'updated_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Portfolio Updated Successfully',
                 'alert'  => 'success'
            );
            return redirect()->route('all.portifolio')->with($notification);
        }
    }
    // End Method

    public function DeletePortfolio($id){
        $portfolio = Portfolio::find($id);
        $img = $portfolio->portfolio_image;
        unlink($img);
        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Portfolio Deleted Successfully',
             'alert'  => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //  End Method

    public function PortfolioDetails($id){
        $portfolio = Portfolio::find($id);
        return view('frontend.portfolio_details',[
            'portfolio' => $portfolio
        ]);
    }
    public function HomePortfolio(){

        $allPortifolios = Portfolio::latest()->get();
        return view('frontend.portfolio', [
            'allPortifolios' => $allPortifolios
        ]);
    }


}
