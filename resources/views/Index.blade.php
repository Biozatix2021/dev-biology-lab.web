@extends('layouts.main-layout');

@section('Header')
    <form action="/type_product" method="GET" id="keyword" name="keyword" width="100%">
        <div class="row">
            <div class="col-6">
                <label for="name" class="control-label">Type Product</label>
                <div class="input-group input-group-sm mb-3">
                    <select id="filter" name="filter" class="form-control form-control-sm" style="padding-top: 0; padding-bottom: 0; height:27px" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Silahkan Pilih Jenis Produk">
                        <option value="" disabled selected hidden> Type Product </option>
                        <option value="Antibody">Antibody</option>
                        <option value="ELISA Kit">ELISA Kit</option>
                        <option value="Ancillary">Ancillary</option>
                    </select>
                </div>
            </div>
            <div class="col-6">

                <label for="name" class="control-label">Nama Produk</label>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name="keyword" id="keyword" class="form-control form-control-sm">
                    <button type="submit" class="btn btn-outline-primary btn-sm" onclick="progress_bar()"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('Content')
    <div class="card">
        <div class="card-body">
            <div class="container-fluid table table-sm">
                <table id="tabelproduk" class="ui celled responsive table nowrap unstackable" style="width: 100%">
                    <thead>
                        <tr style="height: 40px">
                            <th width="10px">No</th>
                            <th style="text-align: center">Catalog Number</th>
                            <th style="text-align: center">Brand</th>
                            <th style="text-align: center">Nama Produk</th>
                            <th style="text-align: center">Host</th>
                            <th style="text-align: center">Reactivity</th>
                            <th style="text-align: center">Clone/Type</th>
                            <th style="text-align: center">Application</th>
                            <th style="text-align: center">Pack Size</th>
                            <th style="text-align: center">Type Of Product</th>
                            <th style="text-align: center">price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($produk->data == null)
                            <tr>
                                <td colspan="11" style="text-align: center;"> <b> Data Tidak Ditemukan</b></td>
                            </tr>
                        @else
                            @foreach ($produk->data as $item)
                                <tr>
                                    <td style="text-align: center; width:10px">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $item->cat_number }}</td>
                                    <td style="text-align: center">{{ $item->brand }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td style="text-align: center">{{ $item->host }}</td>
                                    <td style="text-align: center">{{ $item->reactivity }}</td>
                                    <td style="text-align: center">{{ $item->clone_type }}</td>
                                    <td style="text-align: center">{{ $item->application }}</td>
                                    <td style="text-align: center">{{ $item->pack_size }}</td>
                                    <td style="text-align: center">{{ $item->type_product }}</td>
                                    <td style="text-align: center">Rp. {{ number_format($item->price) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".spinner-grow").fadeOut("slow");
        });

        $('#tabelproduk').DataTable();

        function add_filter() {
            var filter = $("#filter").val();
            table.draw();
        }

        function progress_bar() {
            var prosesBar = $('.progress-bar');
            var prosesAngka = 0;

            setInterval(function() {
                prosesAngka++;
                prosesBar.css('width', prosesAngka + '%');
                prosesBar.attr('aria-valuenow', prosesAngka);
            }, 100);
        }
    </script>
@endsection
