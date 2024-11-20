<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class aglomerativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $filePath = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//writenData2.csv";
        $content = file_get_contents($filePath);
            return view('pages/hierarchy', ['content' => $content]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'dist_method' => 'required',
            'aglo_method' => 'required',
        ], [
            'file.required' => 'The file is required.',
            'dist_method.required' => 'distance method is required.',
            'aglo_method.required' => 'agglomeration method required.',

        ]);

        $file = $request->file('file');
        $distMethod = $request->input('dist_method');
        $agloMethod = $request->input('aglo_method');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('storage', $fileName, 'public');
        $filePath = storage_path('app/public/storage/' . $fileName);



    $command = 'Rscript C://xampp//htdocs//Bakis//applicationClusterStudies//resources//views//pages//sample.R ' . escapeshellarg($filePath) . ' ' . escapeshellarg($distMethod) . ' ' . escapeshellarg($agloMethod);
        exec($command);



    return redirect()->back()->with('success', 'file upploaded successfully!');


    }
}