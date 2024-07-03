<?php
require 'main_function.php';
require 'cek.php';
?>  

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Barang Masuk</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.php" class="logo">
					<p class="navbar-brand fw-bold text-white">SI-Stock<span class="fw-light">Barang</span></p>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets\img\profil.jpeg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<a class="dropdown-item fw-bold" href="Logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
				<ul class="nav nav-primary">
						<li class="nav-item">
							<a href="Index.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Main Data</h4>
						</li>
						<li class="nav-item">
							<a href="Stock_barang.php">
								<i class="fas fa-layer-group"></i>
								<p>Stock Barang</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="Barang_masuk.php">
								<i class="fas fa-th-list"></i>
								<p>Stock Barang Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="Barang_keluar.php">
								<i class="fas fa-th-list"></i>
								<p>Stock Barang Keluar</p>
							</a>
						</li>
                        <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Transaksi</h4>
						</li>
						<li class="nav-item">
							<a href="transaksi_barang_masuk.php">
								<i class="fas fa-table"></i>
								<p>Transaksi Barang Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="transaksi_barang_keluar.php">
								<i class="fas fa-table"></i>
								<p>Transaksi Barang Keluar</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Stock Barang Masuk</h2>
								<h5 class="text-white op-7 mb-2">Stock Barang</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Stock Barang</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah data
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
                                                        Form Input Data Barang Masuk
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
                                                                    <select name="id_barang" class="form-control">
                                                                        <?php
                                                                            $all_data =  mysqli_query($conn,"select * from stock");
                                                                            while($fetcharray = mysqli_fetch_array($all_data)) {
                                                                                $barang = $fetcharray['nama_barang'];
                                                                                $id_barang = $fetcharray['id_barang'];
                                                                        ?>
                                                                            <option value="<?= $id_barang;?>"><?= $barang;?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
																</div>
															</div>
															<?php
															$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
															$randomString = substr(str_shuffle($characters), 0, 5);
															$kode_trans = date('Ymd').$randomString;
															
															?>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label  class="fw-bold">Keterangan</label>
																	<input type="text" hidden name="kode_trans" value="<?= $kode_trans;?>">
																	<input name="keterangan" type="text" class="form-control" placeholder="Masukkan keterangan..." require_once>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label  class="fw-bold">Quantity</label>
																	<input name="qty" type="number" class="form-control" placeholder="Masukkan jumlah..." required>
																</div>
															</div>
														</div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="submit" name="add_barang_masuk" id="addRowButton" class="btn btn-primary">Save</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
											</div>
										</div>
									</div>

									<div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Keterangan</th>
													<th>Quantity</th>
                                                    <th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
                                                // $i = 1;
												$get_all_data = mysqli_query($conn, "select * from barang_masuk m, stock s where s.id_barang = m.id_barang ");
                                                while($data = mysqli_fetch_array($get_all_data)){
                                                        $nama_barang = $data['nama_barang'];
                                                        $tanggal = $data['tanggal'];
                                                        $keterangan = $data['keterangan'];
                                                        $qty = $data['qty'];
                                                        $id_masuk = $data['id_masuk'];
                                                        $id_barang = $data['id_barang'];
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal;?></td>
                                                        <td><?= $nama_barang;?></td>
                                                        <td><?= $keterangan;?></td>
                                                        <td><?= $qty;?></td>
                                                        <td>
															<div class="form-button-action">
                                                                <button type="button" class="btn btn btn-link btn-primary" data-toggle="modal" data-target="#edit<?= $id_masuk;?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <input type="hidden" name="id_masuk" value="<?= $id_masuk;?>">
                                                                <button type="button" data-toggle="modal" data-target="#delete<?= $id_masuk;?>" class="btn btn-link btn-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

													<!-- Modal edit-->
                                                    <div class="modal fade" id="edit<?= $id_masuk;?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">Edit Data</span> 
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post">
                                                                        <div class="row">
																			<input type="hidden" name="id_masuk" value="<?= $id_masuk;?>">
																			<input type="hidden" name="id_barang" value="<?= $id_barang;?>">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label class="fw-bold">Nama Barang</label>
                                                                                    <input readonly id="addName" name="nama_barang" type="text" class="form-control" value="<?= $nama_barang;?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label  class="fw-bold">Keterangan</label>
                                                                                    <input id="addPosition" name="keterangan" type="text" class="form-control" value="<?= $keterangan;?>">
                                                                                </div>
                                                                            </div>
																			<div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label  class="fw-bold">Quantity</label>
                                                                                    <input id="addPosition" name="qty" type="text" class="form-control" value="<?= $qty;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer no-bd">
                                                                        <button type="submit" name="update_barang_masuk" id="addRowButton" class="btn btn-primary">Save</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

													<!-- Modal delete -->
                                                    <div class="modal fade" id="delete<?= $id_masuk;?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-bold">Konfirmasi Hapus</span> 
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post">
																		<input type="hidden" name="id_masuk" value="<?= $id_masuk;?>">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <h3 class="fw-light">Apakah anda yakin menghapus, <span class="fw-bold"><?= $nama_barang;?></span>?</h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer no-bd">
                                                                        <button type="submit" name="hapus_barang_masuk" id="addRowButton" class="btn btn-primary">Hapus</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                };?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						Copyright 2024, by <a href="Index.php">SI-StockBarang</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
	<!-- <script src="assets/js/demo.js"></script> -->
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			// $('#addRowButton').click(function() {
			// 	$('#add-row').dataTable().fnAddData([
			// 		$("#addName").val(),
			// 		$("#addPosition").val(),
			// 		$("#addOffice").val(),
			// 		action
			// 		]);
			// 	$('#addRowModal').modal('hide');

			// });
		});
	</script>
</body>
</html>