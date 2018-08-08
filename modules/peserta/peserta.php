<?php
	$action = "modules/peserta/act_peserta.php";
	$act = @$_GET['act'];

	switch ($act) {
		case 'cari':
			echo"
				<form method='POST' action='' >
				<SELECT name=cari>
						<option value='1'>Programmer Madya</option>
						<option value='2'>Multimedia</option>
						<option value='3'>Networking</option>
					 </select>
				<input type='submit' name='submit' value='proses'>
				</form>";
				
				
				if (isset($_POST['submit'])) {
					//ini query untuk menampilkan skema
					$q = mysql_fetch_assoc(mysql_query("select * from tb_skema where id_skema='$_POST[cari]'"));
					
					echo "<h3>".$q['nama_skema']."</h3>";
					
					$query = mysql_query("select tb_skema.nama_skema,tb_peserta.nama
					from tb_peserta left join tb_skema on tb_peserta.id_skema = tb_skema.id_skema
					where tb_peserta.id_skema= '$_POST[cari]'") or die(mysql_error());
					$jumlah = mysql_num_rows($query);
					echo "<h3>Jumlah Peserta ".$q['nama_skema'].": ".$jumlah." Orang</h3>";
					echo"<ul>";
						while ($b = mysql_fetch_assoc($query)) {
							echo"<li>".$b['nama']."</li>";
						}
						
					echo"</ul>";
				}
			
		
		break;
		case 'form':

			echo"<h3 style='align=center'> Data Peserta</h3>
			<form action='".$action."?mod=peserta&act=simpan' class='form' method='post'>
				<table width='100%'>
					<tr>
						<td width='150px'>NIK</td>
						<td width='10px'>:</td>
						<td><input type='text' name='nik' id='nik' placeholder='nik...' required></td>
					</tr>
					<tr>
						<td>NAMA</td>
						<td>:</td>
						<td><input type='text' name='nama' placeholder='nama...' required></td>
					</tr>
					<tr>
						<td>TGL. LAHIR</td>
						<td>:</td>
						<td><input type='date' name='tgl_lahir' id='datepicker' placeholder='99/99/1999' required></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type='email' name='email' placeholder='email...' required></td>
					</tr>
					<tr>
						<td>HP</td>
						<td>:</td>
						<td><input type='text' name='hp' placeholder='nomor handphone...' required></td>
					</tr>
					<tr>
						<td>Organisasi</td>
						<td>:</td>
						<td><input type='text' name='organisasi' placeholder='Orgnisasi...' required></td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>:</td>
						<td>
							<select name='lokasi'>";
							$query=mysql_query("SELECT * FROM tb_lokasi");
							while($a=mysql_fetch_assoc($query)) {
								echo "<option value='".$a['id_lok']."'>".$a['tuk']."</<option>";
							}

							echo"</select>
						</td>
					</tr>
					<tr>
						<td>Skema Sertifikasi</td>
						<td>:</td>
						<td>
							<select name='skema'>";
							$query2=mysql_query("SELECT * FROM tb_skema");
							while($b=mysql_fetch_assoc($query2)) {
								echo "<option value='".$b['id_skema']."'>".$b['nama_skema']."</<option>";
							}
							echo"</select>
						</td>
					</tr>

					<tr>
						<td>REKOMENDASI</td>
						<td>:</td>
						<td>
							<select name='rekomendasi'>
								<option value='KOMPETEN'>BERKOMPETENSI</option>
								<option value='BELUM KOMPETEN'>BELUM BERKOMPETENSI</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>TGL. TERBIT SERTIFIKAT</td>
						<td>:</td>
						<td><input type='date' name='tgl_terbit' id='datepicker' placeholder='99/99/1999' required></td>
					</tr>
					<tr>
						<td colspan=2>
							<input type=submit value=Simpan>
							<input type=button value=Batal onclick=self.history.back()>
						</td>
					</tr>

				</table>
			</form>";
			break;
			case 'editform':
				$id = @$_GET['id'];//mengambil id dari addressbar
				//query untuk mengambil data dari table

				$query = mysql_query("SELECT a.*,b.* FROM tb_peserta  a left join tb_hasil_sertifikasi b on a.id=b.id_peserta

					 WHERE id = '$id' ");
				$peserta = mysql_fetch_array($query);//memecah hasil query ke dalam array
				echo"<h3>Update Data Peserta</h3><form action='".$action."?mod=peserta&act=update' class='form' method='post'>
					<table width='100%'>
						<tr>
							<td width='150px'>NIK</td>
							<td width='10px'>:</td>
							<td><input type='text' name='nik' id='nik' value='".$peserta['nik']."' placeholder='nik...' required></td>
						</tr>
						<tr>
							<td>NAMA</td>
							<td>:</td>
							<td><input type='text' name='nama' value='".$peserta['nama']."' placeholder='nama...' required></td>
						</tr>
						<tr>
							<td>TGL. LAHIR</td>
							<td>:</td>
							<td><input type='date' name='tgl_lahir'  value='".$peserta['tgl_lahir']."' id='datepicker' placeholder='99/99/1999' required></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type='email' name='email'  value='".$peserta['email']."' placeholder='email...' required></td>
						</tr>
						<tr>
							<td>HP</td>
							<td>:</td>
							<td><input type='text' name='hp' id='hp'  value='".$peserta['hp']."' placeholder='nomor handphone...' required></td>
						</tr>
						<tr>
							<td>Organisasi</td>
							<td>:</td>
							<td><input type='text' name='organisasi'  value='".$peserta['organisasi']."' placeholder='Orgnisasi...' required></td>
						</tr>
						<tr>
							<td>Lokasi</td>
							<td>:</td>
							<td>
								<select name='lokasi'>";
								$query=mysql_query("SELECT * FROM tb_lokasi");
								while($a=mysql_fetch_assoc($query)) {
									echo "<option value='".$a['id_lok']."'>".$a['tuk']."</<option>";
								}

								echo"</select>
							</td>
						</tr>
						<tr>
							<td>Skema Sertifikasi</td>
							<td>:</td>
							<td>
								<select name='skema'>";
								$query2=mysql_query("SELECT * FROM tb_skema");
								while($b=mysql_fetch_assoc($query2)) {
									echo "<option value='".$b['id_skema']."'>".$b['nama_skema']."</<option>";
								}
								echo"</select>
							</td>
						</tr>

						<tr>
							<td>REKOMENDASI</td>
							<td>:</td>
							<td>
								<select name='rekomendasi'>
									<option value='KOMPETEN'>BERKOMPETENSI</option>
									<option value='BELUM KOMPETEN'>BELUM BERKOMPETENSI</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>TGL. TERBIT SERTIFIKAT</td>
							<td>:</td>
							<td><input type='date' name='tgl_terbit' value='".$peserta['tgl_terbit_sk']."' id='datepicker' placeholder='99/99/1999' required></td>
						</tr>
						<tr>
							<td colspan=2>
								<input type='hidden' name='id_peserta' value='".$peserta['id']."'>
								<input type=submit value=Update>
								<input type=button value=Batal onclick=self.history.back()>
							</td>
						</tr>

					</table>
				</form>";



			break;
		case "jumlah":
		$getlokasi='$_GET[id_lokasi]';
				$query2 = "SELECT count(*) as lokasijumlah FROM tb_peserta a
									left join tb_lokasi c on c.id_lok=a.id_lokasi
									where id_lok='.$getlokasi.'
									";
				$result = mysql_query($query) or die(mysql_error());
				//$temukan2 = mysql_num_rows($result);
		echo "Jumlah Peserta Berdasarkan Lokasi $result[lokasijumlah]";
		break;
		default:
			echo"<table class='table'>
				<tr>
					<th>#</th>
					<th>NIK</th>
					<th>NAMA</th>
					<th>TGL. LAHIR</th>
					<th>NO. HP</th>
					<th>EMAIL</th>
					<th>SKEMA</th>
					<th>ORGANISASI</th>
					<th>REKOMENDASI</th>
					<th>TGL. TERBIT S.</th>
					<th>Action</th>
				</tr>";

				$query = "SELECT a.*,b.*,c.*,d.* FROM tb_peserta a
									left join tb_lokasi c	on c.id_lok=a.id_lokasi
									left join tb_hasil_sertifikasi b	on a.id=b.id_peserta
									left join tb_skema d on d.id_skema = a.id_skema 
									ORDER BY a.tgl_lahir ASC";
				$result = mysql_query($query) or die(mysql_error());
				$temukan = mysql_num_rows($result);

				if ($temukan > 0) {
					$no = 1;
					while ($data = mysql_fetch_assoc($result)) {
						$id=$data['id'];
						$id_lok=$data['id_lok'];
						echo"<tr>
							<td>".$no."</td>
							<td>".$data['nik']."</td>
							<td>".$data['nama']."</td>
							<td>".$data['tgl_lahir']."</td>
							<td>".$data['hp']."</td>
							<td>".$data['email']."</td>
							<td>".$data['nama_skema']."</td>
							<td>".$data['organisasi']."</td>
							<td>".$data['status']."</td>
							<td>".$data['tgl_terbit_sk']."  <br> 
							<a href='med.php?mod=peserta&act=jumlah&id_lokasi=$id_lok'>Lokasi TUK : ".$data['tuk']."</a></td>
							<td><a href='med.php?mod=peserta&act=editform&id=$id'>EDIT</a> |
									<a href='".$action."?mod=peserta&act=delete&id=$id'>DELETE</a>
							</td>
						</tr>";

						$no++;
					}
				}
			echo"</table> <br>";
				
				
			
			


			break;
	}
?>
 