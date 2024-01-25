<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Http\Controllers;

use App\Models\application;
use Illuminate\Http\Request;
use App\Models\booth;
use App\Models\rental;


class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // dd(122);
        if(auth()->User()->role === 'admin') {
            $rentals = rental::all()->count();
            $application = application::where('status','received')->count();
            $booths = booth::where ('status', 'Available')->get()->count();
            $datas = [
                'rentals' => $rentals,
                'applications' => $application,
                'booths' => $booths
            ];
            
            return view('ManageUser.dashboard',compact('datas'));
            
        } else{
            return redirect(route('booth.show'));
        }
    }
}
