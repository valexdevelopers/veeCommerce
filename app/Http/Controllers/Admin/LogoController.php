<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Auth;

class LogoController extends Controller
{
    //
    public function show(){
        $logos = Models\Logo::all();
        return view('admin.logo.index')->with('logos', $logos);
    }

    public function create(Request $request){
        $data = $request->validate([
           
            'logo_white' => ['bail', 'required', File::types(['png'])->max('4mb')], 
            'logo_white' => ['bail', 'required', File::types(['png'])->max('4mb')],      
        ]);

        if($request->hasfile('logo_colored')){

            $image_name = 'logo_colored.'.$request->file('logo_colored')->extension();
            if (Storage::disk('public')->exists('logo/'.$image_name)) {
                // ...delete logo image if it exists in storage
                Storage::disk('public')->delete('logo/'.$image_name);
            }
            $saved = $request->file('logo_colored')->storeAs('logo',  $image_name, 'public');
        
           
        }else{
            $message = 'Your website needs a colored logo, Colored logo show up on white backgrounds';
            return redirect()->route('admin.advert-banner.new')->with('message', $message)
                    ->with('message-color', 'alert-danger');
        }

        if($request->hasfile('logo_white')){


            $image_name_white = 'logo_white.'.$request->file('logo_white')->extension();
            if (Storage::disk('public')->exists('logo_white/'.$image_name_white)) {
                // ...delete logo image if it exists in storage
                Storage::disk('public')->delete('logo_white/'.$image_name_white);
            }
            $savedwhite = $request->file('logo_white')->storeAs('logo',  $image_name_white, 'public');
        
           
        }else{
            $message = 'Your website needs a white logo, white logo show up on colored backgrounds. They would appear invinvible on white backgrounds';
            return redirect()->route('admin.advert-banner.new')->with('message', $message)
                    ->with('message-color', 'alert-danger');
        }



        $product = Models\Logo::updateOrCreate(
            ['logo' => $saved,],[
            'admin_id' => Auth::guard('admin')->user()->id,
            'logowhite' => $savedwhite,

        ]);

        $message = 'You Added new logos to your website.';
        return redirect()->route('admin.logo')->with('message', $message)
                ->with('message-color', 'alert-success');
    }
}
