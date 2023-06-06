@extends('layouts.layout')

@section('content')

<div class="main-content">
    @if(session()->has('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success"></span> Data telah di Simpan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>General Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">General Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">All About General Settings</h2>
            <p class="section-lead">
                Anda dapat menyesuaikan semua pengaturan umum di sini
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jump To</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="{{route('general')}}" class="nav-link ">General</a></li>
                                <li class="nav-item"><a href="{{route('seo')}}" class="nav-link ">SEO</a></li>
                                <li class="nav-item"><a href="{{route('system')}}" class="nav-link">System</a></li>
                                <li class="nav-item"><a href="{{route('reservasi_system')}}" class="nav-link active">Reservasi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @foreach($s as $item)
                    <form id="setting-form" action="{{url('reservasi.edit.sistem',$item->id)}}" method="POST">
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Reservasi Settings</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Pengaturan Nomor Rekening, Dompet digital,dan Pembayaran dalam Reservasi</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Harga Reservasi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" value="{{old('harga',$item->harga) }}" name="harga" class="form-control @error('harga') is-invalid @enderror">
                                        @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Dompet Digital</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="pay" value="{{old('pay',$item->pay) }}" class="form-control @error('pay') is-invalid @enderror">
                                        @error('pay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Jenis dompet digital yang digunakan. Contoh Gopay,Dana,OVO,dll</div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right"></label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nama_pay" value="{{old('nama_pay',$item->nama_pay) }}" class="form-control @error('nama_pay') is-invalid @enderror">
                                        @error('nama_pay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Nama akun dompet digital </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right"></label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="no_pay" value="{{old('no_pay',$item->no_pay) }}" class="form-control @error('no_pay') is-invalid @enderror">
                                        @error('no_pay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Nomor akun dompet digital </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Bank</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="bank" value="{{old('bank',$item->bank) }}" class="form-control @error('bank') is-invalid @enderror">
                                        @error('bank')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Jenis Bank yang digunakan</div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right"></label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nama_tf" value="{{old('nama_tf',$item->nama_tf) }}" class="form-control @error('nama_tf') is-invalid @enderror">
                                        @error('nama_tf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Nama akun Bank </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right"></label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="tf" value="{{old('tf',$item->tf) }}" class="form-control @error('tf') is-invalid @enderror">
                                        @error('tf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Nomor rekening </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
</div>
@endsection