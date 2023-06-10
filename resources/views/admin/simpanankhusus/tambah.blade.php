@extends('admin.layout', ['active' => __('simpanankhusus')])

@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1 mb-3">
                {{-- Informasi Jabatan --}}
                <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Simpanan Khusus</h4>
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
                        <form method="post" action="{{ route('simpanankhusus.store') }}" autocomplete="off">
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
                                <label>Tanggal</label>
                                <input type="date" value="{{ date('Y-m-d') }}" name='tanggal' class="form-control"
                                    required readonly>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Jumlah</label>
                                <input type="number" name='jumlah' class="form-control" value="" required
                                    placeholder="Masukkan Jumlah">
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary w-30 my-4 mb-2 mx-3">Simpan</button>
                                <a href="{{ route('simpanankhusus.index') }}"
                                    class="btn bg-gradient-info w-30 my-4 mb-2">Kembali</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementByname('tanggal').valueAsDate = new Date();
</script>
@endsection