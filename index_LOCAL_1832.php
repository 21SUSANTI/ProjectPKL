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
					<header id="header" class="alt">
					<h1>DINAS TENAGA KERJA<br> Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Malang </h1>
					<p>Program pelatihan kerja ini memberikan kamu kesempatan untuk mengasah keterampilan agar siap bekerja <br> Terdapat 5 bidang keterampilan yang bisa kamu pilih.</p>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Beranda</a></li>
							<li><a href="#second">Pelatihan</a></li>
							<li><a href="#tiga">Tata Cara dan Persyaratan</a></li>
							<li><a href="#empat">Pengumuman</a></li>
							<li><a href="#lima">Dokumentasi</a></li>
							<li><a href="#cta">Admin</a></li>
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
										<p>Pelatihan kerja yang dilaksanakan oleh DISNAKER PMPTSP bertujuan untuk memberikan kesempatan kepada calon pekerja untuk melatih keterampilannya. Terdapat 5 kategori keterampilan yang bisa dipilih sesuai dengan minat dan bakat. Jangan sampai ketinggalan!</p>
									</div>
									<img src="img/landing.jpg" class="landing" />
								</div>
							</section>

						<!-- First Section -->
							

						<!-- Second Section -->
							<section id="second" class="main special">
								<header class="major">
									<h2><strong>DAFTAR PELATIHAN</strong></h2>
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
                                                <td><a href="apply.php?id=<?=$idjob;?>" class="btn btn-primary">Apply</a></td>
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
									<h2>Tata Cara dan Persyaratan</h2>
								</header>
								<footer class="major">
									<ul class="actions special">
										<li><a href="persyaratan.php" class="button primary">Download</a></li>
										<!-- <a href="downloadPersyaratan.php?file=<?php echo $rows['TCpersyaratan'] ?>">Download</a><br> -->
									</ul>
								</footer>
							</section>

						<!-- Get Started -->
							<section id="cta" class="main special">
								<header class="major">
									<h2>Kelola Web Sebagai Admin</h2>
								</header>
								<footer class="major">
									<ul class="actions special">
										<li><a href="login.php" class="button primary">Login</a></li>
									</ul>
								</footer>
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">DISNAKER PMPTSP 2022</p>
					</footer>

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