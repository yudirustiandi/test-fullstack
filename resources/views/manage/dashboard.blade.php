@extends('manage.layouts.app')
@section('content')

<div class="page-header">
    <h1>{{ $title }}</h1>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">DATA HARI INI</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Mobil yang paling banyak dijual</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Penjualan Hari ini</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Total Penjualan Hari ini</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>


<div class="panel panel-primary">
    <div class="panel-heading">DATA 7 MINGGU TERAKHIR</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Mobil yang paling banyak dijual</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Penjualan 7 hari terakhir</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Total Penjualan 7 hari terakhir</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection