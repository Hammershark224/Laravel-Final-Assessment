<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\complaint;
use App\Models\vendor;


class ComplaintController extends Controller
{
    public function index() {
        $vendor = vendor::where('vendor_ID',auth()->user()->vendor->vendor_ID)->first();
        $complaint = \App\Models\complaint::where('vendor_ID', $vendor['vendor_ID'])->get();
        return view('ManageComplaint.complaintManage',['complaint'=>$complaint]);
    }

    public function indexAdmin() {
        $complaints = complaint::all();
        return view('ManageComplaint.adminIndex',['complaints'=>$complaints]);
    }

    public function create()
    {
        return view('ManageComplaint.createComplaint');
    }
    
    public function createComplaint(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'reply' => 'required|string',
        ]);
    
        $complaintData = array_merge($validatedData, ['vendor_ID' => auth()->user()->vendor->vendor_ID]);
    
        complaint::create($complaintData);
        return redirect(route('complaint.manage'));
    }

    public function show($id){
        $dataComplaints = complaint::find($id);
        return view('ManageComplaint.showComplaint',['dataComplaints'=>$dataComplaints]);
    }

    public function edit($id){
        $dataComplaints = complaint::find($id);
        return view('ManageComplaint.adminResponse',['dataComplaints'=>$dataComplaints]);
    }

    public function createResponse(Request $request, $id){
        $dataComplaints = complaint::find($id);
        $dataComplaints -> update($request->all());
        return redirect(route('response'));
    }

    public function delete(Request $request, $id){
        $dataComplaints = complaint::find($id);
        $dataComplaints -> delete($dataComplaints);
        return redirect(route('complaint.manage'));
    }

    public function adminDelete(Request $request, $id){
        $dataComplaints = complaint::find($id);
        $dataComplaints -> delete($dataComplaints);
        return redirect(route('response'));
    }
}
