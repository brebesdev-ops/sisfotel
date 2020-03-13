$(document).ready(function() {
    var thisurl = $('#thisurl').val();
    //var id = $('#idpkm').val();
    $('#form_tambahan').hide();

    var table = $('#lookup').DataTable({
        'serverMethod': 'get',
        "paging": true,
        "processing": true,
        "ordering": true,
        'responsive':true,
        "info": true,
        //"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
            "zeroRecords": "Maaf Belum ada data perusahaan"
        },
        'ajax': {
            'url': thisurl+'/dataperusahaan',
            'dataSrc': '',
        },
        'columns': [
            {
                data: null,
                render: function(data, type, full, row) {
                    return '<button class="pilih btn btn-primary btn-mini" data-nama="'+data.nama_perusahaan+'" data-kode="'+data.id+'"><i class="fa fa-plus" aria-hidden="true"></i></button>'
                }
            },
            {
                data: 'alamat_lengkap_perusahaan'
            },
            {
                data: 'kota_perusahaan'
            },
            {
                data: 'tlp_perusahaan'
            }
        ]
    });

    $('#reload-tabel').click(function() {
        table.ajax.reload();
    });

    $('#lookup tbody').on('click', '.pilih', function() {
        $('#nama_perusahaan').val($(this).data('nama'));
        $('#kode').val($(this).data('kode'));
        $('#myModal').modal('hide');
        $('#search').hide();
        $('#reset').show();
    });

    $('#reset').click(function(){
        $('#nama_perusahaan').val("");
        $('#kode').val("");
        $('#myModal').modal('show');
        $('#search').show();
        $('#reset').hide();
    });

    $('#tambahModal').click(function(){
        $('#myModal').modal('hide');
        $('#tambahLink').modal('show');
    });


    $('#tbh_perusahaan').click(function(){
        var code = $('#token').val();
        var nama = $('#formnamaperusahaan').val();
        var alamat_lengkap_perusahaan = $('#formalamatlengkapperusahaan').val();
        var kota_perusahaan = $('#formkotaperusahaan').val();
        var tlp_perusahaan = $('#formteleponperusahaan').val();
        if(nama != ""){

            $.post(thisurl+'/tambahperusahaan', {
                _token: code,
                nama: nama,
                alamat_lengkap_perusahaan: alamat_lengkap_perusahaan,
                kota_perusahaan: kota_perusahaan,
                tlp_perusahaan : tlp_perusahaan,
            })
            .done(function(result) {
                if ($.isEmptyObject(result)) {
                    new PNotify({
                        title: 'Gagal Simpan!',
                        text: 'Maaf Gagal Menyimpan data, Silakan Cek Kembali',
                        icon: 'icofont icofont-info-circle',
                        type: 'warning'
                    });
                    table.ajax.reload();
                } else {
                    table.ajax.reload();
                    $('#tambahLink').modal('hide');
                    $('#formnamaperusahaan').val("");
                    $('#formalamatlengkapperusahaan').val("");
                    new PNotify({
                        title: 'Perusahaan Berhasil Ditambah',
                        text:  nama+' berhasil ditambah',
                        icon:  'icofont icofont-info-circle',
                        type:  'success'
                    });
                    $('#myModal').modal('show');
                }
            })
            .fail(function() {
                $('#tambahLink').modal('hide');
                new PNotify({
                    title: 'Kesalahan server!',
                    text: 'Ada yang tidak beres dengan server',
                    icon: 'icofont icofont-info-circle',
                    type: 'error'
                });
            });
        }else{
            new PNotify({
                title: 'Form kosong',
                text: 'Harap isi nama Perusahaan!',
                icon: 'icofont icofont-info-circle',
                type: 'warning'
            });
        }
    });

});
