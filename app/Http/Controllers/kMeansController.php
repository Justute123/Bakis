<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kMeansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filePath1 = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//cluster.csv";
        $contentCluster = file_get_contents($filePath1);
        $filePath2 = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//Size.csv";
        $contentSize = file_get_contents($filePath2);
        $filePath3 = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//clusterCenters.csv";
        $contentMeans = file_get_contents($filePath3);
        return view('pages/kMeans', ['contentCluster' => $contentCluster,'contentSize' => $contentSize,'contentMeans' => $contentMeans]);

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
            'centers' => 'required|numeric',
            'startNr' => 'required|numeric',
            'maxIterations' => 'required|numeric',
            'method' => 'required',
        ], [
            'file.required' => 'The file is required.',
            'centers.required' => 'The number of centers is required.',
            'startNr.required' => 'The number of startNr is required.',
            'maxIterations.required' => 'The number of max iterations is required.',
            'centers.numeric' => 'The number of centers should be number.',
            'startNr.numeric' => 'The number of startNr should be number.',
            'maxIterations.numeric' => 'The number of max iterations should be number.',
            'method.required' => 'The method is required.',

        ]);

        $file = $request->file('file');
        $centers = $request->input('centers');
        $startNr = $request->input('startNr');
        $maxIterations = $request->input('maxIterations');
        $method = $request->input('method');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('storage', $fileName, 'public');
        $filePath = storage_path('app/public/storage/' . $fileName);
        $errors = storage_path('logs/Rscripterror.log');



        $command = 'Rscript C://xampp//htdocs//Bakis//applicationClusterStudies//resources//views//pages//kMeansCode.R ' . escapeshellarg($filePath) . ' ' . escapeshellarg($centers) . ' ' . escapeshellarg($startNr). ' ' . escapeshellarg($maxIterations). ' ' . escapeshellarg($method). ' 2> ' . escapeshellarg($errors);;
        $output = [];
        $exitCode = 0;
        exec($command, $output, $exitCode);

        if ($exitCode !== 0) {
            $error = file_get_contents($errors);

            return redirect()->back()->with('error', 'Error while loading R script: '. $error);
        }



        return redirect()->back()->with('success', 'file upploaded successfully!');


    }
}
