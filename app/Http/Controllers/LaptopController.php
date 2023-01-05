<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class LaptopController extends Controller
{
    public function cart(Laptop $laptop){
        $laptopCart=null;
        if(Auth::check()){
            $laptopCart = Auth::user()->laptopsCart()->where('in_cart', true)->get();
        }

        return view('laptops.cart',['laptopCart'=>$laptopCart, 'laptop'=>$laptop]);
    }
    public function addcart(Request $request, Laptop $laptop){
        $request->validate([
            'quantity' => 'required',
            'ram'=>'required',
            'memory'=>'required',
        ]);

        $laptopCart = Auth::user()->laptopsCart()->where('laptop_id', $laptop->id)->first();
        if($laptopCart!=null){
        Auth::user()->laptopsCart()->updateExistingPivot($laptop->id, ['quantity'=>$request->input('quantity'),'ram'=>$request->input('ram'),'memory'=>$request->input('memory')]);
        return back()->with('message', 'Cart updated successfully');
        }else{
            Auth::user()->laptopsCart()->attach($laptop->id, ['quantity'=>$request->input('quantity'),'ram'=>$request->input('ram'),'memory'=>$request->input('memory')]);
            return back()->with('message', 'laptop added to cart successfully');
        }
    }

    public function uncart(Laptop $laptop){
        $laptopCart = Auth::user()->laptopsCart()->where('laptop_id', $laptop->id)->first();
        if($laptopCart != null){
            Auth::user()->laptopsCart()->detach($laptop->id);
            $laptop->usersCart()->detach();
        }
        return back()->with('message', 'laptop deleted from cart successfully');
    }


    public function laptopsByCategory(Category $category)
    {
        $laptops = $category->laptops;
        return view('laptops.index', ['allLaptops' => $laptops, 'categories'=>Category::all()]);
    }
    public function index()
    {
        $allLaptops = Laptop::all();
        return view('laptops.index', ['allLaptops' => $allLaptops, 'categories'=>Category::all()]);
    }

    public function create()
    {
        $this->authorize('create', Laptop::class);
        return view('laptops.create', ['categories'=>Category::all()]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Laptop::class);
        $validated=$request->validate([
            'name'=>'required|max:255',
            'price'=>'required',
            'ram'=>'required',
            'memory'=>'required',
            'cpu'=>'required',
            'image'=>'required',
            'category_id'=>'required|numeric|exists:categories,id',
        ]);

        Laptop::create($validated);
        return redirect()->route('laptops.index')->with('message', 'laptop saved successfully!');
    }

    public function show(Laptop $laptop)
    {
        $laptop->load('comments.user');
        return view('laptops.show',['laptop'=>$laptop, 'categories'=> Category::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit(Laptop $laptop)
    {
        $this->authorize('update', $laptop);
        return view('laptops.edit',['laptop'=>$laptop, 'categories'=> Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laptop $laptop)
    {
        $laptop->update([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'ram'=>$request->input('ram'),
            'memory'=>$request->input('memory'),
            'cpu'=>$request->input('cpu'),
            'image'=>$request->input('image'),
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('laptops.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laptop $laptop)
    {
        $this->authorize('delete', $laptop);
        $laptop->delete();
        return redirect()->route('laptops.index');
    }
}
