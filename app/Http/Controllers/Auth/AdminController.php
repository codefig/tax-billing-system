<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    //
    public function __construct(){
        $this->middleware('auth:admin');
        
    }

    public function index(){
        return "this is the index url ";
    }
    public function showHome(){
        // echo "This is the admin home";
        return view('admin.index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function showAddDriver(Request $request){
        return view('admin.adddriver');
    }

    public function postAddDriver(Request $request){

        $this->validate($request, [
            'photograph' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'owners_name' => 'required', 
            'drivers_name' => 'required',
            'engine_no' => 'required', 
            'plate_no' =>  'required',
            'chassis_no' => 'required', 
            'licence_no' => 'required', 
            'car_description' => 'required', 
            'mobile_no' => 'required', 
            'nationality' => 'required',
            'state' => 'required',
            'lga' => 'required', 
        ]);

        if($request->hasfile('photograph')){
            

            $image = $request->file('photograph');
            $name = $image->getClientOriginalName();
            $new_image_name = time() . '-driver-'. $name;

            $image->move(public_path(). '/images/', $new_image_name);
            //Image was uploaded successfully. 

            $user = new User();
            $user->photograph = $new_image_name;
            $user->owners_name = $request->owners_name;
            $user->drivers_name = $request->drivers_name;
            $user->engine_no = $request->engine_no;
            $user->plate_no = $request->plate_no;
            $user->chassis_no = $request->chassis_no;
            $user->licence_no = $request->licence_no;
            $user->car_description = $request->car_description;
            $user->mobile_no = $request->mobile_no;
            $user->nationality = $request->nationality;
            $user->state = $request->state;
            $user->lga = $request->lga;
            $user->password = "";

            $user->save();
            $request->session()->flash('success_message', "The driver information has been added Successfully!");
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        

    }

    public function showUpdateDriver(){
        return view('admin.updatedriver');
    }
    
    public function searchDriver(Request $request){
            // return "this is the search driver function";
            $this->validate($request, [
                'plate_no' => 'required'
            ]);

            $user = User::where('plate_no', $request->plate_no)->get();
            if(count($user) > 0){
                return view('admin.showdriver', compact('user'));
            }else{
                Session::flash('error_message', "Sorry, no record found with that plate number");
                return redirect()->back();
            }
    }


    public function updateDriver(Request $request){
        // return "this is the update driver function";
        $this->validate($request, [
            'owners_name' => 'required', 
            'drivers_name' => 'required',
            'engine_no' => 'required', 
            'plate_no' => 'required',
            'chassis_no' => 'required', 
            'licence_no' => 'required', 
            'car_description' => 'required', 
            'mobile_no' => 'required', 
            'nationality' => 'required',
            'state' => 'required',
            'lga' => 'required', 
        ]);

        $user = User::find($request->_id);
        
        if($request->hasfile('photograph')){
    
            $image = $request->file('photograph');
            $name = $image->getClientOriginalName();
            $new_image_name = time() . '-driver-'. $name;

            $image->move(public_path(). '/images/', $new_image_name);
            $user->photograph = $new_image_name;

        }
            //Image was uploaded successfully. 
            $user->owners_name = $request->owners_name;
            $user->drivers_name = $request->drivers_name;
            $user->engine_no = $request->engine_no;
            $user->plate_no = $request->plate_no;
            $user->chassis_no = $request->chassis_no;
            $user->licence_no = $request->licence_no;
            $user->car_description = $request->car_description;
            $user->mobile_no = $request->mobile_no;
            $user->nationality = $request->nationality;
            $user->state = $request->state;
            $user->lga = $request->lga;
            $user->password = "";

            $user->save();
            $request->session()->flash('success_message', "The driver information has been updated Successfully!");
            return redirect()->route('admin.driver.showUpdate');
    }



    public function showPayments(){
        return view('admin.payments');
    }

    public function postPayments(Request $request) {
        return "this is the post payment function";
    }

    public function showPaymentHistory(){
        return view('admin.payment-history');
    }
}
