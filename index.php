<?php
session_start();
require 'backend/koneksi.php';
date_default_timezone_set("Asia/Bangkok");
$date_now = date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Online Pelatihan Kerja</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>


    <body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<!-- <header id="header" class="alt">
					<h1>DINAS TENAGA KERJA<br> Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Malang </h1>
					<p>Program pelatihan kerja ini memberikan kamu kesempatan untuk mengasah keterampilan agar siap bekerja <br> Terdapat 5 bidang keterampilan yang bisa kamu pilih.</p>
					</header> -->

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Beranda</a></li>
							<li><a href="#second">Pelatihan</a></li>
							<li><a href="#tiga">Tata Cara dan Persyaratan</a></li>
							<li><a href="#empat">Pengumuman</a></li>
							<!-- <li><a href="#lima">Dokumentasi</a></li> -->
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>PELATIHAN KERJA</h2>
										</header>
										<p align=left>Pelatihan kerja yang dilaksanakan oleh Dinas Ketenagakerjaan, Penanaman Modal dan Pelayanan Terpadu Satu Pintu atau biasa disebut DISNAKER PMPTSP. Pelatihan ini bertujuan untuk memberikan kesempatan kepada calon pekerja untuk melatih keterampilannya. Terdapat banyak kategori keterampilan yang bisa dipilih sesuai dengan minat dan bakat.</p> <p>Ayo ikutan dan jangan sampai ketinggalan!</p>
									</div>
									<img src="img/pelatihan.jpeg" class="landing" />
								</div>
							</section>

						<!-- First Section -->
							
						<!-- Second Section -->
							<section id="second" class="main special">
								<header class="major">
									<h2><strong>PELATIHAN</strong></h2>
                                </header>
                                <div class="table-wrapper">
								<table class="alt">
                                    <thead>
                                    <tr>
                                        <th>Posisi Tersedia</th>
                                        <th>Periode</th>
                                        <th>Deadline Pendaftaran</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $getdata = mysqli_query($conn,"select * from job where registerend>'$date_now'");
                                            while($data=mysqli_fetch_array($getdata)){
                                            $idjob = $data['id'];
                                            $namajob = $data['jobname'];
                                            $descjob = $data['jobdesc'];
                                            $mulai = date_format(date_create($data['jobstart']),"d M Y");
                                            $selesai = date_format(date_create($data['jobend']),"d M Y");
                                            $periode = $mulai." - ".$selesai;
                                            $deadline = date_format(date_create($data['registerend']),"d M Y");
                                            $jobloc = $data['jobloc'];
                                            $workingtype = $data['workingtype'];
                                            ?>
                                            
                                            <tr>
                                                
                                                <td><?=$namajob;?></td>
                                                <td><?=$periode;?></td>
                                                <td><?=$deadline;?></td>
                                                <td><a href="apply.php?id=<?=$idjob;?>" class="btn btn-primary">Registrasi</a></td>
                                            </tr>
                                            
                                            <?php
                                            };

                                            ?>
                                    </tbody>
                                </table>
                            </div>
							</section>

							<!-- Tiga Section -->
							<section id="tiga" class="main special">
								<header class="major">
									<h2><strong>TATA CARA DAN PERSYARATAN</strong></h2>
								</header>
								<footer class="major">
									<ul class="actions special">
										<?php
										$query2 = "SELECT * FROM persyaratan ";
										$run2 = mysqli_query($conn,$query2);
										
										while($rows = mysqli_fetch_assoc($run2)){
											?>
										<a class="btn btn-success" href="downloadPersyaratan.php?file=<?php echo $rows['tataCara'] ?>">DOWNLOAD</a><br>
										<?php
										}
										?>
									</ul>
								</footer>
							</section>
							<!-- Empat -->
							<section id="empat" class="main special">
								<header class="major">
									<h2><strong>PENGUMUMAN</strong></h2>
								</header>
								<footer class="major">
									<ul class="actions special">
										<?php
										$query2 = "SELECT * FROM pengumuman ";
										$run2 = mysqli_query($conn,$query2);
										
										while($rows = mysqli_fetch_assoc($run2)){
											?>
										<a class="btn btn-success" href="downloadPengumuman.php?file=<?php echo $rows['filePengumuman'] ?>">DOWNLOAD</a><br>
										<?php
										}
										?>
									</ul>
								</footer>
							</section>
							<!-- Lima -->
							<!-- <section id="lima" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2><b>DOKUMENTASI</b></h2>
										</header>
										
									</div>
									<img src="img/landing.jpg" class="landing" />
								</div>
							</section> -->
					</div>
				<br><br>
				<!-- Footer -->
					<footer id="footer text-center text-white">
						<!-- Section: Social media -->
						<section class="mb-4 align-center">

						<!-- Twitter -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/nakerpmptsp_mlg?s=20" role="button"
							><i class="fab fa-twitter"></i
						></a>

						<!-- Google -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://disnakerpmptsp.malangkota.go.id/" role="button"
							><i class="fab fa-google"></i
						></a>

						<!-- Instagram -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://instagram.com/nakerpmptsp_kotamalang?utm_medium=copy_link" role="button"
							><i class="fab fa-instagram"></i
						></a>
						
						</section>
						<!-- Section: Social media -->
					

					<!-- Copyright -->
					<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
						© 2022 Copyright: DISNAKER-PMPTSP
					</div>
					<!-- Copyright -->
					</footer>
					<!-- Footer -->

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>