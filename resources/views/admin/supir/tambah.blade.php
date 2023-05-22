@extends('admin.layout', ['active' => __('supir')])

@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1 mb-3">
                {{-- Informasi Jabatan --}}
                <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Supir</h4>
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
                        <form method="post" action="{{ route('supir.store') }}" autocomplete="off">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nama Supir</label>
                                <input type="text" name='Nama_Supir' class="form-control" required>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name='Alamat' class="form-control" required max="50">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-control" name='Jenis_Kelamin' id="inputGroupSelect01" required>
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">No Telepon</label>
                                <input type="text" name='No_Telepon' class="form-control" required maxlength="15">
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary w-30 my-4 mb-2 mx-3">Submit</button>
                                <a href="{{ route('supir.index') }}"
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