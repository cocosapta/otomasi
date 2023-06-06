@extends('layouts.meja_layout')
@section('content')


@foreach($m as $item)
@if($item->status == 'ready')

	
	
<div class="col-12 col-sm-5 col-md-5 col-lg-2">
  <article class="article article-style-b">
    <div class="article-header">
      <div class="article-image" data-background="{{ 'storage/app/public/'. $item->photo }}">
      </div>
    </div>
    <div class="article-details">
      <div class="article-title">
        <h3>{{$item['nama']}}</h3>
      </div>
      <div class="article-title">

        <h6>Rp.{{$item['harga']}} </h6>
      </div>
      <form action="{{url('order')}}" method="POST">
        @csrf
        <div class="article-cta">
          <input type="number" name="total" value="1" min="1" class="form-control">
          <input type="hidden" name="id_menu" value="{{$item->id}}" class="form-control">
          <br>
          <button name="id_menu" value="{{$item->id}}" class="btn btn-primary">Tambah</button>
          
     
        </div>
      </form>
    </div>
  </article>
</div>
@endif
@endforeach
@endsection