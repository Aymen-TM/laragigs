<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
       
        return view('listings.index',[
            "listings"=>Listing::latest()->filter(request(['tag','search']))->paginate(4)
        ]);
    }
    //show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            "listings"=>$listing
        ]);
    }

    //create single listing
    public function create(){
        return view('listings.create');
    }
        //store listing data
    public function store(Request $request){
       
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique("listings",'company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags' =>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('logo')){
            $formFields["logo"] = $request->file('logo')->store('logos','public');
        }
        Listing::create($formFields );

        return redirect('/')->with('message','Listing created successfuly!');
        }


    //edit listing data
    public function edit(Listing $listing){
        return view('listings.edit',[
            "listing"=>$listing
        ]);
    }

       //update listing data
       public function update(Request $request,Listing $listing){
       
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags' =>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('logo')){
            $formFields["logo"] = $request->file('logo')->store('logos','public');
        }
        $listing->create($formFields);

        return back()->with('message','Listing updated successfuly!');
        }

        //update listing data
       public function destroy(Request $request,Listing $listing){
       
        $listing->delete();

        return redirect('/')->with('message','Listing deleted successfuly!');
        }
}
