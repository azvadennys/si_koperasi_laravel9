@extends('admin.layout', ['active' => __('transaksi')])

@section('content')
<style type="text/css" media="print">
    @page {
        size: landscape;
    }
</style>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">


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
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($transaksi as $key=> $index)

                                <tr>
                                    <td class="text-center">
                                        {{ $i++ }}
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


                                </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>
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


    @push('custom_js')
    <script>
        $(document).ready(function() {
            print();
    });
    
    </script>
    @endpush