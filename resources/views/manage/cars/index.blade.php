@extends('manage.layouts.app')
@section('content')

<div class="page-header">
    <h1>{{ $title }}</h1>
</div>

<a href="{{url('manage/car/add')}}" class="btn btn-primary">Tambah</a>

<br /><br />

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mobil</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <td>{{ $car->name }}</td>
                <td>{{ $car->price }}</td>
                <td>{{ $car->stock }}</td>
                <td>
                    <a href="{{ url('manage/car/edit/'.$car->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('manage/car/delete/'.$car->id) }}" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection