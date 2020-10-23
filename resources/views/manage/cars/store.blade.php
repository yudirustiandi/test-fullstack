@extends('manage.layouts.app')
@section('content')

<div class="page-header">
    <h1>{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="{{ url()->current() }}" method="post">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label" for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama"
                    value="{{ isset($car) ? $car->name : old('name') }}">

                @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label class="control-label" for="price">Harga</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Harga"
                    value="{{ isset($car) ? $car->price : old('price') }}">

                @if ($errors->has('price'))
                <span class="help-block">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                <label class="control-label" for="stock">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock"
                    value="{{ isset($car) ? $car->stock : old('stock') }}">

                @if ($errors->has('stock'))
                <span class="help-block">{{ $errors->first('stock') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection