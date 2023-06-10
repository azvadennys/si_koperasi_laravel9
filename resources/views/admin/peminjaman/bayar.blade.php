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
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tambah Pembayaran</h4>
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
                            <form method="post" action="{{ route('peminjaman.bayarstore', $peminjaman->id) }}"
                                autocomplete="off">
                                @csrf
                                <div class="input-group input-group-static mb-4">
                                    <label>Nama Peminjaman</label>
                                    <input type="text" name='nama'
                                        value='{{ $peminjaman->anggota->nama }} - {{ $peminjaman->anggota->nip }}'
                                        class="form-control" disabled>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" name='tanggal' class="form-control"
                                        required>
                                </div>
                                @php
                                    $number = $peminjaman->jumlah / $peminjaman->lama_peminjaman + $peminjaman->bunga_perbulan;
                                    
                                    // Divide by 1000
                                    $perbulan = $number / 10;
                                    
                                    // Round up to the nearest integer
                                    $perbulan = ceil($perbulan);
                                    
                                    // Multiply by 1000
                                    $perbulan = $perbulan * 10;
                                    
                                @endphp
                                {{-- <div class="input-group input-group-static mb-4">
                                <label>Jumlah</label>
                                <input type="number" name='jumlah' id="jumlah" class="form-control"
                                    value="{{ $perbulan }}" required readonly placeholder="Masukkan Jumlah">
                            </div> --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Jumlah</label>
                                    <input type="text" id="formattedInput" class="form-control"
                                        onkeyup="formatInput(this)" value="{{ $perbulan }}" readonly required>
                                </div>
                                <input type="hidden" name='jumlah' id="realInput">

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
    <script type="text/javascript">
        var formattedInput = document.getElementById('formattedInput');
        var realInput = document.getElementById('realInput');
        window.addEventListener('load', function() {
            var val = formattedInput.value;
            var rupiah = formatRupiah(val);
            formattedInput.value = rupiah;
            realInput.value = val.replace(/\D/g, '');
        });
        formattedInput.addEventListener('keyup', function(e) {
            var val = this.value;
            var rupiah = formatRupiah(val);
            this.value = rupiah;
            realInput.value = val.replace(/\D/g, '');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endpush
