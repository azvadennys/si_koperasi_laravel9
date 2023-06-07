@extends('admin.layout', ['active' => __('peminjaman')])

@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1 mb-3">
                {{-- Informasi Jabatan --}}
                <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Peminjaman</h4>
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
                        <form method="post" action="{{ route('peminjaman.store') }}" autocomplete="off">
                            @csrf
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Pilih Anggota</label>
                                <select class="form-control" name="id_anggota" id="exampleFormControlSelect1" required>
                                    <option value="">Pilih Anggota</option>
                                    @foreach ($anggota as $index)
                                    <option value="{{ $index->id }}">{{ $index->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Pilih Sumber Dana</label>
                                <select class="form-control" name="sumber_dana" id="exampleFormControlSelect1" required>
                                    <option value="">Pilih Sumber Dana</option>
                                    <option value="TPP">TPP</option>
                                    <option value="Gaji">Gaji</option>
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Tanggal Peminjaman</label>
                                <input type="date" name='tanggal' class="form-control" required>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Lama Peminjaman (Bulan)</label>
                                <input type="number" name='lama_peminjaman' class="form-control" value="" required
                                    placeholder="Masukkan Lama Peminjaman dalam bulan">
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Jumlah</label>
                                <input type="number" name='jumlah' id="jumlah" class="form-control" value="" required
                                    placeholder="Masukkan Jumlah">
                            </div>

                            <div class="input-group input-group-static mb-4">
                                <label>Bunga Perbulan (2%)</label>
                                <input type="number" name='bunga' id='bunga' class="form-control" value="" required
                                    readonly placeholder="Bunga Perbulan">
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary w-30 my-4 mb-2 mx-3">Simpan</button>
                                <a href="{{ route('peminjaman.index') }}"
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
@push('custom_js')
<script>
    document.getElementById("jumlah").addEventListener("change", myFunction);

function myFunction() {
  var x = document.getElementById("bunga");
  var y = document.getElementById("jumlah");

  let number = y.value *0.02;

// Divide by 1000
let result = number / 10;

// Round up to the nearest integer
    result =  Math.ceil(result);

// Multiply by 1000
result = result * 10;

  x.value = result;
}
</script>
@endpush