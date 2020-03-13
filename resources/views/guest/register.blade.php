@extends('guest.front-master')

@section('title')
Registrasi
@stop

@section('header')
<link rel="stylesheet" type="text/css" href="{{url('assets/css/validationEngine.jquery.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{url('assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{url('assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{url('assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css')}}">
@endsection

@section('content')

{{-- Page-body start --}}
<div class="page-body">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-block">
            <form method="POST" action="{{ url('daftar') }}" class="form-validation" id="number_form"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kode" id="kode">
                <div class="form-group">
                    <label>Email<strong class="text-danger">*</strong></label>
                    <div class="input-group">
                        <input type="email" name="email" id="email" class="validate[required] form-control"
                            placeholder="Email" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label>Password <strong class="text-danger">*</strong></label>
                    <div class="input-group">
                        <input type="password" name="password" id="password"
                            class="validate[required,minSize[6]] form-control" placeholder="Password"
                            autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label>Ulangi Password <strong class="text-danger">*</strong></label>
                    <div class="input-group">
                        <input type="password" name="password_ulang"
                            class="validate[required,equals[password]] form-control" placeholder="Ulangi Password"
                            autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Sub Kontraktor<strong class="text-danger">*</strong></label>
                    <div class="input-group">
                        <input type="text" name="nama" id="nama" class="validate[required,maxSize[25]] form-control"
                            placeholder="Nama Max 25 Karakter">
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <div class="input-group">
                        <input type="text" name="perusahaan" id="nama_perusahaan"
                            class="validate[required] form-control text-capitalize" readonly
                            placeholder="Klik cari terlebih dahulu ==>">
                        <span class="input-group-addon cursor-hand" id="search">Cari <i
                                class="fa fa-search fa-fw"></i></span>
                        <span class="input-group-addon cursor-hand bg-warning" id="reset">Reset Perusahaan</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jns_kel">Jenis Kelamin</label>
                    <select class="validate[required] form-control" name="jns_kel" id="jns_kel">
                        <option value="">-- Jenis Kelamin --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat"></textarea>
                </div>
                <div class="form-group">
                    <label>Nomer Telepon <strong class="text-danger">*</strong></label>
                    <div class="input-group">
                        <input type="text" name="telepon" id="telepon" class="validate[custom[number]] form-control"
                            placeholder="Format : 628XXXXXXXXX" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir <strong class="text-danger">*</strong></label>
                    <div class="input-group">
                        <input type="text" name="tempatlahir" id="tempatlahir" class="validate[required] form-control"
                            placeholder="Tempat Lahir" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir <strong class="text-danger">*</strong></label>
                    <div class="input-group">
                        <input type="date" name="tanggallahir" id="tanggallahir" class="validate[required] form-control"
                            placeholder="Tanggal Lahir" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Pas Foto <strong class="text-danger">*</strong> (max size 5MB)</label>
                    <div class="input-group">
                        <input type="file" name="pasfoto" id="pasfoto" class="validate[required] form-control"
                            placeholder="Passfoto">
                    </div>
                </div>

        </div>
    </div>

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-block">
            <div class="form-group">
                <label>Nomer Surat Permohonan <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="no_surat_permohonan" id="no_surat_permohonan"
                        class="validate[custom[number]] form-control" placeholder="Format : SP2314-34-23" required>
                </div>
            </div>
            <div class="form-group">
                <label>Site ID<strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="site_id" id="site_id" class="validate[required] form-control"
                        placeholder="Format : example.com" required>
                </div>
            </div>
            <div class="form-group">
                <label>Site Name <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="site_name" id="site_name" class="validate[required] form-control"
                        placeholder="Format : Lorem Ipsum" required>
                </div>
            </div>
            <div class="form-group">
                <label>Tinggi Tower <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="tinggi_tower" id="tinggi_tower"
                        class="validate[custom[number]] form-control" placeholder="Format : 100 Meter" required>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_tower">Alamat Tower</label>
                <textarea class="form-control" name="alamat_tower" id="alamat_tower" rows="3"
                    placeholder="Alamat Tower"></textarea>
            </div>
            <div class="form-group">
                <label>Dibangun Tanggal<strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="date" name="tanggal_bangun" id="tanggal_bangun" class="validate[required] form-control"
                        placeholder="Dibangun Tanggal" required>
                </div>
            </div>
            <div class="form-group">
                <label>Koordinat Longitude <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="koordinat_longitude" id="koordinat_longitude"
                        class="validate[required] form-control" placeholder="Format : 131313" required>
                </div>
            </div>
            <div class="form-group">
                <label>Koordinat Latitude <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="koordinat_latitude" id="koordinat_latitude"
                        class="validate[required] form-control" placeholder="Format : -3144314" required>
                </div>
            </div>
            <div class="form-group">
                <label>Pemilik Tanah <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="pemilik_tanah" id="pemilik_tanah" class="validate[required] form-control"
                        placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label>Batas Utara <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="batas_utara" id="batas_utara" class="validate[required] form-control"
                        placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label>Batas Timur <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="batas_timur" id="batas_timur" class="validate[required] form-control"
                        placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label>Batas Selatan <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="batas_selatan" id="batas_selatan" class="validate[required] form-control"
                        placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label>Batas barat <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="batas_barat" id="batas_barat" class="validate[required] form-control"
                        placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label>Lama Sewa <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="lama_sewa" id="lama_sewa" class="validate[required] form-control"
                        placeholder="10 Tahun" required>
                </div>
            </div>
            <div class="form-group">
                <label>Operator Pengguna Menara <strong class="text-danger">*</strong></label>
                <div class="input-group">
                    <input type="text" name="operator_pengguna" id="operator_pengguna"
                        class="validate[required] form-control" placeholder="Operator Pengguna Menara " required>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-block">
            <div class="form-group">
                <label>Surat Permohonan Pendirian Menara Telekomunikasi <strong class="text-danger">*</strong> (max size
                    5MB)</label>
                <div class="input-group">
                    <input type="file" name="spp_menara_telkom" id="spp_menara_telkom"
                        class="validate[required] form-control"
                        placeholder="Surat Permohonan Pendirian Menara Telekomunikasi">
                </div>
            </div>
            <div class="form-group">
                <label>KTP Pemohon<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="ktp_pemohon" id="ktp_pemohon" class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Kuasa Perwakilan (penunjukan sub kontraktor) <strong class="text-danger">*</strong> (max
                    size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_kuasa_perwakilan" id="surat_kuasa_perwakilan"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Pernyataan telah diadakan sosialisasi <strong class="text-danger">*</strong> (max size
                    5MB)</label>
                <div class="input-group">
                    <input type="file" name="pernyataan_telah_diadakan_sosialisasi"
                        id="pernyataan_telah_diadakan_sosialisasi" class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Perjanjian Sewa Menyewa lahan <strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_perjanjian_sewa_lahan" id="surat_perjanjian_sewa_lahan"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Pernyataan Tanah Tidak Dalam Sengketa <strong class="text-danger">*</strong> (max size
                    5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_pernyataan_tidak_sengketa" id="surat_pernyataan_tidak_sengketa"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Permohonan Izin Tempat Usaha<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="permohonan_izin_tempat_usaha" id="permohonan_izin_tempat_usaha"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Rekomendasi Kades<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="rekomendasi_kades" id="rekomendasi_kades"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Rekomendasi Camat <strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="rekomendasi_camat" id="rekomendasi_camat"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Jaminan Keamanan Tower <strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_jaminan_keamanan_tower" id="surat_jaminan_keamanan_tower"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Berita Acara Kesepakatan<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="berita_acara_kesepakatan" id="berita_acara_kesepakatan"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Pernyataan Tidak Keberatan <strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_pernyataan_tidak_keberatan" id="surat_pernyataan_tidak_keberatan"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Persetujuan Keluarga<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_persetujuan_keluarga" id="surat_persetujuan_keluarga"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Pernyataan Akses Jalan <strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_pernyataan_akses_jalan" id="surat_pernyataan_akses_jalan"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Pernyataan Boleh Bangung <strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_pernyataan_boleh_bangun" id="surat_pernyataan_boleh_bangun"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Pernyataan Pemilik Tanah / Bangunan <strong class="text-danger">*</strong> (max size
                    5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_pernyataan_pemilik_tanah" id="surat_pernyataan_pemilik_tanah"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Surat Pernyataan Pengembalian atau Perpanjang Sewa <strong class="text-danger">*</strong> (max
                    size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="surat_pernyataan_pengmebalian_sewa_tanah"
                        id="surat_pernyataan_pengmebalian_sewa_tanah" class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Kartu Keluarga<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="kartu_keluarga" id="kartu_keluarga"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Sertifikat Tanah<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="sertifikat_tanah" id="sertifikat_tanah"
                        class="validate[required] form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Pajak PBB<strong class="text-danger">*</strong> (max size 5MB)</label>
                <div class="input-group">
                    <input type="file" name="pajak_pbb" id="pajak_pbb" class="validate[required] form-control">
                </div>
            </div>
            <br>
            <span>Perhatikan!! tanda ( <strong class="text-danger">*</strong> ) wajib untuk diisi</span>
            <button type="submit" id="daftar" class="btn btn-success m-b-0 f-right">Daftar</button>
            </form>

        </div>
    </div>
</div>
{{-- Page-body end --}}

@endsection

@section('end')

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="lookup" class="table table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th style="max-width:10%">Aksi</th>
                                <th style="max-width:45%">Nama Perusahaan</th>
                                <th style="max-width:45%">Alamat</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <hr>
                <p>Jika perusahaan tidak terdapat di tabel ini maka klik => <button id="tambahModal"
                        class="btn btn-mini btn-warning">Tambah Perusahaan</button></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-mini btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahLink" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_link">Tambah Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_link">
                <div class="form-group">
                    <label for="judulfile">Nama Perusahaan <small class="text-danger">(wajib)</small></label>
                    <input type="text" class="form-control" id="formnamaperusahaan" placeholder="Nama Perusahaan">
                </div>
                <div class="form-group">
                    <label for="judulfile">Alamat Lengkap <small>(wajib)</small></label>
                    <input type="text" class="form-control" id="formalamatperusahaan" placeholder="Alamat Lengkap Perusahaan">
                </div>
                <div class="form-group">
                    <label for="judulfile">Kota/Kabupaten <small>(wajib)</small></label>
                    <input type="text" class="form-control" id="formkabupatenkota" placeholder="Kab./ Kota">
                </div>
                <div class="form-group">
                    <label for="judulfile">No Telp <small>(wajib)</small></label>
                    <input type="text" class="form-control" id="formnotelpperusahaan" placeholder="No Telp Perusahaan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="tbh_toko" class="btn btn-mini btn-primary">Tambah</button>
                <button type="button" class="btn btn-mini btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{url('assets/custom/daftar.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{url('assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{url('assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{url('assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{url('assets/pages/data-table/extensions/buttons/js/jszip.min.js')}}"></script>
<script src="{{url('assets/pages/data-table/extensions/buttons/js/vfs_fonts.js')}}"></script>
<script src="{{url('assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/jquery.validationEngine-en.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/jquery.validationEngine.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function () {
        jQuery('.form-validation').validationEngine();
        $('#notis-danger').hide();
        $('#reset').hide();
        $('#search').show();
    });

    $('#search').click(function () {
        $('#myModal').modal('show');
    });

</script>






<script>
    (function ($) {
        $.fn.checkFileType = function (options) {
            var defaults = {
                allowedExtensions: [],
                success: function () {},
                error: function () {}
            };
            options = $.extend(defaults, options);

            return this.each(function () {

                $(this).on('change', function () {
                    var value = $(this).val(),
                        file = value.toLowerCase(),
                        extension = file.substring(file.lastIndexOf('.') + 1);

                    if ($.inArray(extension, options.allowedExtensions) == -1) {
                        options.error();
                        $(this).focus();
                    } else {
                        options.success();

                    }

                });

            });
        };

    })(jQuery);

    var uploadField = document.getElementById("pasfoto");
    uploadField.onchange = function () {
        if (this.files[0].size > 5055650) {
            new PNotify({
                title: 'File Oversize',
                text: 'Maaf, File Max 5MB ',
                type: 'error'
            });
            console.log("file size = " + this.files[0].size + "/5055650")
            this.value = "";
        };
    };

    $(function () {
        $('#pasfoto').checkFileType({
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            error: function () {
                new PNotify({
                    title: 'File not Image',
                    text: 'Maaf, hanya type image yang diupload ',
                    type: 'error'
                });
                document.getElementById("pasfoto").value = "";
            }
        });
    });

</script>
@endsection
