<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',			
        ]);
    }
	
	protected function adminvalidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
			'city' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {				
		return User::create([
            'name' => $data['name'],
			'phone_no' => $data['phone_no'],			
			'dept' => $data['dept'],
			'year' => $data['year'],
			'address' => $data['address'],			
			'type' => $data['type'],
            'email' => $data['email'],
			'city' => $data['city'],
            'password' => bcrypt($data['password']),
        ]);
    }
	
	protected function createadmin(array $data)
    {
		
        return Admin::create([
            'name' => $data['name'],	
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
	
	public function admingetLogin() {
		return view('auth.adminlogin');
	}
	
	public function adminpostLogin(Request $request) {
		$admin = $request->all();
		
		//$admin['password'] = bcrypt($admin['password']);
		//dd($admin);
		$result = Admin::where('email', $admin['email'])->get();		
		$id = $result[0]->id;		
		
		dd(\Auth::login($result[0]));
	}
	
	
}
