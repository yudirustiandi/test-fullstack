@extends('manage.layouts.app')
@section('content')

<div class="page-header">
    <h1>{{ $title }}</h1>
</div>

<a href="{{url('manage/sale/add')}}" class="btn btn-primary">Tambah</a>

<br /><br />

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mobil</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Mobil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->name }}</td>
                <td>{{ $sale->email }}</td>
                <td>{{ $sale->phone }}</td>
                <td>{{ $sale->car->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection