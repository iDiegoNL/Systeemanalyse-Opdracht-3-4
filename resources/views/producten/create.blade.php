@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Producten Toevoegen</h1>
                <p class="lead font-weight-normal">De naam, beschrijving en prijs worden automatisch met een random value ingevuld.</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('producten.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="aantal">Aantal producten</label>
                        <input type="number" class="form-control" id="aantal" name="aantal" aria-describedby="aantalHelp" min="1" value="3" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Toevoegen</button>
                </form>
            </div>
        </div>
    </div>
@endsection
