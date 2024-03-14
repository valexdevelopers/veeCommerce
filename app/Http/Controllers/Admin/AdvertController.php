<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models;
use Auth;

class AdvertController extends Controller
{
    //
    public function display(){
        $adverts = Models\AdvertBanner::paginate(10);
        return view('admin.advert.advertbannerlist')->with('adverts', $adverts);
    }

    public function show(){
        return view('admin.advert.advertbanners');
    }

    public function create(Request $request){
        $data = $request->validate([
            'banner_name' => ['bail', 'required', 'string', 'min:2', 'unique:'.Models\AdvertBanner::class],
            'banner_visibility' => ['bail', 'required', 'string'],
            'banner_image' => ['bail', 'required', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('4mb')],      
        ]);

        if($request->hasfile('banner_image')){

            $banner_name = trim($request->banner_name);
            $banner_name = str_replace(' ', '_',  $request->banner_name);
            $image_name = $banner_name.'.'.$request->file('banner_image')->extension();
            $saved = $request->file('banner_image')->storeAs('advertBanner/images',  $image_name, 'public');
            

            if($request->banner_visibility == 'show'){
               $oldAdvertBanner =  Models\AdvertBanner::where('visibility', 'show')->update(['visibility' => 'hide']);
               
            }

            $product = Models\AdvertBanner::create([
                'banner_image' => $saved,
                'admin_id' => Auth::guard('admin')->user()->id,
                'banner_name' => $request->banner_name,
                'visibility' => $request->banner_visibility,

            ]);

            $message = 'You created a new Advert banner .';
            return redirect()->route('admin.advert-banner.new')->with('message', $message)
                    ->with('message-color', 'alert-success');
        }else{
            $message = 'Advert banner image can not be empty.';
            return redirect()->route('admin.advert-banner.new')->with('message', $message)
                    ->with('message-color', 'alert-danger');
        }
    }


    public function update($advert_banner_id){
        $oldAdvertBanner =  Models\AdvertBanner::where('visibility', 'show')->update(['visibility' => 'hide']);
        $newAdvertBanner =  Models\AdvertBanner::where('id', $advert_banner_id)->update(['visibility' => 'show']);
        $message = 'You changed your website Advert banner .';
        return redirect()->route('admin.advert-banner')->with('message', $message)
                    ->with('message-color', 'alert-success');
    } 

    
    public function patch($advert_banner_id){
        $oldAdvertBanner =  Models\AdvertBanner::where('visibility', 'show')->update(['visibility' => 'hide']);
        $message = 'You removed  your current website Advert banner.';
        return redirect()->route('admin.advert-banner')->with('message', $message)
                    ->with('message-color', 'alert-success');
    } 


    public function delete($advert_banner_id){

    }
}
