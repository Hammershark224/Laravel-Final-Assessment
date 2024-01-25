<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\vendor;
use App\Models\application;
use App\Models\booth;
use App\Models\rental;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $vendor = vendor::where('vendor_ID', auth()->user()->vendor->vendor_ID)->first();
        $applications = \App\Models\application::where('vendor_ID', $vendor['vendor_ID'])->get();
        return view('ManageApplication.applicationManage', ['applications' => $applications]);
    }

    public function indexAdmin()
    {
        $applications = application::all();
        // $applications = application::whereIn('status', ['received', 'on review'])->get();
        return view('ManageApplication.adminManage', ['applications' => $applications]);
    }

    public function create()
    {
        return view('ManageApplication.createApplication');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = null;

        if ($file) {
            // Use the original name of the uploaded file
            $fileName = $file->getClientOriginalName();

            Storage::disk('local')->makeDirectory('documents');

            Storage::disk('local')->put('documents/' . $fileName, file_get_contents($file->getRealPath()));
        }

        $user = auth()->user();
        $vendor = vendor::where('user_ID', $user['user_ID'])->first();

        $validatedData = $request->validate([
            'description' => 'required|string',
        ]);

        $applicationData = array_merge($validatedData, [
            'vendor_ID' => $vendor['vendor_ID'],
            'status' => 'received',
            'SSM' => $fileName,
        ]);

        application::create($applicationData);

        return redirect(route('application.manage'));
    }

    public function displayFile($fileName)
    {
        $filePath = 'documents/' . $fileName;

        if (!Storage::disk('local')->exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $file = Storage::disk('local')->get($filePath);
        $mimeType = Storage::disk('local')->mimeType($filePath);

        return response($file, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $fileName . '"',
        ]);
    }

    public function show($id)
    {
        $applications = application::find($id);
        return view('ManageApplication.applicationView', ['applications' => $applications]);
    }
    
    public function adminEdit($id)
    {
        $applications = application::find($id);
        // dd($applications);
        if ($applications->status == 'accepted') {
            return redirect()->route('application.adminManage')->with('error', 'accepted application cannot be edited');
        }
        else{
            $status = [
                'status' => 'on review'
            ];
            $booths = booth::where('status', 'Available')->get();
            $applications->update($status);
            return view('ManageApplication.adminEdit', compact('applications', 'booths'));

        }
    }

    public function adminUpdate(Request $request, $id)
    {
        $application = application::where('application_ID', $id)->first();


        if ($request->status === 'accepted') {
            $boothId = $request->booth_ID;
            $rental = rental::where('vendor_ID', $application->vendor_ID)->get()->count();
            if ($rental < 1) {

                // Update the selected booth's status to 'Unavailable'
                $application->update($request->all());
                DB::table('booths')
                    ->where('booth_ID', $boothId)
                    ->where('status', 'Available')
                    ->update(['status' => 'Unavailable']);

                $rentalData = [
                    'vendor_ID' => $application->vendor_ID, // Replace with the actual column name
                    'booth_ID' => $boothId,
                    // Add other columns and values as needed
                ];

                rental::create($rentalData);
            } else {

                $application->status = 'rejected';
                $application->save();
                return redirect()->route('application.adminManage')->with('error', 'applicant already have on going rental.');
            }
        } else {

            $application->update($request->all());
        }
        $application->save();

        return redirect(route('application.adminManage'));
    }
}
