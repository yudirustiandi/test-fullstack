@extends('manage.layouts.app')
@section('content')

<div class="page-header">
    <h1>{{ $title }}</h1>
</div>

<a href="{{url('manage/car/add')}}" class="btn btn-primary">Tambah</a>

@endsection