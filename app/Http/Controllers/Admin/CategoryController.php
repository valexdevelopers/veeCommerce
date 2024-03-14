<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\ReirectResponse;
use Illuminate\Validation\Rules\File;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function display(){
        $categories = Category::paginate(10);
        return view('admin.category.allcategories')->with('allcategories', $categories);
    }

    public function show(){
        return view('admin.category.addcategory');
    }

    public function create(Request $request) {
        $data = $request->validate([
            'category_name' => ['bail', 'required', 'string', 'unique:'.category::class],
            'category_image' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp'])->max('4mb'), 'unique:'.category::class],
        ]);
        
        if($request->hasFile('category_image')){
            $save_category_image_as = trim($request->category_name);
        $save_category_image_as = str_replace(' ', '_',  $save_category_image_as);
        $save_category_image_as =  $save_category_image_as.'.'.$request->category_image->extension();
        
        $category_image = $request->file('category_image')->storeAs('/category/images',  $save_category_image_as, 'public');
        }else{
            $category_image = null;
        }
        
       
        $category = Category::updateOrCreate(
            ['category_name' => $request->category_name], 
            [
                'unique_id' => random_int(1000, 9999),
                'category_image' => $category_image,

                ]);
        
        return redirect()->route('admin.category.new')->with('message', 'You created a new category.')
                            ->with('message-color', 'alert-success');
    }


    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.editcategory')->with('category', $category);
    }

    public function update(Request $request){
        $data = $request->validate([
            'category_name' => ['bail', 'required', 'string'],
            'category_image' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp'])->max('4mb')],
        ]);
        // find category by id
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        // if request has an image, update category image
        if($request->hasFile('category_image')){
            $save_category_image_as = trim($request->category_name);
            $save_category_image_as = str_replace(' ', '_',  $save_category_image_as);
            $save_category_image_as =  $save_category_image_as.'.'.$request->category_image->extension();
            $category_image = $request->file('category_image')->storeAs('/category/images',  $save_category_image_as, 'public');
            // set category image with request image
            $category->category_image = $category_image;
        }else{
            // if request has no image, do not touch the existing category image
            $category_image = null;
        }
       $category->update();
        
        
        
        
        return redirect()->route('admin.category.edit', $category_id = $category->id)->with('message', 'You updated '.$category->category_name. ' category')
                            ->with('message-color', 'alert-success');
    }

    public function delete(Request $request){
        $category = Category::find($request->category_id);
        $category->delete();
        return redirect()->route('admin.categories', $category_id = $category->id)->with('message', 'You deleted '.$category->category_name. ' category')
                            ->with('message-color', 'alert-success');
    }
}
