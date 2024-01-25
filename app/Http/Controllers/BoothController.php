<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Http\Controllers;
use App\Models\booth;
use App\Models\rental;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BoothController extends Controller
{
    public function show(){
        $dataRentals = rental::where ("vendor_ID",['vendor_ID' => auth()->user()->vendor->vendor_ID])->first();
        return view('ManageBooth.vendorView',['dataRentals'=>$dataRentals]);
        // dd($dataRentals);
    }

    public function indexAdmin() {
        $dataRentals = rental::all();
        return view('ManageBooth.adminView',['dataRentals'=>$dataRentals]);
    }

    public function delete(Request $request, $id){
        $dataRental = rental::find($id);
        // dd($dataRental);
        DB::table('booths')
        ->where('booth_ID', $dataRental->booth_ID)
        ->update(['status' => 'Available']);
        $dataRental -> delete($dataRental);

        return redirect(route('booth.indexAdmin'));
    }
}
