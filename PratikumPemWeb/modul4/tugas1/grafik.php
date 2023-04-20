<?php
include 'data.php';
?>

<html>

<head>
	<title>Grafik Survey</title>
	<script type="text/javascript" src="assets/js/chart.js"></script>
</head>

<body>
	<style type="text/css">
		body {
			font-family: roboto;
		}

		table {
			margin: 0px auto;
		}
	</style>
	<h2 align="center">Hasil Survey Mahasiswa Universitas Palangkaraya</h2>
	<a href="index.php">
		<button class="btn-survei">
			Lihat Survei
		</button>
	</a>
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Teknik", "FKIP", "Ekonomi", "Pertanian"],
				datasets: [{
					label: '',
					data: [
						<?php
						$jumlah_teknik = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'Teknik'");
						echo mysqli_num_rows($jumlah_teknik);
						?>,
						<?php
						$jumlah_ekonomi = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'FKIP'");
						echo mysqli_num_rows($jumlah_ekonomi);
						?>,
						<?php
						$jumlah_fisip = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'Ekonomi'");
						echo mysqli_num_rows($jumlah_fisip);
						?>,
						<?php
						$jumlah_pertanian = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'Pertanian'");
						echo mysqli_num_rows($jumlah_pertanian);
						?>
					],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)'
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
	</script>
	<style>
		#datatable {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		#datatable caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		#datatable th {
			font-weight: 600;
			padding: 0.5em;
		}

		#datatable td,
		#datatable th,
		#datatable caption {
			padding: 0.5em;
		}

		#datatable thead tr,
		#datatable tr:nth-child(even) {
			background: #f8f8f8;
		}

		#datatable tr:hover {
			background: #f1f7ff;
		}

		p {
			display: block;
			margin-block-start: 1em;
			margin-block-end: 1em;
			margin-inline-start: 0px;
			margin-inline-end: 0px;
			text-align: center;
			font-size: larger;
			font-weight: bold;
		}

		.btn-survei {
			margin-top: 10px;
			margin-left: 47%;
			background-color: #269aff;
			color: white;
			height: 45px;
			width: 90px;
		}
	</style>
	<figure class="highcharts-figure">
		<div id="container"></div>
		<p class="highcharts-description"> Berikut adalah hasil survei.</p>
		<table id="datatable">
			<thead>
				<tr>
					<th>Fakultas</th>
					<th>Jumlah Mahasiswa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require 'data.php';
				$view = $koneksi->query("SELECT fakultas,COUNT(*) AS hasil FROM `mahasiswa` GROUP BY fakultas");
				while ($row = $view->fetch_array()) { ?>
					<tr>
						<td><?php echo $row['fakultas']; ?></td>
						<td><?php echo $row['hasil']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</figure>

</body>

</html>