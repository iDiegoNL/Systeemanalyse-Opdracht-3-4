<?php

namespace App\Http\Controllers;

use App\Beoordeling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeoordelingController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'beoordeling' => 'required',
        ]);

        $beoordeling = Beoordeling::create([
            'beoordeling' => $request->beoordeling,
            'gebruiker_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return redirect(route('producten.show', $beoordeling->product_id));
    }
}
