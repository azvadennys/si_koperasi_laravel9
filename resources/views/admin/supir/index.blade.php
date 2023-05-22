@extends('admin.layout', ['active' => __('supir')])

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h3 class="mb-0">Daftar Supir</h3>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <a href="{{ route('supir.create') }}" class=" btn btn-sm btn-primary p-2 btnTambah">Tambah Supir</a>
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
                        <table class="table align-items-center table-hover" id="" style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    {{-- <th scope="col">No</th> --}}
                                    <th class="text-center">NO</th>
                                    <th scope="col">Nama Supir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">No Telepon</th>
                                    <th class="text-right pr-6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($supir as $key=> $index)

                                <tr>
                                    <td class="text-center">
                                        {{ $key+ $supir->firstItem() }}
                                    </td>
                                    <td>
                                        {{ $index->Nama_Supir }}
                                    </td>
                                    <td>
                                        @if($index->Jenis_Kelamin == 'P')
                                        <span class="badge badge-sm bg-gradient-success">Perempuan</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-danger">Laki Laki</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $index->No_Telepon }}
                                    </td>
                                    <td>
                                        <div class="text-right justify-content-center">
                                            <a href="{{ route('supir.edit',$index->id) }}"
                                                class="btn btn-info btn-sm btnEdit">
                                                Edit</a>


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
                        {{ $supir->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('custom_html')
    @foreach ($supir as $index)
    <form action="{{ route('supir.destroy', $index->id) }}" id="delete-form-{{str_replace(' ','-',$index->id)}}"
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