<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      @foreach($t as $item)
      <a href="index.html"><img src="{{ asset('storage/'. $item->logo) }}" height="110%" width="60%"></img></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html"><img src="{{ asset('storage/'. $item->icon) }}" height="80%" width="80%"></img></a>
    </div>
    @endforeach
    @if(auth()->user()->level =='admin')
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="{{route('admin.home')}}"><i class="fa fa-fire"></i> <span>Dashboard</span></a></li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-cogs"></i> <span>Sistem</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{url('user')}}">Pekerja</a></li>
          <li><a class="nav-link" href="{{url('meja')}}">Meja/Tempat</a></li>
          
      <li><a class="nav-link" href="{{route('admin.galery')}}"> Foto/Logo Web</a></li>
          <li><a class="nav-link" href="{{url('lain')}}">Pengaturan Lain</a></li>
        </ul>
      </li>
      <li class="menu-header">Produk</li>
      <li><a class="nav-link" href="{{route('data.menu')}}"><i class="fa fa-book"></i> <span>Semua Menu</span></a></li>
      <li><a class="nav-link" href="{{route('admin.menu')}}"><i class="fa fa-book"></i> <span>Tambah Menu Baru</span></a></li>
      <li><a class="nav-link" href="{{url('menu.cek')}}"><i class="fa fa-book"></i> <span>Ketersediaan Menu</span></a></li>
      <li><a class="nav-link" href="{{url('reservasi_status')}}"><i class="fa fa-book-open"></i> <span>Reservasi 
      
          @if($jumlah_pesanan > 0)
          
     <font color="red"><b>(Ada </b>{{$jumlah_pesanan}} Baru)</b></span>
      
      @endif
      </font>
      </a> 
      </li>
    </aside>
    
    
    
         
   
    
    
  </div>
  @elseif(auth()->user()->level =='kasir')
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
  <li><a class="nav-link" href="{{url('dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
  <li><a class="nav-link" href="{{url('kasir')}}"><i class="fa fa-book"></i><span>Kasir</span></a></li>
  <li><a class="nav-link" href="{{url('monitor_dapur')}}"><i class="fa fa-book"></i><span>Monitor Dapur</span></a></li>
  
      <li>
          <a class="nav-link" href="{{url('reservasi_status_kasir')}}"><i class="fa fa-book-open"></i> <span>Reservasi 
          
          
             @if($jumlah_pesanan > 0)
          
     <font color="red"><b>(Ada </b>{{$jumlah_pesanan}} Baru)</b></span>
      
      @endif
      </font>
          
          </span></a>
          
          
          </li>
      
          
  
</ul>


</aside>
</div>
@endif