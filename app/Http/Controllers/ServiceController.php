<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;
use Image;

class ServiceController extends Controller
{
    public function ServiceView(){
		$services = Service::latest()->get();
		return view('backend.service.service_view',compact('services'));
	}
    public function ServiceStore(Request $request){

    	$request->validate([

    		'img' => 'required',
    	],[
    		'img.required' => 'Plz Select One Image',
    	]);

    	$image = $request->file('img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/service/'.$name_gen);
    	$save_url = 'upload/service/'.$name_gen;

	Service::insert([
		'title' => $request->title,
        'description' => $request->description,
		'img' => $save_url,
    	]);

	    $notification = array(
			'message' => 'Service Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method

    public function ServiceEdit($id){
        $services = Service::findOrFail($id);
            return view('backend.service.service_edit',compact('services'));
        }
    
    public function ServiceUpdate(Request $request){
   
            $service_id = $request->id;
            $old_img = $request->old_image;
    
            if ($request->file('img')) {
    
            unlink($old_img);
            $image = $request->file('img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/service/'.$name_gen);
            $save_url = 'upload/service/'.$name_gen;
    
        Service::findOrFail($service_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Service Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('service')->with($notification);
    
            }else{
    
            Service::findOrFail($service_id)->update([
            'title' => $request->title,
            ]);
    
            $notification = array(
                'message' => 'Service Updated Without Image Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('service')->with($notification);
    
            } // end else 
        } // end method 
    
        public function ServiceDelete($id){
            $service = Service::findOrFail($id);
            $img = $service->img;
            unlink($img);
            Service::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Service Delectd Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
    
        } // end method
}
