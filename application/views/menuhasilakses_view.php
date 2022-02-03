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
                                <th class="center" width="25%">Role</th>
                                <th class="center" width="25%">Jurusan</th>
                                <th class="center" width="25%">Boleh Akses Menu</th>
                                <th class="center" >
                                    <button class="btn btn-primary ace-icon fa fa-plus-square"><b> Tambah Akses</b></button>
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
                <h5 class="modal-title" id="exampleModalLabel">Data Akses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form name="f_kategori" id="f_kategori" action="">
                    <input type="hidden" name="txtIdAkses" id="txtIdAkses" value="">
                    <div id="konfirmasi"></div>
                    <table class="table table-form">
                        <tr><td style="width: 25%">Role</td>
                            <td style="width: 75%">
                                <select type="text" class="form-control" name="txtRoleID" id="txtRoleID" required>
                                    <?php foreach ($role as $role): ?> 
                                    <option value="<?php echo $role->id  ?>"><?php echo $role->role  ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Jurusan</td>
                            <td style="width: 75%">
                                <select type="text" class="form-control" name="txtJurusan" id="txtJurusan" required>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Boleh Akses Menu</td>
                            <td style="width: 75%">
                                <select type="text" class="form-control" name="txtMenuId" id="txtMenuId" required>
                                    <?php foreach ($menu as $m): ?> 
                                    <option value="<?php echo $m->id  ?>"><?php echo $m->menu  ?></option>
                                    <?php endforeach ?>
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
$( "li.master" ).addClass( "menu-open");
$( "a.master" ).addClass( "active" );
$( "a.menuaksescontrol" ).addClass( "active" );

    var myTable =$('#datatable').DataTable({
      "ajax": {
        type   : "POST",
        url    : "<?php echo base_url(); ?>menuaksescontrol/daftar_data7/",
        data   : function(d) {
            
        }},
      "columnDefs": [
            { "visible": false, "targets": [5], "searchable": false }
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
                    id = myTable.row( $(this).parents('tr') ).data()[5];
                    
                    jawab=confirm("Apakah yakin untuk menghapus akses \n"+
                                    "Menu: "+myTable.row( $(this).parents('tr') ).data()[3]+"?");
                      if (jawab==false){
                        exit();
                      }
                    
                    console.log(id);
                    $.post( "<?php echo base_url(); ?>menuaksescontrol/hapus7/", { id:id  }, function( data ) {
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
                            setInterval('location.reload()', 2000);
                            
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
                $('#txtIdAkses').val('');
                $('#txtRoleID').val('');
                $('#txtJurusan').val('');
                $('#txtMenuId').val('');
     });           
            
     $('#datatable tbody').on( 'click', '.fa-edit', function () {            
        $("#m_kategori").modal('show');
        nama    = myTable.row( $(this).parents('tr') ).data()[1];
        nama1    = myTable.row( $(this).parents('tr') ).data()[2];
        nama2    = myTable.row( $(this).parents('tr') ).data()[3];
        id  = myTable.row( $(this).parents('tr') ).data()[5];
        $('#txtRoleID').val(nama);
        $('#txtJurusan').val(nama1);
        $('#txtMenuId').val(nama2);
        $('#txtIdAkses').val(id);

        myTable.ajax.reload();
                
    }); 

     $('#btnSimpan').click(function(){
            
        $.post( "<?php echo base_url(); ?>menuaksescontrol/add7/", {
                type:1,
                txtIdAkses:$('#txtIdAkses').val(),
                txtRoleID:$('#txtRoleID').val(),
                txtJurusan:$('#txtJurusan').val(),
                txtMenuId:$('#txtMenuId').val()

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
                        setInterval('location.reload()', 2000);  

                    } else if (obj.msg[0]=="ok"){
                        $('#konfirmasi').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '   <strong>Sukses</strong><br/>'+obj.msg[1]+
                            '</div>');
                            
                        setTimeout(function() {
                            $('#konfirmasi').html('');
                        },2000);

                        $('#txtIdAkses').val('');
                        $('#txtRoleID').val('');
                        $('#txtJurusan').val('');
                        $('#txtMenuId').val('');

                        myTable.ajax.reload();
                        setInterval('location.reload()', 2000);
                        
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