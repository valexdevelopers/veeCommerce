<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\ReirectResponse;
use Illuminate\Validation\Rules\File;
use App\Models\Brand;


class BrandController extends Controller
{
    //

    public function display(){
        $brands = Brand::paginate(10);
        return view('admin.brand.allbrands')->with('allBrands', $brands);
    }

    public function show(){
        return view('admin.brand.addbrand');
    }

    public function create(Request $request) {
        $data = $request->validate([
            'brand_name' => ['bail', 'required', 'string', 'unique:'.Brand::class],
            'brand_image' => ['bail', 'required', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp'])->max('4mb'), 'unique:'.Brand::class],
        ]);

        $save_brand_image_as = trim($request->brand_name);
        $save_brand_image_as = str_replace(' ', '_',  $save_brand_image_as);
        $save_brand_image_as =  $save_brand_image_as.'.'.$request->brand_image->extension();
        
        $brand_image = $request->file('brand_image')->storeAs('/brand/images',  $save_brand_image_as, 'public');
       
        $brand = Brand::updateOrCreate(
            ['brand_name' => $request->brand_name], 
            [
                'unique_id' => random_int(1000, 9999),
                'brand_image' => $brand_image,

                ]);
        
        return redirect()->route('admin.brand.new')->with('message', 'You created a new brand.')
                            ->with('message-color', 'alert-success');
    }


    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.editbrand')->with('brand', $brand);
    }

    public function update(Request $request){
        $data = $request->validate([
            'brand_name' => ['bail', 'required', 'string'],
            'brand_image' => ['bail', 'required', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp'])->max('4mb')],
        ]);

        $save_brand_image_as = trim($request->brand_name);
        $save_brand_image_as = str_replace(' ', '_',  $save_brand_image_as);
        $save_brand_image_as =  $save_brand_image_as.'.'.$request->brand_image->extension();
        
        $brand_image = $request->file('brand_image')->storeAs('/brand/images',  $save_brand_image_as, 'public');
       
        $brand = Brand::updateOrCreate(
            ['brand_name' => $request->brand_name], 
            [
                'unique_id' => random_int(1000, 9999),
                'brand_image' => $brand_image,

                ]);
        
        return redirect()->route('admin.brand.edit', $brand_id = $brand->id)->with('message', 'You updated '.$brand->brand_name. 'brand')
                            ->with('message-color', 'alert-success');
    }

    public function delete(Request $request){
        $brand = Brand::find($request->brand_id);
        $brand->delete();
        return redirect()->route('admin.brands', $brand_id = $brand->id)->with('message', 'You deleted '.$brand->brand_name. ' brand')
                            ->with('message-color', 'alert-success');
    }
}
