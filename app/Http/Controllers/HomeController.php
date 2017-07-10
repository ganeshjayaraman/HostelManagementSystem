<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use DB;
use Carbon;
use App\User;
use App\mess;
use Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {		
	
        return view('home');
    }
	
	public function room_allotment() {
			$user = User::get();
			dd($user);
	}
	
	public function room_allocate() {
			$user = User::select('id','dept','city')->where('isadmin','0')->get();			
			$userlist = $user->toArray();
            				
			\Excel::create(" stduent_list", function($excel) use($userlist) {
		
			$getdata = [];
		
			$getdata[] = ['id', 'department','place','xlid'];
			$c = -1;
			foreach($userlist as $g){
				$c = $c+1;				
				$g['xlid'] = (string)$c;
				$getdata[] = (array)$g;
				
			}			
						
			$excel->sheet('Sheet', function($sheet) use($getdata){

				$sheet->fromArray($getdata, null, 'A1', false, false);

			});

		})->download('csv');
		
		return view("home")->with("errors","exported successfully");
	}
	
	public function get_room_allocation() {
		
		 $data_list = exec('python c:/wamp/www/python/knn1.py');
		 
		 dd($data_list);		 
	}
	
	public function mess_allotment() {
		$mess = mess::select('id')->get();		
		return view("messsite",compact("mess"));
	}
}
