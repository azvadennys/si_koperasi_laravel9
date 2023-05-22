@extends('admin.layout', ['active' => __('transaksi')])

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h3 class="mb-0">Daftar Transaksi</h3>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <a href="{{ route('transaksi.create') }}"
                                class=" btn btn-sm btn-primary p-2 btnTambah">Tambah
                                Transaksi</a>
                        </div>

                    </div>
                    <form method="post" action="{{ route('transaksi.cetak') }}" autocomplete="off">
                        @csrf
                        <div class="row">

                            <div class="col-lg-2 col-3">
                                <div class="input-group input-group-outline mb-3 is-filled">
                                    <label class="form-label">Tanggal Awal</label>
                                    <input type="date" name='tglawal' class="form-control" required value="">
                                </div>

                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="input-group input-group-outline mb-3 is-filled">
                                    <label class="form-label">Tanggal Akhir</label>
                                    <input type="date" name='tglakhir' class="form-control" required value="">
                                </div>

                            </div>
                            <div class="col-lg-2 col-5 my-auto">
                                <button type="submit" class=" btn btn-sm btn-info p-2 ">Cetak</button>
                            </div>

                        </div>
                    </form>
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
                    <div class="table-responsive">
                        <table class="table align-items-center table-hover" id="" style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    {{-- <th scope="col">No</th> --}}
                                    <th class="text-center">NO</th>
                                    <th scope="col">Nama Pembeli</th>
                                    <th scope="col">Banyak Mobil</th>
                                    <th scope="col">Banyak Supir</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Tanggal</th>
                                    <th class="text-right pr-6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($transaksi as $key=> $index)

                                <tr>
                                    <td class="text-center">
                                        {{ $key+ $transaksi->firstItem() }}
                                    </td>
                                    <td>
                                        {{ $index->user->name }}
                                    </td>
                                    <td>
                                        {{ $index->mobil->count() }} Unit
                                    </td>
                                    <td>
                                        {{ $index->supir->count() }} Orang
                                    </td>

                                    <td>
                                        Rp {{ number_format($index->total,0,',','.') }}
                                    </td>
                                    <td>
                                        {{ date_format($index->created_at,'d F Y') }}
                                    </td>

                                    <td>
                                        <div class="text-right justify-content-center">
                                            {{-- <a href="{{ route('transaksi.edit',$index->id) }}"
                                                class="btn btn-info btn-sm btnEdit">
                                                Edit</a> --}}


                                            <a href="#" class="btn remove-btn btn-danger btn-sm btn-icon-text"
                                                data-id="{{str_replace(' ','-',$index->id)}}">
                                                Delete
                                            </a>

                                        </div>
                                    </td>
                                </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-start">
                        {{ $transaksi->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('custom_html')
    @foreach ($transaksi as $index)
    <form action="{{ route('transaksi.destroy', $index->id) }}" id="delete-form-{{str_replace(' ','-',$index->id)}}"
        method="post">
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