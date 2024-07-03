<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function BlogCategory(){
        $blogCategory = BlogCategory::all();
        return view('admin.blog_category.all_blog_category',[
            'blogCategory' => $blogCategory
        ]);
    }
    public function AddBlogCategory(){
        return view('admin.blog_category.add_blog_category');
    }
    public function StoreBlogCategory(Request $request){

        $request->validate([
            'blog_category' =>'required'
        ],[
            'blog_category.required' => 'Blog Category is required'
        ]);

        $blogCategory = new BlogCategory();
        $blogCategory->blog_category = $request->blog_category;
        $blogCategory->save();
        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    public function EditBlogCategory($id){
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category',[
            'blogCategory' => $blogCategory
        ]);
    }
    // End Method
    public function UpdateBlogCategory(Request $request ,$id){
        $request->validate([
            'blog_category' =>'required'
        ],[
           'blog_category.required' => 'Blog Category is required'
        ]);

        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category
        ]);
        $notification = array(
           'message' => 'Blog Category Updated Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    // End Method
    public function DeleteBlogCategory($id){
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();
        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    // End Method


}
