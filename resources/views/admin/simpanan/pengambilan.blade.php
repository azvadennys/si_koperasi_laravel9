@extends('admin.layout', ['active' => __('simpanan')])

@section('content')

    <div class="container-fluid mt-6">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-xl-8 order-xl-1 mb-3">
                    {{-- Informasi Jabatan --}}
                    <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Pengambilan Simpanan
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong>{{ $error }}</strong><br>
                                    @endforeach
                                </div>
                            @endif
                            <form method="post" action="{{ route('simpanan.storepengambilan', $anggota->id) }}"
                                autocomplete="off">
                                @csrf
                                <div class="input-group input-group-static mb-4">
                                    <label>Nama Peminjaman</label>
                                    <input type="text" name='nama' value='{{ $anggota->nama }} - {{ $anggota->nip }}'
                                        class="form-control" disabled>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label>Tanggal</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" name='tanggal' class="form-control"
                                        required>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label>Jumlah</label>
                                    <input type="number" name='jumlah' class="form-control" value=""
                                        max={{ $totalsimpanan }} min="0" required placeholder="Masukkan Jumlah">
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-primary w-30 my-4 mb-2 mx-3">Simpan</button>
                                    <a href="{{ route('simpanan.index') }}"
                                        class="btn bg-gradient-info w-30 my-4 mb-2">Kembali</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
