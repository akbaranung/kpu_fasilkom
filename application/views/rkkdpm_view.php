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
                                <th class="center" width="15%">Nama Pembalas</th>
                                <th class="center" width="5%">NIM Pembalas</th>
                                <th class="center" width="15%">Email Pembalas</th>
                                <th class="center" width="15%">Gambar Profil Pembalas</th>
                                <th class="center" width="5%">Tanggal</th>
                                <th class="center" width="15%">Balasan</th>
                                <th class="center" width="15%">NIM Pengomentar</th>
                                <th class="center" width="15%">Id Komentar</th>
                                <th class="center" width="5%">Id Kandidat</th>
                                <th class="center" width="10%">Nama Kandidat</th>
                                <th class="center" >
                                    Kontrol Data Reply
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
                <h5 class="modal-title" id="exampleModalLabel">Data Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form name="f_kategori" id="f_kategori" action="">
                    <input type="hidden" name="txtIdReply" id="txtIdReply" value="">
                    <div id="konfirmasi"></div>
                    <table class="table table-form">
                        <tr><td style="width: 25%">Nama Asli Pembalas</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNamaAsli" id="txtNamaAsli" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">NIM Pembalas</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNim" id="txtNim" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Email Pembalas</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Tanggal</td>
                            <td style="width: 75%">
                                <input type="date" class="form-control" name="txtDate" id="txtDate" required>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Balasan</td>
                            <td style="width: 75%">
                                <textarea type="text" class="form-control" name="txtIsiBalasan" id="txtIsiBalasan" rows="5" required></textarea>
                            </td>
                        </tr>
                        <tr><td style="width: 25%">NIM Pengomentar</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNimPengomentar" id="txtNimPengomentar" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Id Komentar</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtIdKomentar" id="txtIdKomentar" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Id Kandidat</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtIdKandidat" id="txtIdKandidat" required readonly="">
                            </td>
                        </tr>
                        <tr><td style="width: 25%">Nama Kandidat</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNamaKandidat" id="txtNamaKandidat" required readonly="">
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
$( "li.reply" ).addClass( "menu-open");
$( "a.reply" ).addClass( "active" );
$( "a.rkkdpm" ).addClass( "active" );

    var myTable =$('#datatable').DataTable({
      "ajax": {
        type   : "POST",
        url    : "<?php echo base_url(); ?>rkkdpm/daftar_data/",
        data   : function(d) {
            
        }},
      "columnDefs": [
            { "visible": false, "targets": [12], "searchable": false }
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
                    id = myTable.row( $(this).parents('tr') ).data()[12];
                    
                    jawab=confirm("Apakah yakin untuk menghapus \n"+
                                    "Balasan: "+myTable.row( $(this).parents('tr') ).data()[1]+"?");
                      if (jawab==false){
                        exit();
                      }
                    
                    console.log(id);
                    $.post( "<?php echo base_url(); ?>rkkdpm/hapus/", { id:id  }, function( data ) {
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
        nama3    = myTable.row( $(this).parents('tr') ).data()[5];
        nama4    = myTable.row( $(this).parents('tr') ).data()[6];
        nama5    = myTable.row( $(this).parents('tr') ).data()[7];
        nama6    = myTable.row( $(this).parents('tr') ).data()[8];
        nama7    = myTable.row( $(this).parents('tr') ).data()[9];
        nama8    = myTable.row( $(this).parents('tr') ).data()[10];
        id  = myTable.row( $(this).parents('tr') ).data()[12];
        $('#txtNamaAsli').val(nama);
        $('#txtNim').val(nama1);
        $('#txtEmail').val(nama2);
        $('#txtDate').val(nama3);
        $('#txtIsiBalasan').val(nama4);
        $('#txtNimPengomentar').val(nama5);
        $('#txtIdKomentar').val(nama6);
        $('#txtIdKandidat').val(nama7);
        $('#txtNamaKandidat').val(nama8);
        $('#txtIdReply').val(id);

        myTable.ajax.reload();
                
    }); 

     $('#btnSimpan').click(function(){
            
        $.post( "<?php echo base_url(); ?>rkkdpm/add/", {
                type:1,
                txtIdReply:$('#txtIdReply').val(),
                txtNamaAsli:$('#txtNamaAsli').val(),
                txtNim:$('#txtNim').val(),
                txtEmail:$('#txtEmail').val(),
                txtDate:$('#txtDate').val(),
                txtIsiBalasan:$('#txtIsiBalasan').val(),
                txtNimPengomentar:$('#txtNimPengomentar').val(),
                txtIdKomentar:$('#txtIdKomentar').val(),
                txtIdKandidat:$('#txtIdKandidat').val(),
                txtNamaKandidat:$('#txtNamaKandidat').val()

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