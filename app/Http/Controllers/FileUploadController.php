<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DisbursementImport;
use App\Models\ExcelData;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function view()
    {
        return view('excel.upload-excel');
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        $path = $request->file('file')->store('temp');
        $file = storage_path('app/' . $path);
        $data = Excel::toArray(new DisbursementImport(Auth::id(), ''), $file);

        $fileName = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
        $uniqueFileName = $fileName . '%' . Carbon::now()->format('Ymd_His') . '.xlsx';

        return view('excel.preview-excel', compact('data', 'file', 'uniqueFileName'));
    }

    public function storeExcel(Request $request)
    {
        $file = $request->input('file');
        $fileName = $request->input('file_name');
        $userId = Auth::id();

        Excel::import(new DisbursementImport($userId, $fileName), $file);

        Storage::delete('temp/' . basename($file));

        return redirect()->back()->with('success', 'Excel data uploaded successfully!');
    }

    public function userExcelData()
    {
        $userId = Auth::id();
        $data = ExcelData::where('user_id', $userId)->get()->groupBy('file_name');

        return view('excel.user-excel-data', compact('data'));
    }
}
