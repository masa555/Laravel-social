<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use Auth;
use Validator;
use App\Card;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        if ($request->has('keyword')) {
            $listings = Listing::where('title', 'like', '%' . $request->get('keyword') . '%')->paginate(10);
        } else {
            $listings = Listing::paginate(10);
        }
        return view('listing/index', ['listings' => $listings]);
    }

    public function new()
    {
        return view('listing/new');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['list_name' => 'required|max:255',]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $listings = new Listing;
        $listings->title = $request->list_name;
        $listings->user_id = Auth::user()->id;

        $listings->save();
        return redirect('/');
    }
    public function edit($listing_id)
    {
        $listing = Listing::find($listing_id);
        return view('listing/edit', ['listing' => $listing]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['list_name' => 'required|max:255',]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $listing = Listing::find($request->id);
        $listing->title = $request->list_name;
        $listing->save();
        return redirect('/');
    }
    public function destroy($listing_id)
    {
        $listing = Listing::find($listing_id);
        $listing->delete();
        return redirect('/');
    }
}