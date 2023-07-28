<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    public function store()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'fathername' => 'required',
            'address' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'description' => 'required',
            'image' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);
        $register = new User();
        $register->firstname = $request['firstname'];
        $register->lastname = $request['lastname'];
        $register->fathername = $request['fathername'];
        $register->email = $request['email'];
        $register->address = $request['address'];
        $register->mobile = $request['mobile'];
        $register->description = $request['description'];
        $data = $request->all();
        $img = array();
        for ($i = 0; $i < count($data['image']); $i++) {
            $imageName = time() . '.' . $data['image'][$i]->getClientOriginalName();
            $data['image'][$i]->move(public_path('images'), $imageName);
            array_push($img, $imageName);
        }
        $data1 = array(
            'image' =>  implode(",", $img),
        );
        $register->image = $data1['image'];
        $register->password = Hash::make($request['password']);
        $register->save();
        session()->flash(
            'message',
            'New Employee is Created'
        );
        return redirect('/register');
    }
}
