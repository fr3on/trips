<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Trips;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function trips(){
        $categories = Category::orderBy('id', 'desc')->get();
        $trips = Trips::orderBy('id', 'desc')
            ->with(['category','galleries'])
            ->paginate(10);

        $data = [
            'pageTitle' => 'Trips list',
            'trips' => $trips,
            'categories' => $categories
        ];
        return view('pages.trips', $data);
    }
    public function trip($id){
        $trip = Trips::where('id', $id)->with(['category','programs','galleries'])->first();

        $data = [
            'pageTitle' => $trip->title,
            'trip' => $trip
        ];
        return view('pages.trip', $data);
    }
}
