@extends('admin.layout', ['active' => __('transaksi')])

@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1 mb-3">
                {{-- Informasi Jabatan --}}
                <div class="card z-index-0 fadeIn3 fadeInBottom mb-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Transaksi</h4>
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
                        <form method="post" action="{{ route('transaksi.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <label class="form-label">Pilih Pemesan</label>
                            <select class="js-example-basic-single form-control" name="user_id">

                                @foreach ($user as $key=> $index)
                                <option value="{{ $index->id }}">{{ $index->name }}
                                </option>
                                @endforeach
                            </select>

                            <label class="form-label mt-2">Pilih Mobil</label>
                            <select class="js-example-basic-multiple form-control" name="mobil_id[]"
                                multiple="multiple" required>

                                @foreach ($mobil as $key=> $index)
                                <option value="{{ $index->id_mobil }}">{{ $index->Merk_Mobil }} ({{ $index->Tahun }}) -
                                    Rp {{ number_format($index->Harga_Sewa,0,',','.') }}
                                </option>
                                @endforeach
                            </select>
                            <label class="form-label mt-2">Pilih Sopir</label>
                            <select class="js-example-basic-multiple form-control" name="supir_id[]"
                                multiple="multiple">

                                @foreach ($supir as $key=> $index)
                                <option value="{{ $index->id }}">{{ $index->Nama_Supir }} - ({{ $index->Jenis_Kelamin
                                    }})
                                </option>
                                @endforeach
                            </select>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary w-30 my-4 mb-2 mx-3">Submit</button>
                                <a href="{{ route('transaksi.index') }}"
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
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    $('.js-example-basic-single').select2();
});

</script>
@endpush