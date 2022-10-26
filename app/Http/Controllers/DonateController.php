<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donate;

class DonateController extends Controller
{
    public function DonateView(){
		$donates = Donate::latest()->get();
		return view('backend.donate.donate_view',compact('donates'));
	}
    public function DonateStore(Request $request){

	Donate::insert([
		'title' => $request->title,
		'description' => $request->description,
    	]);

	    $notification = array(
			'message' => 'Donate Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method

    public function DonateEdit($id){
        $donates = Donate::findOrFail($id);
            return view('backend.donate.donate_edit',compact('donates'));
        }

    public function DonateUpdate(Request $request){
    
            $donate_id = $request->id;

        Donate::findOrFail($donate_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            
    
            ]);
    
            $notification = array(
                'message' => 'Donate Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('donate')->with($notification);
    
            
    
            
        } // end method 
    
        public function DonateDelete($id){
            $donate = Donate::findOrFail($id);
            
            Donate::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Donate Delectd Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
    
        } // end method
}
