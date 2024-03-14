<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models;
use Auth;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    //
    public function display(){
        $products = Models\Product::paginate(10);
        return view('admin.product.products')->with('allproducts', $products);
    }



    public function show(){
        $category = Models\Category::all();
        $brand  = Models\Brand::all();
        return view('admin.product.product-form')
                ->with('categories',$category )
                ->with('brands', $brand);
    }


    public function create(Request $request){
       
        $data = $request->validate([
            'product_categories' => ['bail', 'required', 'array'],
            'product_brand' => ['bail', 'required', 'string', 'min:2'],
            'product_name' => ['bail', 'required', 'string', 'min:2', 'unique:'.Models\Product::class],
            'product_price' => ['bail', 'required', 'integer'],
            'product_inventory' => ['bail', 'required', 'string', 'min:1'],
            'product_discount_price' => ['bail', 'nullable', 'integer'],
            'product_color' => ['bail', 'nullable', 'array', 'min:2'],
            'weight' => ['bail', 'nullable', 'string', 'min:2'],
            'product_size' => ['bail', 'nullable', 'array', 'min:1'],
            'dimension' => ['bail', 'nullable', 'string', 'min:2'],
            'product_description' => ['bail', 'nullable', 'string', 'min:2'],
            'product_images' => ['bail', 'required'],  
            'product_images.*' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp'])->max('10mb')],      
        ]);
        


        if($request->hasfile('product_images')){
           
           $imageCount = 1;
           $imgarr = [];
           foreach($request->Allfiles('product_images') as $key => $product_image){
               
               foreach($product_image as $singleProductImage){
                   $product_name = trim($request->product_name);
                   $product_name = str_replace(' ', '_',  $request->product_name);
                   $product_name = filter_var($product_name, FILTER_SANITIZE_STRING);
                   $image_name = $imageCount.'.'.$singleProductImage->extension();
                   $saved = $singleProductImage->storeAs('products/images/'.$product_name,  $image_name, 'public');
                   array_push($imgarr, $saved);
                   $imageCount++;
               }
              
            }

            $product = Models\Product::create([
                'unique_id' => random_int(1000, 9999),
                'admin_id' => Auth::guard('admin')->user()->id,
                'brand_id' => $request->product_brand,
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_discount_price' => $request->product_discount_price ?? null,
                'product_image_1' => $imgarr[0] ?? null,
                'product_image_2' => $imgarr[1] ?? null,
                'product_image_3' => $imgarr[2] ?? null,
                'product_image_4' => $imgarr[3] ?? null,
                'product_image_5' => $imgarr[4] ?? null
            ]);


            foreach($request->product_categories as $singleCategory){
                
                Models\ProductCategories::create([
                'product_id' => $product->id,
                'category_id' =>$singleCategory['category_id'] 
                ]);
            }

            // check if product have color value
            if($request->has('product_color')){
                $colorArr = [];
                foreach($request->product_color as $color){
                    array_push($colorArr ,$color['color_value']);
                    
                }
                $product_colors = json_encode($colorArr);
            }else{
                $product_colors = null;
            }
       
            // check if product have size value
            if($request->has('product_size')){
                $sizeArr = [];
                foreach($request->product_size as $size){
                    array_push($sizeArr ,$size['size_value']);
                    
                }
                $product_sizes = json_encode($sizeArr);
            }else{
                $product_sizes = null;
            }

  
            $technical_details = json_encode([
                "product_dimension" => $request->dimension ?? null, 
                "product_weigth" => $request->weight ?? null, 
                "product_color" => $product_colors,
                "product_size" => $product_sizes
                ]);

            //insert into product details 
            Models\PrductDetails::create([
                'product_id' => $product->id,
                'about' => json_encode(trim($request->product_description)),
                'technical_details' => $technical_details,
            ]);

        
            //insert inventory
            Models\Inventory::create([
                'product_id' => $product->id,
                'stock_quantity' => $request->product_inventory
            ]);

        // insert into product_category
        


            $message = "You created a new product ".$request->product_name;
            return redirect()->route('admin.product.new')->with('message', $message)
                                        ->with('message-color', 'alert-success');  /**/
   
       
        }else{
            $message = "Products must have at least one image";
                return redirect()->route('admin.product.new')->with('message', $message)
                                            ->with('message-color', 'alert-danger');  /**/
        } 

    }

    // function below updates products with a patch or put request
    public function edit($product_id){
        $category = Models\Category::all();
        $brand  = Models\Brand::all();
        $products = Models\Product::find($product_id);
        return view('admin.product.editproduct')->with('product', $products)->with('categories',$category )
        ->with('brands', $brand);

    }

    // function below updates products with a patch or put request
    public function update(Request $request){
        
       
        $data = $request->validate([
            'product_categories' => ['bail', 'nullable', 'array'],
            'product_brand' => ['bail', 'nullable', 'string', 'min:2'],
            'product_name' => ['bail', 'nullable', 'string', 'min:2'],
            'product_price' => ['bail', 'nullable', 'integer'],
            'product_inventory' => ['bail', 'nullable', 'string', 'min:1'],
            'product_discount_price' => ['bail', 'nullable', 'integer'],
            'product_color' => ['bail', 'nullable', 'array', 'min:2'],
            'weight' => ['bail', 'nullable', 'string', 'min:2'],
            'product_size' => ['bail', 'nullable', 'array', 'min:1'],
            'dimension' => ['bail', 'nullable', 'string', 'min:2'],
            'product_description' => ['bail', 'nullable', 'string', 'min:2'],
            'product_image_1' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('10mb')], 
            'product_image_2' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('10mb')],   
            'product_image_3' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('10mb')], 
            'product_image_4' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('10mb')],  
            'product_image_5' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('10mb')],  
            'product_id' => ['bail', 'nullable', 'string'],    
        ]);

        $product =  Models\Product::find($request->product_id);
        $productdetails =  Models\PrductDetails::where('product_id', $request->product_id)->get();

        switch ($request) {
            case $request->hasfile('product_image_1'):
                if (Storage::disk('public')->exists($product->product_image_1)) {
                    // ...delete product_image_1 image if it exists in storage
                    Storage::disk('public')->delete($product->product_image_1);
                    
                }
                $product_name = trim($product->product_name);
                $product_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $product_name);
                $product_name = str_replace('-', '_',  $product_name);
                $product_name = str_replace('__', '_',  $product_name);
                $image_name = '1.'.$request->file('product_image_1')->extension();
                $saved = $request->file('product_image_1')->storeAs('products/images/'.$product_name,  $image_name, 'public');
                $product->product_image_1 = $saved ;
                $product->save();
                $message = "You updated the primary product image for ".$product->product_name;
                break;

            case $request->hasfile('product_image_2'):
                // if product image not null, delete from storage
                if(!empty($product->product_image_2)){
                    if (Storage::disk('public')->exists($product->product_image_2)) {
                        // ...delete product_image_1 image if it exists in storage
                        Storage::disk('public')->delete($product->product_image_2);
                        
                    }
                }
                $product_name = trim($product->product_name);
                $product_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $product_name);
                $product_name = str_replace('-', '_',  $product_name);
                $product_name = str_replace('__', '_',  $product_name);
                $image_name = '2.'.$request->file('product_image_2')->extension();
                $saved = $request->file('product_image_2')->storeAs('products/images/'.$product_name,  $image_name, 'public');
                $product->product_image_2 = $saved ;
                $product->save();
                $message = "You updated the 2nd product image for ".$product->product_name;
                break;
            case $request->hasfile('product_image_3'):
                // if product image not null, delete from storage
                if(!empty($product->product_image_3)){
                    if (Storage::disk('public')->exists($product->product_image_3)) {
                        // ...delete product_image_1 image if it exists in storage
                        Storage::disk('public')->delete($product->product_image_3);
                        
                    }
                }
                
                $product_name = trim($product->product_name);
                $product_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $product_name);
                $product_name = str_replace('-', '_',  $product_name);
                $product_name = str_replace('__', '_',  $product_name);
                $image_name = '3.'.$request->file('product_image_3')->extension();
                $saved = $request->file('product_image_3')->storeAs('products/images/'.$product_name,  $image_name, 'public');
                $product->product_image_3 = $saved ;
                $product->save();
                $message = "You updated the 3rd product image for ".$product->product_name;
               break;
            case $request->hasfile('product_image_4'):
                // if product image not null, delete from storage
                if(!empty($product->product_image_4)){
                    if (Storage::disk('public')->exists($product->product_image_4)) {
                        // ...delete product_image_1 image if it exists in storage
                        Storage::disk('public')->delete($product->product_image_4);
                        
                    }
                }
                $product_name = trim($product->product_name);
                $product_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $product_name);
                $product_name = str_replace('-', '_',  $product_name);
                $product_name = str_replace('__', '_',  $product_name);
                $image_name = '4.'.$request->file('product_image_4')->extension();
                $saved = $request->file('product_image_4')->storeAs('products/images/'.$product_name,  $image_name, 'public');
                $product->product_image_4 = $saved ;
                $product->save();
                $message = "You updated the 4th product image for ".$product->product_name;
                break;
            case $request->hasfile('product_image_5'):
                // if product image not null, delete from storage
                if(!empty($product->product_image_5)){
                    if (Storage::disk('public')->exists($product->product_image_5)) {
                        // ...delete product_image_1 image if it exists in storage
                        Storage::disk('public')->delete($product->product_image_5);
                        
                    }
                }
                $product_name = trim($product->product_name);
                $product_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $product_name);
                $product_name = str_replace('-', '_',  $product_name);
                $product_name = str_replace('__', '_',  $product_name);
                $image_name = '5.'.$request->file('product_image_5')->extension();
                $saved = $request->file('product_image_5')->storeAs('products/images/'.$product_name,  $image_name, 'public');
                $product->product_image_5 = $saved ;
                $product->save();
                $message = "You updated the 5th product image for ".$product->product_name;
                break;
            case $request->has('product_name'):
                $product->product_name = $request->product_name;
                $product->save();
                $message = "You updated product name for ".$product->product_name;
                break;
            case $request->has('product_description'):
                // dd($productdetails);
                $updatedProductDetails = Models\PrductDetails::where('product_id', $request->product_id)->update(['about' => json_encode($request->product_description)]);
                $message = "You updated product description for ".$product->product_name;
                break;
            case $request->has('product_price'):
                $product->product_price = $request->product_price;
                if($request->has('product_discount_price')){
                    $product->product_discount_price = $request->product_discount_price;
                }
                $product->save();
                $message = "You updated product prices for ".$product->product_name;
                break;
            case $request->has('product_color'):

                // check if product have color value
                $colorArr = [];
                foreach($request->product_color as $color){
                    array_push($colorArr ,$color['color_value']);
                    
                }
                if(is_null($colorArr[0])){
                    $product_colors = null; 
                    $message = "You removed all product colors for ".$product->product_name;
                }else{
                    $product_colors = json_encode($colorArr);
                }
                
                $techDetails = json_decode($product->productDetails->technical_details);
                // dd($techDetails->product_color);
                $product_dimension = $techDetails->product_dimension ;
                $product_weigth = $techDetails->product_weigth;
                $product_size = $techDetails->product_size;
                $technical_details = json_encode([
                    "product_dimension" => $product_dimension, 
                    "product_weigth" => $product_weigth, 
                    "product_color" => $product_colors,
                    "product_size" => $product_size
                ]);
                $updatedProductDetails = Models\PrductDetails::where('product_id', $request->product_id)->update(['technical_details' => $technical_details]);
                $message = "You updated product colors for .".$product->product_name;
                ;
            case $request->has('product_size'):

                // check if product have color value
                $sizeArr = [];
                foreach($request->product_size as $size){
                    array_push($sizeArr, $size['size_value']);
                    
                }
                if(is_null($sizeArr[0])){
                    $product_sizes = null;
                    $message = "You removed all product sizes for ".$product->product_name;
                }else{
                    $product_sizes = json_encode($sizeArr);
                }
                
                $techDetails = json_decode($product->productDetails->technical_details);
                // dd($techDetails->product_size);
                $product_dimension = $techDetails->product_dimension ;
                $product_weigth = $techDetails->product_weigth;
                $product_color = $techDetails->product_color;
                $technical_details = json_encode([
                    "product_dimension" => $product_dimension, 
                    "product_weigth" => $product_weigth, 
                    "product_color" => $product_color,
                    "product_size" => $product_sizes
                ]);
                $updatedProductDetails = Models\PrductDetails::where('product_id', $request->product_id)->update(['technical_details' => $technical_details]);
                $message = "You updated product sizes for .".$product->product_name;
                break;
            case $request->has('product_categories'):
                $removeCategory = Models\ProductCategories::where('product_id', $request->product_id)->delete();
                foreach($request->product_categories as $singleCategory){
                    Models\ProductCategories::create([
                    'product_id' => $request->product_id,
                    'category_id' =>$singleCategory['category_id'] 
                    ]);
                }
                $message = "You updated product categories for .".$product->product_name;
                break;
            default:
                # code...
                break;
        }

        
        return redirect()->route('admin.product.edit', $product_id = $request->product_id)->with('message', $message)
                                    ->with('message-color', 'alert-success');  /**/
   
       
        
    
    }


    // function below deletes products
    public function delete(Request $request){
        // $brand = Product::find($request->product_id);
        // $product->delete();
        // return redirect()->route('admin.products', $product_id = $product->id)->with('message', 'You deleted '.$product->product_name. ' brand')
        //                     ->with('message-color', 'alert-success');
    }


    public function remove_image(Request $request){
        $product_image_name =  Models\Product::find($request->product_id);
        $imageLocation = $request->image_location;
        $product_image_name->$imageLocation = null;
        $product_image_name->save();
        
        if (Storage::disk('public')->exists($request->product_image)) {
            // ...delete product_image_1 image if it exists in storage
            Storage::disk('public')->delete($request->product_image);
            
        }
        return redirect()->route('admin.product.edit', $product_id = $request->product_id)->with('message', 'You deleted a product image')
                            ->with('message-color', 'alert-success');
    }
}
