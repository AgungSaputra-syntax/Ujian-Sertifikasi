<?php 
  require('fpdf/fpdf.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nilai Input</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    #myChart{
      display: none;
    }
  </style>
</head>
<body>
  <?php 
    $nilai = [];
    $mk = [];
    $dataPDF = [];
  if(isset($_POST["submit"])){
    $utsTeori     = $_POST['uts_teori'];
    $uasTeori     = $_POST['uas_teori'];
    $kuis         = $_POST['quiz'];
    $utsPraktikum = $_POST['uts_praktikum'];
    $uasPraktikum = $_POST['uas_praktikum'];
    $tugasWord    = $_POST['tugas_word'];
    $tugasPPT     = $_POST['tugas_ppt'];
    $muatanLokal  = $_POST['muatan_lokal'];

    $data = array(
      "UTS Teori"       => $utsTeori,
      "UAS Teori"       => $uasTeori,
      "Quiz"            => $kuis,
      "UTS Praktikum"   => $utsPraktikum,
      "UAS Praktikum"   => $uasPraktikum,
      "Tugas Word"      => $tugasWord,
      "Tugas PPT"       => $tugasPPT,
      "Muatan Lokal"    => $muatanLokal,
    );

    asort($data);
    show_data($data);
    getArray($data);
  }

  function getArray($data){
    global $dataPDF;
    $dataPDF = $data;

    return $dataPDF;
  }

  function show_data($array)
  {
    global $nilai,$mk;
    ?>
    <div class="container">
  
    <center><h2>Nilai Aplikasi Komputer <?php echo $_POST['nama'] ?></h2></center>
      <table class="tbl_nilai" border="1" cellspacing="0" cellpadding="5">
        <?php foreach($array as $key => $value) { ?>
        <tr>
          <td><?php echo $key; ?></td>
          <td><?php echo $value; ?></td>
          <!-- input push = input value baru ke dalam array -->
          <?php array_push($nilai, $value) ?>
          <?php array_push($mk, $key) ?>
        </tr>
        <?php } ?>
      </table>
      
      <br>
      <a onClick="cetakGrafik()" class="btn-green1">Cetak Grafik</a>
      <a onClick="cetakPDF()" class="btn-green1">Cetak PDF</a>
    <?php
  }

  function js_str($s)
  {
      return '"' . addcslashes($s, "\0..\37\"\\") . '"';
  }

  function js_array($array)
  {
      $temp = array_map('js_str', $array);
      return '[' . implode(',', $temp) . ']';
  }

// echo 'var cities = ', js_array($php_cities_array), ';';

  ?>

    <canvas id="myChart"></canvas>
    <table id="my-table"><!-- ... --></table>
  
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/jspdf-autotable@3.2.4/dist/jspdf.plugin.autotable.js"></script>
  <script>
    function cetakGrafik(){
      document.getElementById('myChart').style.display = 'block';
      var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: <?php echo js_array($mk) ?>,
          datasets: [{
              label: '# of Votes',
              data: <?php echo js_array($nilai) ?>,
              backgroundColor: [
                  'rgb(195, 18, 86)',
                  'rgb(18, 195, 127)',
                  'rgb(195, 18, 86)',
                  'rgb(18, 195, 127)',
                  'rgb(195, 18, 86)',
                  'rgb(18, 195, 127)',
                  'rgb(195, 18, 86)',
                  'rgb(18, 195, 127)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
    }

    function cetakPDF(){
      var words = <?php echo json_encode($dataPDF) ?>;
      var rows = [];
      var col = ["Komponen Penilaian", "Nilai"];
      for(var key in words){
         var temp = [key, words[key]];
         rows.push(temp);
      }

      var doc = new jsPDF();
      doc.autoTable(col, rows);

    
    doc.save('table.pdf');
    }
  </script>
</body>
</html>