@extends('admin.layout', ['active' => __('peminjaman')])

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h3 class="mb-0">Daftar Peminjaman</h3>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <a href="{{ route('peminjaman.create') }}"
                                class=" btn btn-sm btn-primary p-2 btnTambah">Tambah</a>
                        </div>

                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-6 text-center">
                            {{-- @if (session()->has('success'))
                            <div class="alert alert-info my-2" role="alert">
                                <strong>{{ session('success') }}</strong>
                            </div>
                            @endif --}}
                            @if (session()->has('Errors'))
                            <div class="alert alert-danger my-2" role="alert">
                                <strong>{{ session('Errors') }}</strong>
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger my-2" role="alert">

                                @foreach ($errors->all() as $error)

                                <strong>{{ $error }}</strong><br>

                                @endforeach

                            </div>
                            @endif

                            {{-- @error('id')
                            <div class="alert alert-danger my-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror --}}
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="row justify-content-center ">
                        <div class="table-responsive col-10">
                            <table id="table_id" class="display table align-items-center table-hover" id=""
                                style="width: 100%">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        {{-- <th scope="col">No</th> --}}
                                        <th class="text-center">NO</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Tanggal Peminjaman</th>
                                        <th scope="col">Lama Peminjaman (Bln)</th>
                                        <th scope="col">Jumlah Peminjaman</th>
                                        <th scope="col">Angsuran Perbulan</th>
                                        <th scope="col">Sisa Pinjaman</th>
                                        <th class="text-right pr-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                    $i = 1;
                                    @endphp
                                    @foreach ($akun as $key=> $index)
                                    @php
                                    $number = $index->jumlah / $index->lama_peminjaman + $index->bunga_perbulan;

                                    // Divide by 1000
                                    $perbulan = $number / 10;

                                    // Round up to the nearest integer
                                    $perbulan = ceil($perbulan);

                                    // Multiply by 1000
                                    $perbulan = $perbulan * 10;

                                    @endphp
                                    <tr class="text-center">
                                        <td class="text-center">
                                            {{ $i++ }}


                                        </td>
                                        <td>
                                            {{ $index->anggota->nama }}
                                        </td>
                                        <td>
                                            {{ $index->anggota->nip }}
                                        </td>
                                        <td>
                                            {{ $index->tanggal }}
                                        </td>
                                        <td>
                                            {{ $index->lama_peminjaman }}
                                        </td>
                                        <td>
                                            {{ 'Rp ' . number_format($index->jumlah+
                                            ($index->jumlah*0.02*$index->lama_peminjaman), 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ 'Rp ' . number_format($perbulan, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ 'Rp ' . number_format($index->jumlah +
                                            ($index->jumlah*0.02*$index->lama_peminjaman) -
                                            $index->angsuran->sum('jumlah'),
                                            0,
                                            ',', '.') }}
                                        </td>

                                        <td>
                                            <div class="text-right">
                                                <a href="{{ route('peminjaman.bayar',$index->id) }}"
                                                    class="btn btn-success btn-sm btnEdit">
                                                    Bayar</a>

                                                <a href="#" class="btn remove-btn btn-danger btn-sm btn-icon-text"
                                                    data-id="{{ $index->id }}">
                                                    Delete
                                                    <i class="typcn typcn-trash"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>


                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-start">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('custom_html')
    @foreach ($akun as $index)
    <form action="{{ route('peminjaman.destroy', $index->id) }}" id="delete-form-{{ $index->id }}" method="post">
        @csrf
        @method('DELETE')
    </form>
    @endforeach
    @endsection

    @push('custom_js')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.js"></script>
    <script>
        let removeBtns = document.querySelectorAll('.remove-btn');
        removeBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let id = btn.getAttribute('data-id');
                let deleteForm = document.querySelector('#delete-form-'+ id);

                Swal.fire({
  title: 'Apakah anda yakin menghapus data?',
  text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.isConfirmed) {
    deleteForm.submit();
  }
})
            })
        })

    </script>
    @endpush