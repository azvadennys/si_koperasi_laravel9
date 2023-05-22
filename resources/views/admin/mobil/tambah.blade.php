@extends('admin.layout', ['active' => __('mobil')])

@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1 mb-3">
                {{-- Informasi Jabatan --}}
                <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Mobil</h4>
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
                        <form method="post" action="{{ route('mobil.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nomor Kendaraan</label>
                                <input type="text" name='id_mobil' class="form-control" required
                                    value="{{ old('id_mobil') }}" maxlength="20">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Merk Mobil</label>
                                <input type="text" name='Merk_Mobil' class="form-control" required
                                    value="{{ old('Merk_Mobil') }}" maxlength="50">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Jenis Mobil</label>
                                <input type="text" name='Jenis_Mobil' class="form-control" required
                                    value="{{ old('Jenis_Mobil') }}" maxlength="20">
                            </div>

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Tahun</label>
                                <input type="number" name='Tahun' class="form-control" required
                                    value="{{ old('Tahun') }}" maxlength="4">
                            </div>

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Warna Mobil</label>
                                <input type="text" name='Warna' class="form-control" required value="{{ old('Warna') }}"
                                    maxlength="20">
                            </div>

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Harga Sewa</label>
                                <input type="number" name='Harga_Sewa' class="form-control" required
                                    value="{{ old('Harga_Sewa') }}" maxlength="20">
                            </div>


                            <label class="form-label">Foto Mobil</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="file" name='gambar' class="form-control" accept="image/*" required>
                            </div>

                            <div class="input-group input-group-outline mb-3">
                                <select class="form-control" name='status' id="inputGroupSelect01" required>
                                    <option value="" selected>Pilih Status</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary w-30 my-4 mb-2 mx-3">Submit</button>
                                <a href="{{ route('mobil.index') }}"
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