<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Payments;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller {
	//
	//
	public function __construct() {
		$this->middleware('auth');
	}

	public function home() {
		return view('home');
	}

	public function logout() {
		Auth::logout();
		return redirect()->route('index');
	}

	public function showProfile() {

		$user = Auth::user();
		return view('profile', compact('user'));
	}

	public function updateProfile(Request $request) {
		$this->validate($request, [
			'photograph' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
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

		if ($request->hasfile('photograph')) {

			$image = $request->file('photograph');
			$name = $image->getClientOriginalName();
			$new_image_name = time() . '-driver-' . $name;

			$image->move(public_path() . '/images/', $new_image_name);
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
		$user->is_updated = 1;

		$user->save();
		$request->session()->flash('success_message', "The driver information has been updated Successfully!");
		return redirect()->back();
	}

	public function showPayments() {
		return view('payments');
	}

	public function postPayments(Request $request) {

		$this->validate($request, [
			'amount' => 'required',
			'type' => 'required',
			'comments' => 'required',
			'card_no' => 'required',
			'cvv' => 'required',
			'pin' => 'required',
		]);
		// return "ready to post";

		$user = Auth::user();
		if ($user) {
			$payment = new Payments();
			$payment->user_id = $user->id;
			$payment->amount = $request->amount;
			$payment->type = $request->type;
			$payment->comments = $request->comments;
			$payment->save();

			$request->session()->flash('success_message', 'Payment has been made successfully!');
			return redirect()->back();
		}
	}

	public function showPaymentsHistory() {
		$payments = Payments::where('user_id', Auth::id())->get();
		return $payments;
	}
}
