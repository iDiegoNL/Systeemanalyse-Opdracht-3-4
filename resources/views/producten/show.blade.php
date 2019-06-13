@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-10 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">{{ $product->naam }}</h1>
                <p class="lead font-weight-normal">{{ $product->beschrijving }}</p>
            </div>

            <div class="beoordelingen">
                <h2 class="display-6 font-weight-normal">Beoordelingen
                    <small class="text-muted">{{ count($beoordelingen) }} beoordelingen</small>
                </h2>
                <hr>
                <div>
                    @foreach($beoordelingen as $beoordeling)
                        <h5 class="mb-1">{{ \App\User::find($beoordeling->gebruiker_id)->value('name') }}</h5>
                        <span>{{ $beoordeling->beoordeling }}</span>
                    @endforeach
                </div>
                <br>
                <h2 class="display-6 font-weight-normal">Uw beoordeling</h2>
                <form method="post" action="{{ route('beoordelingen.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="beoordeling">Wat vindt u van dit product?</label>
                        <textarea class="form-control" id="beoordeling" name="beoordeling" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Beoordeling Toevoegen</button>
                </form>
            </div>

        </div>
    </div>
@endsection
