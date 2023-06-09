@extends('admin.layout', ['active' => __('anggota')])

@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1 mb-3">
                {{-- Informasi Jabatan --}}
                <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Edit Anggota</h4>
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
                        <form method="post" action="{{ route('anggota.update',$data->id) }}" autocomplete="off">
                            @csrf

                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">NIP</label>
                                <input type="number" name='nip' class="form-control" value="{{ $data->nip }}" required>
                            </div>
                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">Nama</label>
                                <input type="text" name='nama' class="form-control" value="{{ $data->nama }}" required>
                            </div>
                            <div class="input-group input-group-outline mb-3 is-filled">
                                <label class="form-label">Unit Kerja</label>
                                <input type="text" name='unit_kerja' class="form-control"
                                    value="{{ $data->unit_kerja }}" required>
                            </div>
                            <div class="input-group input-group-outline mb-3 is-filled">
                                <label class="form-label">Tanggal Daftar</label>
                                <input type="date" name='tanggal' class="form-control" value="{{ $data->tanggal }}"
                                    required>
                            </div>
                            <div class="input-group input-group-outline mb-3 is-filled">
                                <label class="form-label">No Telepon</label>
                                <input type="text" name='no_telepon' class="form-control"
                                    value="{{ $data->no_telepon }}" required>
                            </div>
                            <div class="input-group input-group-outline mb-3 is-filled">
                                <label class="form-label">Alamat</label>
                                <input type="text" name='alamat' class="form-control" value="{{ $data->alamat }}"
                                    required>
                            </div>
                            <div class="input-group input-group-outline mb-3 is-filled">
                                <select class="form-control" name='status' id="inputGroupSelect01" required>
                                    <option selected>Pilih Status</option>
                                    <option value="AKTIF" @if($data->status == 'AKTIF') selected @endif>Aktif</option>
                                    <option value="TIDAK AKTIF" @if($data->status == 'TIDAK AKTIF') selected
                                        @endif>Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary w-30 my-4 mb-2 mx-3">Submit</button>
                                <a href="{{ route('anggota.index') }}"
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