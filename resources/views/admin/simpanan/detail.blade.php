@extends('admin.layout', ['active' => __('simpanan')])

@section('content')

<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-6 mb-4">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Detail Simpanan Khusus {{ $akun->nama }}</h3>
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
                    <div class="table-responsive">
                        <table id="table_id" class="display table align-items-center table-hover" id=""
                            style="width: 100%">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    {{-- <th scope="col">No</th> --}}
                                    <th class="text-center">NO</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($akun->simpanankhusus as $key=> $index)

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
                                        {{ $index->anggota->unit_kerja }}
                                    </td>
                                    <td>
                                        {{ date("d M Y", strtotime($index->tanggal)) }}
                                    </td>
                                    <td class="text-end mx-5">
                                        {{ 'Rp ' . number_format($index->jumlah, 0, ',', '.') }}
                                    </td>


                                </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-start">
                        {{-- --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 mb-4">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Detail Simpanan Wajib {{ $akun->nama }}</h3>
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
                    <div class="table-responsive">
                        <table id="table_id" class="display table align-items-center table-hover" id=""
                            style="width: 100%">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    {{-- <th scope="col">No</th> --}}
                                    <th class="text-center">NO</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($akun->simpananwajib as $key=> $index)

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
                                        {{ $index->anggota->unit_kerja }}
                                    </td>
                                    <td>
                                        {{ date("d M Y", strtotime($index->tanggal)) }}
                                    </td>
                                    <td class="text-end mx-5">
                                        {{ 'Rp ' . number_format($index->jumlah, 0, ',', '.') }}
                                    </td>


                                </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-start">
                        {{-- --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Detail Simpanan Pokok {{ $akun->nama }}</h3>
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
                    <div class="table-responsive">
                        <table id="table_id" class="display table align-items-center table-hover" id=""
                            style="width: 100%">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    {{-- <th scope="col">No</th> --}}
                                    <th class="text-center">NO</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($akun->simpananpokok as $key=> $index)

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
                                        {{ $index->anggota->unit_kerja }}
                                    </td>
                                    <td>
                                        {{ date("d M Y", strtotime($index->tanggal)) }}
                                    </td>
                                    <td class="text-end mx-5">
                                        {{ 'Rp ' . number_format($index->jumlah, 0, ',', '.') }}
                                    </td>


                                </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-start">
                        {{-- --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('custom_html')
    {{-- @foreach ($akun as $index)
    <form action="{{ route('simpanankhusus.destroy', $index->id) }}" id="delete-form-{{ $index->id }}" method="post">
        @csrf
        @method('DELETE')
    </form>
    @endforeach --}}
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