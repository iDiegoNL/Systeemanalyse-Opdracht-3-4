@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="text-center">
                    <h1 class="display-4 font-weight-normal">
                        Beheerderspaneel
                    </h1>
                    <p class="lead font-weight-normal">
                        Kies een van de onderstaande acties om verder te gaan.
                    </p>
                </div>
                <div class="row">
                    <!-- Product Toevoegen -->
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 alt="Geen producten gevonden"
                                 style="height: 225px; width: 100%; display: block;"
                                 src="{{ asset('img/add_file.svg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Product Toevoegen</h5>
                                <p class="card-text">
                                    Voeg een nieuw product toe aan de database.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-outline-primary" href="{{ route('producten.create') }}">
                                        Producten Toevoegen
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Aanpassen -->
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 alt="Geen producten gevonden"
                                 style="height: 225px; width: 100%; display: block;"
                                 src="{{ asset('img/typewriter.svg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Product Aanpassen</h5>
                                <p class="card-text">
                                    Pas een bestaand product uit de database aan.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-outline-primary" type="button" data-toggle="modal"
                                            data-target="#selectProductModal">
                                        Product Selecteren
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Producten Bekijken -->
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 alt="Geen producten gevonden"
                                 style="height: 225px; width: 100%; display: block;"
                                 src="{{ asset('img/add_to_cart.svg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Producten Bekijken</h5>
                                <p class="card-text">
                                    Bekijk alle bestaande producten in de database.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-outline-primary" href="{{ route('producten.index') }}">
                                        Producten Bekijken
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="selectProductModal" tabindex="-1" role="dialog"
         aria-labelledby="selectProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selectProductModalLabel">Selecteer het product dat u aan wilt
                        passen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        @foreach(\App\Product::all() as $product)
                            <a href="{{ route('admin.edit', $product->id) }}" class="list-group-item list-group-item-action">{{ $product->naam }}</a>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Terug</button>
                </div>
            </div>
        </div>
    </div>
@endsection
