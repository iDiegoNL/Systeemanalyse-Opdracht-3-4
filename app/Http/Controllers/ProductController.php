<?php

namespace App\Http\Controllers;

use App\Beoordeling;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('producten.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'aantal' => 'required|digits_between:1,999',
        ]);

        $x = 0;
        while ($x < $request->aantal) {
            $product = Product::create([
                'naam' => uniqid('Testproduct-'),
                'beschrijving' => uniqid('Testbeschrijving-'),
                'prijs' => rand(1.0, 10.9)
            ]);
            $x++;
        }

        return redirect(route('producten.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        $product = Product::find($product);
        $beoordelingen = Beoordeling::where('product_id', $product->id)->get();

        return view('producten.show', ['product' => $product, 'beoordelingen' => $beoordelingen]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.edit', ['product' => $product]);
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
        $request->validate([
            'naam' => 'required',
            'beschrijving' => 'required',
            'prijs' => 'required|numeric',
        ]);

        $product = Product::find($id);

        $product->naam = $request->naam;
        $product->beschrijving = $request->beschrijving;
        $product->prijs = $request->prijs;

        $product->save();

        return redirect(route('admin.actions'));
    }
}
