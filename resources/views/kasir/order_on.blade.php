@extends('layouts.layout')
@section('content')
<div class="main-content">
    @if(session()->has('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success"></span> Data Success dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    @foreach($t as $item)
    <?php
    $title = $item->title;
    $lokasi = $item->lokasi_s;

    ?>
    @endforeach
    <section class="section">
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h4>Data Reservasi  </h4>

                </div>
                <div class="card-body">
                    <div class="section-title mt-0">Reservasi/Pemesanan</div>
                    <a class="btn " href="{{url('jadwal')}}" type="submit" onclick="centeredPopup(this.href,'myWindow','800','650','yes');return false"><i class="fa fa-calendar"></i> Jadwal Reservasi</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">#</th>
                                      <th scope="col">Tanggal Reservasi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor WhatsApp</th>
                          
                                <th scope="col">Kode</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($r as $item)
                            @if ($item->status =='cancel')
                            <tr>
                                <td>{{$no++}}</td>
                                    <td>{{$item['tgl']}}</td>
                                <td>{{$item['nama']}}</td>
                                <td>{{$item['wa']}}</td>
                            
                                <td>{{$item['kode']}}</td>
                                <td>

                                    <a id="status" name="status" target="_blank" href="https://api.whatsapp.com/send?phone={{$item['wa']}}&text=Atas%20nama:%0A{{$item->nama}}%0A%0ADari:%0A{{$title}}%0A{{$lokasi}}%0A%0ATerima%20kasih%20atas%20reservasi%20anda%20di%20{{$title}}%0AJika%20anda%20memerlukan%20informasi%20lebih%20lanjut,%20anda%20bisa%20menghubungi%20nomor%20ini.%0A%0ARincian%20pemesanan:%0ANama%20Tamu:%20{{$item->nama}},%0ATanggal:%20{{$item->tgl}},%0AJumlah%20Orang:%20{{$item->orang}},%0AKebijakan%20Reservasi:%20Tempat%20dipesan%20dengan%20garansi,pembatalan%20kurang%20dari%2030%20menit%20dari%20waktu%20kedatangan%20tidak%20akan%20hangus.%20Jika%20lebih%20dari%201%20jam%20maka%20akan%20hangus.%0A%0AKode%20bukti%20Reservasi%20anda%20yaitu%20{{$item->kode}}%0A%0ASilakan%20tunjukan%20kode%20ketika%20pembayaran%20di%20tempat%0ATerima%20kasih%20untuk%20pemesanan%20anda.%0A%0AHoramat%20saya.&source&data="><i class="fab fa-whatsapp" style="color: green;"></i></a>
                                    <a class="btn " href="{{url('jadwal')}}" type="submit" onclick="centeredPopup(this.href,'myWindow','800','650','yes');return false"><i class="fa fa-eye" style="color: blue;"></i></a>
                                    <a data-toggle="modal" data-target="#edit-{{$item->id_booking}}" class="btn"><i class="fa fa-edit" style="color: blue;"></i></a>
                                    <a href="{{url('reservasi.hapus',$item->id_booking)}}" class="btn"><i class="fa fa-trash" style="color: red;"></i></a>

                                </td>

                            </tr>
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
                <!-- <div class="card-body">
                    <div class="section-title mt-0">Jadwal Reservasi</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor WhatsApp</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($r as $item)
                            @if ($item->status =='acc')
                            @if($item->end != date('Y-m-d H:i:s')||$item->end <= date('Y-m-d H:i:s'))
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item['nama']}}</td>
                                <td>{{$item['wa']}}</td>
                                <td>{{$item['tgl']}}</td>
                                <td>{{$item['kode']}}</td>

                            </tr>
                        </tbody>
                        @endif
                        @endif
                        @endforeach
                    </table>
                </div> -->
            </div>
        </div>
    </section>
</div>
@foreach ($r as $item)
<div class="modal fade" id="edit-{{$item->id_booking}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Reservasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('update.reservasi',$item->id_booking) }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama </label>
                        <input disabled type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama',$item->nama) }}" required autocomplete="nama" autofocus>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Meja </label>
                        <select id="meja" class="form-control @error('meja') is-invalid @enderror" name="meja" required autocomplete="meja" autofocus>
                            @foreach ($user as $item)
                            @if ($item->level == 'meja')
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('meja')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tempat </label>
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{old('tempat',$item->tempat) }}" required autocomplete="tempat" autofocus>

                        @error('tempat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal </label>
                        <input type="datetime-local" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama',$item->tgl) }}" required autocomplete="nama" autofocus>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script language="javascript">
    var popupWindow = null;

    function centeredPopup(url, winName, w, h, scroll) {
        LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
        TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
        settings =
            'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
        popupWindow = window.open(url, winName, settings)
    }
</script>

@endsection