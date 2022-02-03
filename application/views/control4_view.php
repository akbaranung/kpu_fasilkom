<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title;?></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <section class="content">
      <div class="container-fluid">

                                
                    <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
                    <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered table-hover" style="width: 100%">
                        <thead>
                            <tr> 
                                <th class="center" width="5%">No</th>  
                                <th class="center" width="15%">Nama</th>
                                <th class="center" width="5%">NIM</th>
                                <th class="center" width="15%">Email</th>
                                <th class="center" width="15%">Gambar</th>
                                <th class="center" width="15%">KTM</th>
                                <th class="center" width="5%">Angkatan</th>
                                <th class="center" width="10%">Jurusan</th>
                                <th class="center" width="5%">Role</th>
                                <th class="center" width="5%">Status</th>
                                <th class="center" >
                                    Kontrol
                                </th>
                            </tr>
                        </thead>                    
                            <tr>
                                <td align="center"></td>
                                <td></td>
                                <td align="center"></td>
                            </tr>
                    </table>
                    </div>
                    <!-- BATAS DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->

<div class="modal fade" id="m_kategori" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <h5 class="modal-title" id="exampleModalLabel">Data Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form name="f_kategori" id="f_kategori" action="">
                    <input type="hidden" name="txtIdPeserta" id="txtIdPeserta" value="">
                    <div id="konfirmasi"></div>
                    <table class="table table-form">
                        <tr><td style="width: 25%">Nama</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNamaPeserta" id="txtNamaPeserta" required>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">NIM</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNIM" id="txtNIM" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Email</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtEmailPeserta" id="txtEmailPeserta" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Angkatan</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtAngkatanPeserta" id="txtAngkatanPeserta" required>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Jurusan</td>
                            <td style="width: 75%">
                                <select type="text" class="form-control" name="txtJurusanPeserta" id="txtJurusanPeserta" required>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Role</td>
                            <td style="width: 75%">
                                <select type="text" class="form-control" name="txtRolePeserta" id="txtRolePeserta" required>
                                    <?php foreach ($role as $role): ?> 
                                    <option value="<?php echo $role->id  ?>"><?php echo $role->role  ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Status</td>
                            <td style="width: 75%">
                                <select type="text" class="form-control" name="txtStatusPeserta" id="txtStatusPeserta" required>
                                    <option value="0">Baru Daftar</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Nonaktif</option>
                                    <option value="3">Butuk Validasi</option>
                                    <option value="4">Bukan Fasilkom</option>
                                </select>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-white btn-info btn-bold" type="button" id="btnSimpan" name="btnSimpan">
                    <i class="ace-icon fa fa-save blue"></i> Simpan</button>
                <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Hapus Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div id="konfirmasihapus"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Tutup
                </button>
            </div>
        </form>
        </div>
    </div>
</div>
</div><!-- /.container-fluid -->
    </section>
    </div>
<!-- Hapus Modal -->
<script>
$(document).ready(function() {
$.fn.dataTable.ext.errMode = 'none';
$( "li.peserta" ).addClass( "menu-open");
$( "a.peserta" ).addClass( "active" );
$( "a.control4" ).addClass( "active" );

    var myTable =$('#datatable').DataTable({
      "ajax": {
        type   : "POST",
        url    : "<?php echo base_url(); ?>control4/daftar_data/",
        data   : function(d) {
            
        }},
      "columnDefs": [
            { "visible": false, "targets": [11], "searchable": false }
        ],
        select: {
            style: 'multi'
        },

        dom :'Bflrtip',
        buttons: [
        { extend:'csv', text:' CSV', className:'fa fa-file-alt btn btn-primary', titleAttr:'Export to CSV' },
        { extend:'excel', text:' EXCEL', className:'fa fa-file-excel btn btn-primary', titleAttr:'Export to EXCEL' },
        { extend: 'pdf', text:' PDF', className: 'fa fa-file-pdf btn btn-primary', titleAttr:'Export to PDF' }, 
        { extend: 'copy', text: ' COPY', className: 'fa fa-copy btn btn-primary', titleAttr:'Copy Record Data' },
        { extend: 'print', text: ' PRINT', className: 'fa fa-print btn btn-primary', titleAttr:'Print Record Data' },
        { extend: 'colvis', text: ' KOLOM', className: 'fa fa-filter btn btn-primary', titleAttr:'Sembunyikan Kolom', background:false },
        ],
        "lengthMenu" :[ [10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, "ALL"] ]
        
    });

    $('#datatable tbody').on( 'click', '.fa-trash-alt', function () { 
                    var jawab;
                    obj= $(this).parents('tr');
                    id = myTable.row( $(this).parents('tr') ).data()[11];
                    
                    jawab=confirm("Apakah yakin untuk menghapus data \n"+
                                    "Peserta: "+myTable.row( $(this).parents('tr') ).data()[1]+"?");
                      if (jawab==false){
                        exit();
                      }
                    
                    console.log(id);
                    $.post( "<?php echo base_url(); ?>control4/hapus/", { id:id  }, function( data ) {
                        obj = $.parseJSON(data);
                        $("#myModal3").modal('show');
                        if (obj.msg[0]=="hapus"){
                            
                            
                            $('#konfirmasihapus').html(
                                        '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                        '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                        '   <strong>Hapus Data</strong><br/>'+obj.msg[1]+
                                        '</div>');
                            setTimeout(function() {
                                $('#konfirmasihapus').html('');
                                $("#myModal3").modal('hide');
                            },2000);
                            
                            myTable.ajax.reload();
                            
                        } else {
                        
                            $('#konfirmasihapus').html(
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                                '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                '   <strong>Error</strong><br/>'+obj.msg[1]+
                                '</div>');
                        }
                    });
            });           
            
     $('#datatable tbody').on( 'click', '.fa-edit', function () {            
        $("#m_kategori").modal('show');
        nama    = myTable.row( $(this).parents('tr') ).data()[1];
        nama1    = myTable.row( $(this).parents('tr') ).data()[2];
        nama2    = myTable.row( $(this).parents('tr') ).data()[3];
        nama3    = myTable.row( $(this).parents('tr') ).data()[6];
        nama4    = myTable.row( $(this).parents('tr') ).data()[7];
        nama5    = myTable.row( $(this).parents('tr') ).data()[8];
        nama6    = myTable.row( $(this).parents('tr') ).data()[9];
        id  = myTable.row( $(this).parents('tr') ).data()[11];
        $('#txtNamaPeserta').val(nama);
        $('#txtNIM').val(nama1);
        $('#txtEmailPeserta').val(nama2);
        $('#txtAngkatanPeserta').val(nama3);
        $('#txtJurusanPeserta').val(nama4);
        $('#txtRolePeserta').val(nama5);
        $('#txtStatusPeserta').val(nama6);
        $('#txtIdPeserta').val(id);

        myTable.ajax.reload();
                
    }); 

     $('#btnSimpan').click(function(){
            
        $.post( "<?php echo base_url(); ?>control4/add/", {
                type:1,
                txtIdPeserta:$('#txtIdPeserta').val(),
                txtNamaPeserta:$('#txtNamaPeserta').val(),
                txtNIM:$('#txtNIM').val(),
                txtEmailPeserta:$('#txtEmailPeserta').val(),
                txtAngkatanPeserta:$('#txtAngkatanPeserta').val(),
                txtJurusanPeserta:$('#txtJurusanPeserta').val(),
                txtRolePeserta:$('#txtRolePeserta').val(),
                txtStatusPeserta:$('#txtStatusPeserta').val()

            }, function( data ) {
                
                console.log(data);
                    obj = $.parseJSON(data);
                        
                    if (obj.msg[0]=="ok"){
                        $('#konfirmasi').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '   <strong>Sukses</strong><br/>'+obj.msg[1]+
                            '</div>');
                            
                        setTimeout(function() {
                            $('#konfirmasi').html('');
                        },2000);
                        
                    } else {
                        
                        $('#konfirmasi').html(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '   <strong>Error</strong><br/>'+obj.msg[1]+
                            '</div>');
                    }
                      
                      myTable.ajax.reload();  
                
            });
            
    });


});


</script>   