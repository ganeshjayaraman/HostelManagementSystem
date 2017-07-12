<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use DB;
use Carbon;
use App\User;
use App\students_room_info;
use App\rooms_info;
use App\mess;
use Excel;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
			$student_id = \Auth::user()->id;
			$get = students_room_info::where('student_id', $student_id)->get()[0];
			$get_info = rooms_info::where('id',$get->room_id)->get()[0];
			
			return view("students_room_info",compact("get","get_info"));
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
		
		 $path = 'C:\wamp\www\hostel\python\knn.py';
		 system('python '. $path, $output);
							
			$data = \Excel::load('C:\wamp\www\hostel\python\MainHostelAllot.csv', function($reader) {
			})->get();
			
			if(!empty($data) && $data->count()){				
				foreach ($data as $key => $value) {
					$count  = 0;
					foreach($value as $k => $v) {																							
						if(!($count)) {
							$room_id = (int)$v+1;
							$count++;
						}
						else {
							$id = (int)$v;		
							if($id > 0)
								$insert[] = ['student_id' => $id, 'room_id' => $room_id];
						}
					}
					
					students_room_info::insert($insert);
					$insert = [];
				}				
			}
				 		 
		return view("home")->with("errors","alloted successfully");
	}
	
	public function mess_allotment() {
		$mess = mess::select('id')->get();		
		return view("messsite",compact("mess"));
	}
}
