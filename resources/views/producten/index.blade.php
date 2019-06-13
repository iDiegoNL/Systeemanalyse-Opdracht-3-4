@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                     alt="{{ $product->naam }}"
                                     style="height: 225px; width: 100%; display: block;"
                                     src="{{ asset('img/gift.svg') }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->naam }}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="btn btn-outline-primary" href="{{ route('producten.show', $product->id) }}">Bekijken</a>
                                        <small class="text-muted">&euro; {{ $product->prijs }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @empty(json_decode($products, true))
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                     alt="Geen producten gevonden"
                                     style="height: 225px; width: 100%; display: block;"
                                     src="{{ asset('img/no_data.svg') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Geen producten gevonden</h5>
                                    <p class="card-text">
                                        Er zijn nog geen producten toegevoegd aan de database.
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="btn btn-outline-primary" href="{{ route('producten.create') }}">Producten
                                            Toevoegen</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
