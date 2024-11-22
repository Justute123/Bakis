<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kMedoidsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filePath1 = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//medoids.csv";
        $contentMedoids = file_get_contents($filePath1);
        $filePath2 = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//clusteringMedoid.csv";
        $contentClusters = file_get_contents($filePath2);
;
        return view('pages/kMedoids', ['contentMedoids' => $contentMedoids,'contentClusters' => $contentClusters]);
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
            'clusters' => 'required|numeric',
            'metric' => 'required',
            'method' => 'required',

        ], [
            'file.required' => 'The file is required.',
            'clusters.required' => 'The number of clusters is required.',
            'clusters.numeric' => 'The number of clusters should be number',
            'metric.required' => 'The metric is required.',
            'method.required' => 'The method is required.',


        ]);

        $file = $request->file('file');
        $clusters = $request->input('clusters');
        $metric = $request->input('metric');
        $method= $request->input('method');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('storage', $fileName, 'public');
        $filePath = storage_path('app/public/storage/' . $fileName);
        $errors = storage_path('logs/Rscripterror.log');



        $command = 'Rscript C://xampp//htdocs//Bakis//applicationClusterStudies//resources//views//pages//kMedoidsCode.R ' . escapeshellarg($filePath) . ' ' . escapeshellarg($clusters) . ' ' . escapeshellarg($metric). ' ' . escapeshellarg($method). ' 2> ' . escapeshellarg($errors);;
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
