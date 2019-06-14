@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-7 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">{{ $product->naam }} aanpassen</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('admin.update', $product->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="naam">Productnaam</label>
                        <input type="text" class="form-control" id="naam" name="naam" placeholder="Productnaam" value="{{ $product->naam }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="beschrijving">Beschrijving</label>
                        <textarea class="form-control" id="beschrijving" name="beschrijving"
                                  placeholder="Beschrijving" required>{{ $product->beschrijving }}</textarea>
                    </div>

                    <label for="prijs">Prijs</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="prijsAddon">&euro;</span>
                        </div>
                        <input type="text" class="form-control" id="prijs" name="prijs" placeholder="Prijs" value="{{ $product->prijs }}" aria-label="Username"
                               aria-describedby="prijsAddon" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Product Opslaan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
