<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Nilai Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>UNIVERSITAS JAYANTARA</h1>
            <div class="date">
                <p><?php echo date('l, d-m-Y h:i:s a') ?></p>
            </div>
        </div>
        <div class="input-form">
			<h2>Input Nilai Mahasiswa Mata Kuliah Aplikasi Komputer</h2>
			<form action="sorting.php" method="POST">
				<table>
					<tr>
						<td><label for="nama">Nama</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" name="nama" id="nama" placeholder="Nama" required></td>
					</tr>
					<tr>
						<td><label for="jk">Jenis Kelamin</label></td>
						<td>:</td>
						<td>
							<input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-Laki
							<input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
						</td>
					</tr>
					<tr>
						<td><label for="prodi">Program Studi</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="prodi" name="program_studi" value="Manajemen Informatika" disabled></td>
					</tr>
					<tr>
						<td><label for="uts">UTS Teori</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="uts" name="uts_teori" placeholder="UTS Teori" required></td>
					</tr>
					<tr>
						<td><label for="uas">UAS Teori</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="uas" name="uas_teori" placeholder="UAS Teori" required></td>
					</tr>
					<tr>
						<td><label for="quiz">Quiz</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="quiz" name="quiz" id="quiz" placeholder="Quiz" required></td>
					</tr>
					<tr>
						<td><label for="utsp">UTS Praktikum</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="utsp" name="uts_praktikum" id="uts_praktikum" placeholder="UTS Praktikum" required></td>
					</tr>
					<tr>
						<td><label for="uasp">UAS Praktikum</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="uasp" name="uas_praktikum" id="uas_praktikum" placeholder="UAS Praktikum" required></td>
					</tr>
					<tr>
						<td><label for="word">Tugas Word</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="word" name="tugas_word" id="tugas_word" placeholder="Tugas Word" required></td>
					</tr>
					<tr>
						<td><label for="ppt">Tugas PPT</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="ppt" name="tugas_ppt" id="tugas_ppt" placeholder="Tugas PPT" required></td>
					</tr>
					<tr>
						<td><label for="mulok">Muatan Lokal</label></td>
						<td>:</td>
						<td><input type="text" class="input_ukom" id="mulok" name="muatan_lokal" id="muatan_lokal" placeholder="Muatan Lokal" required></td>
					</tr>
					<tr>
						<td><input type="submit" class="btn-green" name="submit" value="Urutkan Data"></td>
						<td></td>
						<td><input type="reset" class="btn-red" value="Hapus Formulir"></td>
					</tr>
				</table>
			</form>
		</div>
    </div>
</body>
</html>