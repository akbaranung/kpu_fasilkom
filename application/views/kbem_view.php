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

                    <?= $this->session->flashdata('message'); ?>

                    <table id="datatable" class="table table-striped table-bordered table-hover" style="width: 100%">
                        <thead>
                            <tr> 
                                <th class="center" width="5%">No</th>  
                                <th class="center" width="20%">Foto</th>
                                <th class="center" width="15%">Nama</th>
                                <th class="center" width="5%">No Urut</th>
                                <th class="center" width="15%">Slogan</th>
                                <th class="center" width="20%">Visi</th>
                                <th class="center" width="20%">Misi</th>
                                <th class="center" >
                                    <button class="btn btn-primary ace-icon fa fa-plus-square"><b> Tambah Kandidat</b></button>
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
                <h5 class="modal-title" id="exampleModalLabel">Data Kandidat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form name="f_kategori" id="f_kategori" action="">
                    <input type="hidden" name="txtIdKandidat" id="txtIdKandidat" value="">
                    <div id="konfirmasi"></div>
                    <table class="table table-form">
                        <tr><td style="width: 25%">Nama</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNamaKandidat" id="txtNamaKandidat" required>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">No Urut</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNoUrutKandidat" id="txtNoUrutKandidat" required>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Slogan</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtSloganKandidat" id="txtSloganKandidat" required>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Visi</td>
                            <td style="width: 75%">
                                <textarea type="text" class="form-control" name="txtVisiKandidat" id="txtVisiKandidat" rows="5" required></textarea>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Misi</td>
                            <td style="width: 75%">
                                <textarea type="text" class="form-control" name="txtMisiKandidat" id="txtMisiKandidat" rows="5" required></textarea>
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

<div class="modal fade" id="ganti" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('kbem/ganti'); ?><br>
                    <input type="hidden" name="IdGambarKandidat" id="IdGambarKandidat" value="">
                    <input type="hidden" name="txtGambarGanti" id="txtGambarGanti" value="">
                    <div id="konfirmasi"></div>
                    <table class="table table-form">
                        <tr><td style="width: 25%">Upload Gambar</td>
                            <td style="width: 75%">
                                <input type="file" class="form-control" name="img" id="img" required>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-white btn-info btn-bold" type="submit" id="btnSimpan2" name="btnSimpan2">
                    <i class="ace-icon fa fa-save blue"></i> Simpan</button>
                <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Tutup</button>
            </div>
                <?php echo form_close(); ?>
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
$( "li.kandidat" ).addClass( "menu-open");
$( "a.kandidat" ).addClass( "active" );
$( "a.kbem" ).addClass( "active" );

    var myTable =$('#datatable').DataTable({
      "ajax": {
        type   : "POST",
        url    : "<?php echo base_url(); ?>kbem/daftar_data/",
        data   : function(d) {
            
        }},
      "columnDefs": [
            { "visible": false, "targets": [8], "searchable": false }
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
                    id = myTable.row( $(this).parents('tr') ).data()[8];
                    
                    jawab=confirm("Apakah yakin untuk menghapus \n"+
                                    "Kandidat: "+myTable.row( $(this).parents('tr') ).data()[2]+"?");
                      if (jawab==false){
                        exit();
                      }
                    
                    console.log(id);
                    $.post( "<?php echo base_url(); ?>kbem/hapus/", { id:id  }, function( data ) {
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

    $('#datatable thead').on( 'click', '.fa-plus-square', function () {
                $("#m_kategori").modal('show');
                $('#txtIdKandidat').val('');
                $('#txtNamaKandidat').val('');
                $('#txtNoUrutKandidat').val('');
                $('#txtSloganKandidat').val('');
                $('#txtVisiKandidat').val('');
                $('#txtMisiKandidat').val('');
     });           
            
     $('#datatable tbody').on( 'click', '.fa-edit', function () {            
        $("#m_kategori").modal('show');
        nama    = myTable.row( $(this).parents('tr') ).data()[2];
        nama1    = myTable.row( $(this).parents('tr') ).data()[3];
        nama2    = myTable.row( $(this).parents('tr') ).data()[4];
        nama3    = myTable.row( $(this).parents('tr') ).data()[5];
        nama4    = myTable.row( $(this).parents('tr') ).data()[6];
        id  = myTable.row( $(this).parents('tr') ).data()[8];
        $('#txtNamaKandidat').val(nama);
        $('#txtNoUrutKandidat').val(nama1);
        $('#txtSloganKandidat').val(nama2);
        $('#txtVisiKandidat').val(nama3);
        $('#txtMisiKandidat').val(nama4);
        $('#txtIdKandidat').val(id);

        myTable.ajax.reload();
                
    });

    $('#datatable tbody').on( 'click', '.fa-image', function () {            
        $("#ganti").modal('show');
        gambar  = myTable.row( $(this).parents('tr') ).data()[9];
        id  = myTable.row( $(this).parents('tr') ).data()[8];
        $('#IdGambarKandidat').val(id);
        $('#txtGambarGanti').val(gambar);

        myTable.ajax.reload();
                
    });  

     $('#btnSimpan').click(function(){
            
        $.post( "<?php echo base_url(); ?>kbem/add/", {
                type:1,
                txtIdKandidat:$('#txtIdKandidat').val(),
                txtNamaKandidat:$('#txtNamaKandidat').val(),
                txtNoUrutKandidat:$('#txtNoUrutKandidat').val(),
                txtSloganKandidat:$('#txtSloganKandidat').val(),
                txtVisiKandidat:$('#txtVisiKandidat').val(),
                txtMisiKandidat:$('#txtMisiKandidat').val()

            }, function( data ) {
                
                console.log(data);
                    obj = $.parseJSON(data);
                        
                    if (obj.msg[0]=="repeat"){ 
                        $('#konfirmasi').html(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '   <strong>Error</strong><br/>'+obj.msg[1]+
                            '</div>');
                        setTimeout(function() {
                            $('#konfirmasi').html('');
                        },3000);
                               
                    } else if (obj.msg[0]=="update"){
                        $('#konfirmasi').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '   <strong>Sukses</strong><br/>'+obj.msg[1]+
                            '</div>');
                            
                        setTimeout(function() {
                            $('#konfirmasi').html('');
                        },2000);
                        
                        myTable.ajax.reload();  

                    } else if (obj.msg[0]=="ok"){
                        $('#konfirmasi').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '   <strong>Sukses</strong><br/>'+obj.msg[1]+
                            '</div>');
                            
                        setTimeout(function() {
                            $('#konfirmasi').html('');
                        },2000);

                        $('#txtIdKandidat').val('');
                        $('#txtNamaKandidat').val('');
                        $('#txtNoUrutKandidat').val('');
                        $('#txtSloganKandidat').val('');
                        $('#txtVisiKandidat').val('');
                        $('#txtMisiKandidat').val('');

                        myTable.ajax.reload();
                        
                    } else {
                        
                        $('#konfirmasi').html(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '   <strong>Error</strong><br/>'+obj.msg[1]+
                            '</div>');
                    }
                      
            });
            
    });


});


</script>   