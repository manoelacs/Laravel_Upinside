<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PropertyController extends Controller
{

    public function index()
    {
        $properties =  Property::all();
        //var_dump($properties);
        return view('property.index', compact('properties'));

    }

    public function show($name)
    {
        $property = Property::where('name', $name)->get();
        if (!empty($property)){
            return redirect()->route('', compact('property') );
        }
        else{
            return redirect()->action('PropertyController@index');
        }

    }


    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->title);
        if(Property::where('uri', $slug)->exists())
        {
            $slug = $slug . '-1';
        }

        $imovel = [
            'title'       =>  $request->title,
            'description' =>  $request->description,
            'rental_price'=>  $request->rental_price,
            'sale_price'  =>  $request->sale_price,
             'uri'        =>  $slug
        ];
        $createImovel = Property::create($imovel);  // outra opção  $createData = Property::create(all())

       // Property::save($createImovel);

        return redirect()->route('properties.index');


    }
    public function edit($url)
    {
        $property = Property::findOrFail($url);
        return view('property.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $slug = Str::slug($request->title);
        if(Property::where('uri', $slug)->exists())
        {
            $slug = $slug . '-1';
        }
        if ((Property::were('id', $property->id))->exists())
        {
            $property->title = $request->title;
            $property->description = $request->description;
            $property->rental_price = $request->rental_price;
            $property->sale_price = $request->sale_price;
            $property->save();
        }

        return redirect()->route('properties.index');
    }

    public function delete($id)
    {
        Property::destroy($id);
        return redirect()->route('properties.index');

    }
}
