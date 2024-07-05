<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{

    public function AllBlog(){
        $blogs = Blog::latest()->get();
        return view('admin.blogs.all_blogs',[
            'blogs' => $blogs
        ]);
    }
    // End Method
    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category')->get();
       return view('admin.blogs.add_blogs',[
        'categories' => $categories
       ]);
    }
    // End Method
    public function StoreBlog(Request $request){
        $request->validate([
            'blog_category_id' =>'required',
            'blog_title' =>'required',
            'blog_image' =>'required',
            'blog_tags' =>'required',
            'blog_description' =>'required'
    ],[
        'blog_category_id.required' => 'Blog Category is required',
        'blog_title.required' => 'Blog Title is required',
        'blog_image.required' => 'Blog Image is required',
        'blog_tags.required' => 'Blog Tags is required',
        'blog_description.required' => 'Blog Description is required'
    ]);
    $image = $request->file('blog_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::read($image)->resize(430,327)->save('upload/blog/'.$name_gen);
    $save_url = 'upload/blog/'.$name_gen;
    Blog::insert([
        'blog_category_id' => $request->blog_category_id,
        'blog_title' => $request->blog_title,
        'blog_image' => $save_url,
        'blog_tags' => $request->blog_tags,
        'blog_description' => $request->blog_description,
        'created_at' => Carbon::now()
    ]);
    $notification = array(
        'message' => 'Blog Added Successfully',
         'alert'  =>'success'
    );
    return redirect()->route('all.blog')->with($notification);


}
// End Method


public function EditBlog($id){
    $blog = Blog::findOrFail($id);
    $categories = BlogCategory::orderBy('blog_category')->get();
    return view('admin.blogs.edit_blogs',[
        'blog' => $blog,
        'categories' => $categories
    ]);
}
// End Method


public function UpdateBlog(Request $request){
    $request->validate([
        'blog_category_id' =>'required',
        'blog_title' =>'required',
        'blog_tags' =>'required',
        'blog_description' =>'required'
    ],[
        'blog_category_id.required' => 'Blog Category is required',
        'blog_title.required' => 'Blog Title is required',
        'blog_tags.required' => 'Blog Tags is required',
        'blog_description.required' => 'Blog Description is required'
    ]);
   if($request->file('blog_image')) {
    $image = $request->file('blog_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::read($image)->resize(430,327)->save('upload/blog/'.$name_gen);
    $save_url = 'upload/blog/'.$name_gen;
    Blog::findOrFail($request->id)->update([
        'blog_category_id' => $request->blog_category_id,
        'blog_title' => $request->blog_title,
        'blog_image' => $save_url,
        'blog_tags' => $request->blog_tags,
        'blog_description' => $request->blog_description,
        'created_at' => Carbon::now()
    ]);
    $notification = array(
        'message' => 'Blog Updated with image Successfully',
         'alert'  =>'success'
    );
    return redirect()->route('all.blog')->with($notification);
   }else{
    Blog::findOrFail($request->id)->update([
        'blog_category_id' => $request->blog_category_id,
        'blog_title' => $request->blog_title,
        'blog_tags' => $request->blog_tags,
        'blog_description' => $request->blog_description,
        'created_at' => Carbon::now()
    ]);
    $notification = array(
        'message' => 'Blog Updated Successfully',
         'alert'  =>'success'
    );
    return redirect()->route('all.blog')->with($notification);
   }
}
// End Method

public function DeleteBlog($id){
    $blog = Blog::find($id);
    $blog->delete();
    unlink($blog->blog_image);
    $notification = array(
       'message' => 'Blog Deleted Successfully',
        'alert-type' =>'success'
    );
    return redirect()->route('all.blog')->with($notification);
}
// End Method
public function BlogDetails($id){
    $blog = Blog::findOrFail($id);
    $allBlogs = Blog::limit(5)->get();
    $allcategories = BlogCategory::orderBy('blog_category')->get();
    return view('frontend.blog_details',[
        'blog' => $blog,
        'allBlogs' => $allBlogs,
        'allcategories' => $allcategories
    ]);
}

public function CategoryBlog($id){
    $blogs = Blog::where('blog_category_id',$id)->latest()->get();
    $allBlogs = Blog::latest()->limit(5)->get();

    $categories = BlogCategory::orderBy('blog_category' ,'asc')->get();
    $categoryName = BlogCategory::findOrFail($id);
    return view('frontend.category_blogs',[
        'blogs' => $blogs,
        'allBlogs' => $allBlogs,
        'categories' => $categories,
         'categoryName' => $categoryName
    ]);
}
// End Method

public function HomeBlog(){

    $allBlogs = Blog::latest()->paginate(3);
    $categories = BlogCategory::orderBy('blog_category' ,'asc')->get();

    return view('frontend.blog',[
        'allBlogs' => $allBlogs,
        'categories' => $categories
    ]);
}

}
