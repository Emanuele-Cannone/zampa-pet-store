<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Customer;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(){
        $animals = Animal::orderBy('created_at','DESC')->with('customer')->get();
        return view('animal.index',compact('animals'));
    }

    public function create(){
        $customers = Customer::orderBy('name')->get();
        return view('animal.create',compact('customers'));
    }

    public function edit(Animal $animal){
        $customers = Customer::orderBy('name')->get();
        return view('animal.edit', compact('customers','animal'));
    }

    public function store(Request $request){
        $data = $request->all();
        Animal::create($data);
        return redirect()->route('animals.index');
    }

    public function update(Request $request, Animal $animal){
        $data = $request->all();
        $animal->update($data);
        return redirect()->route('animals.index');
    }

    public function destroy(Animal $animal){
        $animal->delete();
        return response()->json('ok',200);
    }
}
