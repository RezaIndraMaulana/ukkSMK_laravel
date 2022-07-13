@extends('adminlte::page')
@section('title', 'Kelas')
@section('content_header')
    <h1 class="m-0 text-dark">Manajemen Kelas</h1>
@stop
@section('content')

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.datatables.min.css">

<script type="text/javascript">
    $(document).ready(function (){
        $('#table-datatables').Datatable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script> --}}

    <div class="row" id="table-datatables">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-md" href="{{ route('kelas.create') }}">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                    <a class="btn btn-primary btn-danger" href="/laporan/kelas">
                        <i class="fa fa-print"></i> Kelas PDF
                    </a>
                    <a class="btn btn-primary btn-info" href="{{ route('kelas.export') }}">
                        <i class="fa fa-print"></i> Kelas Excel
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">#</th>
                                <th>Nama Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Nama Gedung</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse($data as $item)
                                <tr>
                                    <td>
                                        {{ $no }}
                                    </td>
                                    <td>
                                        {{ $item->nama_kelas }}
                                    </td>
                                    <td>
                                        {{ $item->kompetensi_keahlian }}
                                    </td>
                                    <td>
                                        {{ $item->gedung->nama_gedung }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-success"
                                                href="{{ route('kelas.edit', ['kela' => $item->id]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-primary" onclick="hapus('{{ $item->id }}')" href="#">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        Tidak ada data.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div <div class="card-footer clearfix text-right">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    </div>
@stop
@section('plugins.Sweetalert2', true)
@section('plugins.Pace', true)
@section('js')
    @if (session('success'))
        <script type="text/javascript">
            Swal.fire(
                'Sukses!',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif
    <script type="text/javascript">
        function hapus(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Yakin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dd3333',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "/kelas/" + id,
                        type: 'DELETE',
                        data: {
                            '_token': $('meta[name=csrf-token]').attr("content"),
                        },
                        success: function(result) {
                            Swal.fire(
                                'Sukses!',
                                'Berhasil Hapus',
                                'success'
                            );
                            location.reload();
                        }
                    });
                }
            })
        }
    </script>
@stop

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#table-datatables').Datatable({
            dom: 'Bfrtip',
            buttons: ['copy', 'cvs', 'excel', 'pdf', 'print']
        });
    });
</script> --}}