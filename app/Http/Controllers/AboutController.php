<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Image;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function AboutView(){
		$abouts = About::latest()->get();
		return view('backend.about.about_view',compact('abouts'));
	}
    public function AboutStore(Request $request){

    	$request->validate([

    		'image' => 'required',
    	],[
    		'image.required' => 'Plz Select One Image',

    	]);

    	$image = $request->file('image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/about/'.$name_gen);
    	$save_url = 'upload/about/'.$name_gen;

	About::insert([
        'title' => $request->title,
		'description' => $request->description,
		'image' => $save_url,

    	]);

	    $notification = array(
			'message' => 'About Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method

    public function AboutEdit($id){
        $abouts = About::findOrFail($id);
            return view('backend.about.about_edit',compact('abouts'));
        }
    
    
    public function AboutUpdate(Request $request){
    
            $about_id = $request->id;
            $old_img = $request->old_image;
    
            if ($request->file('image')) {
    
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/about/'.$name_gen);
            $save_url = 'upload/about/'.$name_gen;
    
        About::findOrFail($about_id)->update([
            'description' => $request->description,
            'image' => $save_url,
    
            ]);
    
            $notification = array(
                'message' => 'About Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('about')->with($notification);
    
            }else{
    
            About::findOrFail($about_id)->update([
            
            'description' => $request->description,
    
    
            ]);
    
            $notification = array(
                'message' => 'About Updated Without Image Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('manage-about')->with($notification);
    
            } // end else 
        } // end method 
    
        public function AboutDelete($id){
            $about = About::findOrFail($id);
            $img = $about->image;
            unlink($img);
            About::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'About Delectd Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
    
        } // end method
}
