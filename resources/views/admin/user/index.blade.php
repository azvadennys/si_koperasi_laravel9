@extends('admin.layout', ['active' => __('user')])

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h3 class="mb-0">Daftar Akun</h3>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <a href="{{ route('user.create') }}" class=" btn btn-sm btn-primary p-2 btnTambah">Tambah
                                Akun</a>
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
                                    <th scope="col">Nama Akun</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Hak Akses</th>
                                    <th class="text-right pr-6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($akun as $key=> $index)
                                <?php if(auth()->user()->id == $index->id ){
                  continue;
                } ?>

                                <tr>
                                    <td class="text-center">
                                        {{ $key+ $akun->firstItem() }}

                                    </td>
                                    <td>
                                        {{ $index->name }}
                                    </td>
                                    <td>
                                        {{ $index->email }}
                                    </td>
                                    <td>
                                        @if ($index->role == 'user')
                                        User Account
                                        @elseif ($index->role == 'admin')
                                        Administrator
                                        @elseif ($index->role == 'superadmin')
                                        Super Administrator
                                        @endif
                                        {{-- {{ $index->role }} --}}
                                    </td>
                                    <td>
                                        @if ($index->role == 'user')
                                        Akses User

                                        @else
                                        Akses Administrator
                                        @endif
                                    </td>

                                    <td>
                                        <div class="text-right">
                                            <a href="{{ route('user.edit',$index->id) }}"
                                                class="btn btn-info btn-sm btnEdit"><i class="fa fa-edit"></i>
                                                Edit</a>
                                            {{-- <form method="POST" action="{{ route('user.destroy', $index->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                                    data-toggle="tooltip" title='Delete'>Delete</a>
                                            </form> --}}
                                            {{-- <a href="{{ route('user.destroy', $index->id) }}"
                                                class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip"
                                                title='Delete'><i class="fa fa-trash"></i>
                                                Delete</a> --}}

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
                <div class="card-footer">
                    <div class="d-flex justify-content-start">
                        {{ $akun->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('custom_html')
    @foreach ($akun as $index)
    <form action="{{ route('user.destroy', $index->id) }}" id="delete-form-{{ $index->id }}" method="post">
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