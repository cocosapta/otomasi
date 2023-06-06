@extends('layouts.layout')
@section('content')
<div class="main-content">
    @if(session()->has('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success"></span> Menu telah di Update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    @endif
    <section class="section">
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h4>Menu </h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">Daftar Menu & Status Ketersediaan</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kategori</th>
                                    <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        @foreach ($m as $item)
                            <tbody>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item['nama']}}</td>
                                    <td>{{$item['harga']}}</td>
                                    <td>{{$item['kategori']}}</td>
                                     <td>
                                     
                                       @if($item->status =='ready')
                                       
<button type="button" class="btn btn-outline-success">Tersedia</button>
                                     
                                         @elseif($item->status =='sold out')
                                     
<button type="button" class="btn btn-outline-danger">Habis</button>

   @endif
                                     </td>
                                    <td>
                                        <form action="{{url('status',$item->id)}}" method="post">
                                            @csrf
                                            @if($item->status =='ready')
                                            <input type="hidden" name="ready" value="ready">
                                            <button class="btn " type="submit" disabled><i class="fa fa-eye" style="color: green;"></i></button>
                                            <input type="hidden" name="sold" value="sold out">
                                            <button class="btn" type="submit"><i class="fa fa-eye-slash" style="color: red;" ></i></button>
                                            @elseif($item->status =='sold out')
                                            <input type="hidden" name="ready" value="ready">
                                            <button class="btn " type="submit" ><i class="fa fa-eye" style="color: green;"></i></button>
                                            <input type="hidden" name="sold" value="sold out">
                                            <button class="btn" type="submit" disabled><i class="fa fa-eye-slash" style="color: red;" ></i></button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection