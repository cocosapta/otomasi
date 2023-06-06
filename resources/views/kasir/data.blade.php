 <?php $no = 1; ?>
 @foreach ($k as $item)
  
         <tr>
             <td>{{ $no++ }}</td>
             <td>{{ $item['nama'] }}</td>
             <td>{{ $item['meja'] }}</td>
             <td>{{ $item['tempat'] }}</td>
             <td>
                
                
                            
                              <td>
                                  
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
                              
                              
                              
                              
                              </td>
                              
                 
                 </td>
             <td>
                 
                 
                 
                 <!--<form action="{{ url('selesai', $item->id_cart) }}" method="post">-->
                 <!--    @csrf-->
                 <!--    <a class="btn btn-warning btn-sm" type="submit" data-toggle="modal" data-target="#edit-{{ $item->id_cart }}">Cek Pesanan-->
                             
                             
                             
                 <!--            </a>-->
                             <!--<button type="button" class="btn btn-primary"> Proses ke Dapur</button>-->
                             
                 <!--    <button class="btn btn-success btn-sm" type="submit">Teruskan ke Dapur</button>-->
                 <!--    <a class="btn " href="{{ url('hapus.status', $item->id) }}" type="submit"><i class="fa  fa-times"-->
                 <!--            style="color: red;"></i></a>-->
                 <!--</form>-->

             </td>
         </tr>
 
 @endforeach
