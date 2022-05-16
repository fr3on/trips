<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
use App\Models\Programs;
use App\Models\Trips;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trips::orderBy('id', 'desc')
            ->paginate(10);

        $data = [
            'pageTitle' => 'Trips list',
            'trips' => $trips
        ];

        return view('admin.trips.lists', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pageTitle' => 'Create new trip',
        ];

        return view('admin.trips.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'category_id' => 'required',
            'galleries' => 'required',
            'programs' => 'required',
            'adult_price' => 'required'
        ]);

        $trip = Trips::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'adult_price' => $request->input('adult_price'),
            'child_price' => $request->input('child_price')
        ]);

        $this->setGallery($trip, $request->get('galleries'));
        $this->setPrograms($trip, $request->get('programs'));

        return redirect('/admin/trips');
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
        $trip = Trips::findOrFail($id);

        $data = [
            'pageTitle' => 'Edit trip',
            'trip' => $trip,
        ];

        return view('admin.trips.create', $data);
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
        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'category_id' => 'required',
            'galleries' => 'required',
            'programs' => 'required',
            'adult_price' => 'required'
        ]);

        $trip = Trips::findOrFail($id);
        $trip->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'adult_price' => $request->input('adult_price'),
            'child_price' => $request->input('child_price')
        ]);

        $this->setGallery($trip, $request->get('galleries'));
        $this->setPrograms($trip, $request->get('programs'));

        return redirect('/admin/trips');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trips::where('id', $id)->first();

        if (!empty($trip)) {
            Programs::where('trip_id', $trip->id)
                ->delete();

            $trip->delete();
        }
        return redirect('/admin/trips');
    }

    public function setGallery(Trips $trip, $galleries)
    {
        if (!empty($galleries) and count($galleries)) {
            // Remove old data
            Galleries::where([
                'trip_id' => $trip->id,
            ])->delete();

            foreach ($galleries as $key => $gallery) {
                Galleries::create([
                    'trip_id' => $trip->id,
                    'file' => $gallery,
                ]);
            }
        }
        return true;
    }

    public function setPrograms(Trips $trip, $programs)
    {
        if (!empty($programs) and count($programs)) {
            // Remove old data
            Programs::where([
                'trip_id' => $trip->id,
            ])->delete();

            foreach ($programs as $key => $program) {
                Programs::create([
                    'trip_id' => $trip->id,
                    'title' => $program['title'],
                    'description' => $program['description'],
                ]);
            }
        }
        return true;
    }
}
