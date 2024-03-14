<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    //
    public function index(){
        $admins = Admin::paginate(10);
        return view('admin.admin.alladmin')->with('admins', $admins);
        
    }

    public function verify($admin_id){
        $admin = Admin::find($admin_id);
        $admin->admin_verified_at = Carbon::now();
        $admin->save();
        return redirect()->route('admin.admins')->with('message', 'You verified '.$admin->firstname. ' as an admin')
        ->with('message-color', 'alert-success');
    }

    public function unverify($admin_id){
        $admin = Admin::find($admin_id);
        $admin->admin_verified_at = null;
        $admin->save();
        return redirect()->route('admin.admins')->with('message', 'You restricted '.$admin->firstname. ' as an admin')
        ->with('message-color', 'alert-success');
    }
    public function upgrade($admin_id){
        $admin = Admin::find($admin_id);
        $admin->isSuperAdmin = true;
        $admin->save();
        return redirect()->route('admin.admins')->with('message', 'You restricted '.$admin->firstname. ' as an admin')
        ->with('message-color', 'alert-success');
    }
    
    public function delete(Request $request){
        $admin = Admin::find($request->admin_id);
        $admin->delete();
        return redirect()->route('admin.admins')->with('message', 'You deleted '.$admin->firstname. ' as an admin')
        ->with('message-color', 'alert-success');
    }

}
