<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
class PdfController extends Controller
{  
 
    public function index(){
		
		//Storage::disk('public')->makeDirectory('fonts',0777,true,true);
		//File::makeDirectory($path, 0777, true, true);
		//mkdir('my');
		/*$entries = scandir(getcwd());
		foreach($entries as $entry){
	   if("." !=$entry && ".." !=$entry){
		if(is_dir($entry)){
			echo "[d] {$entry}<br>";
		}else{
			echo "[f] {$entry}<br>";
		}
	}
}*/
		//dump('hi');
		$users = User::get();
		//dd($users->name);
		//$usr = $users->toArray();
		//dd($usr[0]['name']);
		$dat=[];
		foreach($users as $user){
			$dat['name']=$user->name;
			$dat['email']=$user->email;
			
		}
		dd($dat);
		 /* $data = [
            //'title' => 'Welcome to ItSolutionStuff.com',
            //'date' => date('m/d/Y'),
            'users' => $users
        ];*/
		//$pdf = PDF::loadView('myPdf', $data);
		
		
		//return $pdf->download('user.pdf');*/
		/*return view('myPdf')->with([
		  'users'=>'hi'
		]);*/
		/* $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();*/
	

	    //$data["title"] = "From ItSolutionStuff.com";
       // $data["body"] = "This is Demo";
	     $pdf = PDF::loadView('myPdf', $dat);
		 
	return $pdf->download('myPdf.pdf');
	//dd($data);
	 //$pdf = Pdf::loadView('myPdf',$name);
	 //return view('mypdf')->with(['name'=>$name]);
	//$pdf = Pdf::loadView('myPdf',['name'=>$name,'email'=>$email]);
	  // var_dump($pdf);
	    //$myArray = json_decode(json_encode($pdf), true);
		//print_r($myArray);
    
    //return $pdf;
	
	}
	public function pdf(Request $request){
		$users = DB::table('users')->get();
		 view()->share('users',$users);
		 if($request->has('download')){
            $pdf = PDF::loadView('pdftest');
            return $pdf->download('pdftest.pdf');
        }
		return view('pdftest');
		
		
	}
	 
	
}
