
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Register Chart</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor Register Chart</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
          <div class="col-md-12">
            <div class="container">  
                        <br/>  
                        <h2 class="text-center"> Vendor Register chart </h2>  
                        <div class="row">  
                            <div class="col-md-10 col-md-offset-1">  
                                <div class="panel panel-default">  
                                    <!--<div class="panel-heading">Month wise Vendor registered </div>  -->
                                    <div class="panel-body">  
                                        <div id="container"></div>  
                                    </div>  
                                </div>  
                            </div>  
                        </div>  
                 
                  
                </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://code.highcharts.com/highcharts.js"></script> 
  
<script type="text/javascript">  
    var data_viewer = <?php echo $chartdata; ?>;  
    
    Highcharts.chart('container', {

    title: {
        text: 'Vendor Register chart'
    },

    xAxis: {
        tickInterval: 1,
        type: 'logarithmic',
        accessibility: {
            rangeDescription: 'Range: 1 to 100'
        }
    },

    yAxis: {
        type: 'logarithmic',
        minorTickInterval: 1,
        accessibility: {
            rangeDescription: 'Range: 1 to 1000'
        }
    },

    tooltip: {
        headerFormat: '<b>{series.name}</b><br />',
        pointFormat: 'x = {point.x}, y = {point.y}'
    },

    series: [{
        data: data_viewer,
        pointStart: 1
    }]
});
    
    
</script>  
