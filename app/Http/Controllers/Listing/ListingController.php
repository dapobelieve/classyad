<?php

namespace App\Http\Controllers\Listing;

use App\{Area, Category, Listing};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index (Area $area, Category $category)
    {
        $listings = Listing::with('user', 'category', 'area')->isLive()->inArea($area)->fromCategory($category)->latestFirst()->paginate(10);

        return view('listing.index')->with('listings', $listings)
                                    ->with('category', $category);
    }

    public function show (Request $request, Area $area, Listing $listing)
    {

        if (!$listing->live()){
            abort(404);
        }

        // $listing = $listing->with('user', 'area')->get();

        return view('listing.show', compact('listing'));
    }
}
