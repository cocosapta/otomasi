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
                    <h4>Data Pesanan Masuk dari Meja </h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">Pesanan Masuk</div>
                    <table class="table table-striped" >
                        <thead>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Meja</th>
                                <th scope="col">Area</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                     <?php  $no=1;   ?>
                        @foreach ($k as $item)
  
         <tr>
             <td>{{ $no++ }}</td>
             <td>{{ $item['nama'] }}</td>
             <td>{{ $item['meja'] }}</td>
             <td>{{ $item['tempat'] }}</td>
              <td>{{ $item['created_at'] }}</td>
                            
                              <td>
                                  
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{ $item['id_cart'] }}">
  Lihat Pesanan
</button>
                              
                                <a class="btn " href="{{ url('hapus.status', $item->id_cart) }}" type="submit"><i class="fa  fa-times"
                             style="color: red;"></i></a>
                              
                              
                              </td>
                              
                              
                              
             </tr>
              @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>


@foreach ($k as $item)
<div class="modal fade" id="edit-{{ $item['id_cart'] }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Menu Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                
                <b>Nama Pemesan : </b>{{$item['nama']}}  <br>
                
                <b>Nomor Meja Pemesan : </b>{{$item['meja']}} / {{$item['tempat']}} <br>
                <b> Waktu Order : </b>{{ $item['created_at'] }}
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total</th>
                            
                        </tr>
                    </thead>
                    
                    
                    
                    <?php $no = 1;
                    $sic=0;
                    $totalan=0;
                    $id = $item->id_cart;
                    ?>
                    @foreach($read as $item)
                @if ($item->id_cart == $id)
                    <tbody>
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item['nama']}}</td>
                            <td>{{$item['total']}}</td>
                            <td>{{$item['harga']}}</td>
                            <td>{{$item['total']*$item['harga']}}</td>
                           <?php $totalan=$totalan+($item['total']*$item['harga']) ;
                           
                           $sic=$item['id_cart']    ;    
                           
                           ?>
                              
                              
                              
                              
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                   
                    
                </table>
              <b>  Total Pesanan : Rp  <?php echo $totalan;
                    ?>  </b>
                <div class="modal-footer">
                    
                    
                          <form action="{{ url('selesai', $sic) }}" method="post">
                     @csrf
                    
                             <!--<button type="button" class="btn btn-primary"> Proses ke Dapur</button>-->
                             
                     <button class="btn btn-success" type="submit">Kirim ke Dapur</button>
                   
                   <input name="total" value="<?php echo $totalan;?>" type="text">
                 </form>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('script')
// <script type="text/javascript">
// $(document).ready(function(){
//     load_data ={'fetch':1};
//     window.setInterval(function() {
//         $.get('dataorder' ,load_data,function(data){
//             $('.data').html(data);
//         });
//     },1000);
// })
// </script>
@endsection






<script type="text/javascript">

   setTimeout(function(){

       location.reload();

   },60000);

</script>
