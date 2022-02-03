<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="m-0">Data Aktifitas Pengguna</h1>
            <?= $this->session->flashdata('message'); ?>
        </div><!-- /.col -->
        
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
    <div>
        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    </div>
    
<script>
    var xValues = ["Update Nama Profile", "Ganti Password", "Komentar"];
    var yValues = [16, 3, 8];
    var barColors = ["red", "green","blue"];

    new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    });
</script>
</div>

