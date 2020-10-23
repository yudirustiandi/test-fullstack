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
                <label class="control-label" for="name">Nama Pembeli</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama"
                    value="{{ isset($sale) ? $sale->name : old('name') }}">

                @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label" for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                    value="{{ isset($sale) ? $sale->email : old('email') }}">

                @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label class="control-label" for="phone">No. Telepon</label>
                <input type="number" name="phone" class="form-control" id="phone" placeholder="No. Telepon"
                    value="{{ isset($sale) ? $sale->phone : old('phone') }}">

                @if ($errors->has('phone'))
                <span class="help-block">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('car') ? ' has-error' : '' }}">
                <label class="control-label" for="car">Mobil Yang Dibeli</label>
                <select name="car" id="car" class="form-control">
                    <option value="">-- Data Mobil --</option>
                    @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ (isset($sale) && $sale->car_id == $car->id) ? 'selected' : '' }}>
                        {{ $car->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('car'))
                <span class="help-block">{{ $errors->first('car') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection