@extends('all.dapur_layout')

   
         
            
            
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
      Tekan simbol Centang Hijau jika masakan sudah disajikan</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Meja</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach ($o as $item)
            <tbody>
                @if ($item->status_order == 's')
                @if ($item->dapur == 'b')
                <tr>

                    <td>{{$no++}}</td>
                    <td>{{$item['nama']}}</td>
                    <td>{{$item['total']}}</td>
                    <td>{{$item['nama_pengguna']}}</td>
                    <td>{{$item->meja}}</td>
                    <td>
                        <form action="{{url('acc.s',$item->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="s" value="s">
                            <button class="btn " type="submit"><i class="fas fa-check" style="color: green;"></i></button>
                        </form>
                    </td>
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