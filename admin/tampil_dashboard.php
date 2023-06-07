<!DOCTYPE html>
<html>
<head>
  <title></title>
   <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

</body>
</html>

<script>
  // === include 'setup' then 'config' above ===
  
</script>

    

</body>
<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">
                
                  <table width="100%">
                    <tr>
                      <td>Pasien</td>
                      <td>Laki-Laki</td>
                      <td>Perempuan</td>
                    </tr>
                  
                    <?php foreach($query as $row) : ?>
                      <tr>
                        <td><?php echo $row["hitung_jk_laki2"]; ?></td>
                        <td><?php echo $row["jumlah_laki2"]; ?></td>
                        <td><?php echo $row["jumlah_perempuan"]; ?></td>
                        <td><?php echo $row["hitung_jk_perempuan"]; ?></td>
                        
                      </tr>
                    <?php endforeach;?>
                  </table>

              </div>
              <div class="card-footer d-flex">
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card bg-warning text-dark h-100">
              <div class="card-body py-5">
              <table width="100%">
                    <tr>
                      <td>Dokter spesialis</td>
                      <td>Jumlah</td>
                    </tr>
                  
                    <?php foreach($query_dokter as $set) : ?>
                      <tr>
                        <td><?php echo $set["spesial"]; ?></td>
                        <td><?php echo $set["jmlh"]; ?></td>
                      </tr>
                    <?php endforeach;?>
                  </table>
              </div>
              <div class="card-footer d-flex">
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">
              <table width="100%">
                    <tr>
                      <td>Room yang ada</td>
                      <td>Jumlah</td>
                    </tr>
                  
                    <?php foreach($query_room as $sets) : ?>
                      <tr>
                        <td><?php echo $sets["room"]; ?></td>
                        <td><?php echo $sets["jumlah_room"]; ?></td>
                      </tr>
                    <?php endforeach;?>
                  </table>
            </div>
              <div class="card-footer d-flex">
                <a href=""></a>
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
        <div class="container text-center" >
            <div class="row">
            <center>
                <div class="col border me-3">
                <div style="width: 850px;">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            </center>
            </div>

            
        </div>
        
    </div>
        

    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>

<!-- for pasien-->


<script>
  // === include 'setup' then 'config' above ===
    const labels2 = <?php echo json_encode($spesialis) ?>;
    const labels3 = <?php echo json_encode($nama) ?>;
  
  
    const data2 = {
        labels: labels2,
        datasets: [{
        label: 'Dokter',
        data: <?php echo json_encode($jmlh) ?>,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        }]
    };
    

  const config2 = {
    type: 'line',
    data: data2,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );

  
</script>

<!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>