<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Auth;


class BannerController extends Controller
{
    //
        //
        public function show(){
            $banners = Models\StoreBanner::all();
            return view('admin.banner.banner')->with('banners', $banners);
        }
    
        public function create(Request $request){
            $data = $request->validate([
                'banner_1' => ['bail', 'required', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('4mb')], 
                'banner_2' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('4mb')],   
                'banner_3' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('4mb')], 
                'side_banner_1' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('4mb')],  
                'side_banner_2' => ['bail', 'nullable', File::types(['jpg', 'jpeg', 'png', 'avif', 'webp', 'gif'])->max('4mb')], 
                   
            ]);
    
            if($request->hasfile('banner_1') ){
                
                $image_name = 'banner_1.'.$request->file('banner_1')->extension();
                if (Storage::disk('public')->exists('banners/'.$image_name)) {
                    // ...delete logo image if it exists in storage
                    Storage::disk('public')->delete('banners/'.$image_name);
                }
                $saved = $request->file('banner_1')->storeAs('banners',  $image_name, 'public');

            }else{
                $message = 'Your website needs a header banner.This is the main image showing at the top of your website';
                return redirect()->route('admin.store-banner')->with('message', $message)
                        ->with('message-color', 'alert-danger');
            }

            if($request->hasfile('banner_2') ){
                
                $image_namebanner_2 = 'banner_2.'.$request->file('banner_2')->extension();
                if (Storage::disk('public')->exists('banners/'.$image_namebanner_2)) {
                    // ...delete logo image if it exists in storage
                    Storage::disk('public')->delete('banners/'.$image_namebanner_2);
                }
                $savedbanner_2 = $request->file('banner_2')->storeAs('banners',  $image_namebanner_2, 'public');

            }

            if($request->hasfile('banner_3') ){
                
                $image_namebanner_3 = 'banner_3.'.$request->file('banner_3')->extension();
                if (Storage::disk('public')->exists('banners/'.$image_namebanner_3)) {
                    // ...delete logo image if it exists in storage
                    Storage::disk('public')->delete('banners/'.$image_namebanner_3);
                }
                $savedbanner_3 = $request->file('banner_3')->storeAs('banners',  $image_namebanner_3, 'public');

            }
            
            if($request->hasfile('side_banner_1') ){
                
                $image_nameside_banner_1 = 'side_banner_1.'.$request->file('side_banner_1')->extension();
                if (Storage::disk('public')->exists('banners/'.$image_nameside_banner_1)) {
                    // ...delete logo image if it exists in storage
                    Storage::disk('public')->delete('banners/'.$image_nameside_banner_1);
                }
                $savedside_banner_1 = $request->file('side_banner_1')->storeAs('banners',  $image_nameside_banner_1, 'public');

            }

            if($request->hasfile('side_banner_2') ){
                
                $image_nameside_banner_2 = 'side_banner_2.'.$request->file('side_banner_2')->extension();
                if (Storage::disk('public')->exists('banners/'.$image_nameside_banner_2)) {
                    // ...delete logo image if it exists in storage
                    Storage::disk('public')->delete('banners/'.$image_nameside_banner_2);
                }
                $savedside_banner_2 = $request->file('side_banner_2')->storeAs('banners',  $image_nameside_banner_2, 'public');

            }

            $oldBanners = Models\StoreBanner::all();
            if($oldBanners->count() > 0){
                $oldbanner1 = $oldBanners[0]->banner_1;

            }else{
                $oldbanner1 = $saved;
            }

            $product = Models\StoreBanner::updateOrCreate(
                ['banner_1' => $oldbanner1 ],
                [
                'admin_id' => Auth::guard('admin')->user()->id,
                'banner_2' => $savedbanner_2 ?? $oldBanners[0]->banner_2 ?? null,
                'banner_3' => $savedbanner_3 ?? $oldBanners[0]->banner_3 ?? null,
                'side_banner_1' => $savedside_banner_1 ?? $oldBanners[0]->side_banner_1 ?? null,
                'side_banner_2' => $savedside_banner_2 ?? $oldBanners[0]->side_banner_2 ?? null,

    
            ]);
    
            $message = 'You Added new logos to your website.';
            return redirect()->route('admin.store-banner')->with('message', $message)
                    ->with('message-color', 'alert-success');
        }

        public function update($banner_id){

            $remove = Models\StoreBanner::all();
            $remove[0]->update([$banner_id => null]);
            $message = 'You removed one of your website banners.';
            return redirect()->route('admin.store-banner')->with('message', $message)
                    ->with('message-color', 'alert-success');
        }
}
