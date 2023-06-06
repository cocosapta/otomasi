@extends('all.dapur_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tabel Menu Order</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat/Meja</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach ($o as $item)
            <tbody>
                @if ($item->status_order == 's')
                @if ($item->dapur == 'b')
                <tr>

                    <td><h1>{{$no++}}</h1></td>
                    <td><h1>{{$item['nama']}}</h1></td>
                    <td><h1>{{$item['total']}}</h1></td>
                    <td><h1>{{$item['nama_pengguna']}}</h1></td>
                    <td><h1>{{$item->tempat}}/{{$item->meja}}</h1></td>
                    <td><h1>{{$item->waktu_order}}</h1></td>
                </tr>
                @endif
                @endif
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="card-footer bg-whitesmoke">
        This is card footer
    </div>
</div>
@endsection