<?php

namespace App\Http\Controllers;

use App\Edition;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\AddEdtitionRequest;

class EditionsController extends Controller
{
    /**
     * Display a listing of editions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editions = Edition::where('featured', false)->orderBy('release_date', 'desc')->get();
        $featured = Edition::featured();
        return view('editions.index', compact('editions', 'featured'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return app()->abort(404);
        return view('editions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEdtitionRequest $request)
    {
        $year = Carbon::parse($request->release_date)->format('Y');
        $month = Carbon::parse($request->release_date)->format('F');

        // File Base Dir
        $baseDir = "uploads/editions/";

        // Files
        $cover = $month . '-' . $year . '-' . str_random(9) . '.' . $request->file('cover')->getClientOriginalExtension();
        $featured = $month . '-' . $year . '-' . str_random(9) . '.' . $request->file('featured')->getClientOriginalExtension();
        $online = $month . '-' . $year . '-' . str_random(9) . '.' . $request->file('online')->getClientOriginalExtension();
        $pdf = $month . '-' . $year . '-' . str_random(9) . '.' . $request->file('pdf')->getClientOriginalExtension();

        // Upload Files to S3
        $request->file('cover')->move($baseDir, $cover);
        $request->file('featured')->move($baseDir, $featured);
        $request->file('online')->move($baseDir, $online);
        $request->file('pdf')->move($baseDir, $pdf);

        // Create the new Edition in Datase

        // Clear Old Featured
        $currentFeature = Edition::where('featured', true)->first();
        if ($currentFeature) {
            $currentFeature->featured = false;
            $currentFeature->save();
        }

        // Create new Edition
        Edition::create([
            'release_date' => Carbon::parse($request->release_date),
            'name' => $request->name,
            'description' => $request->description,
            'cover_img' => '/'. $baseDir . $cover,
            'featured_img' => '/'. $baseDir . $featured,
            'online' => '/'. $baseDir . $online,
            'pdf' => '/'. $baseDir . $pdf,
            'featured' => true
        ]);
    }

    public function getRead($id)
    {
         $edition = Edition::find($id);
         return view('editions.read', compact('edition'));
    }

    public function getDownload($id)
    {
        $edition = Edition::find($id);
        $headers = ['Content-Type: application/pdf'];
        return Response::download(public_path() . $edition->pdf, $edition->name . '.pdf', $headers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
