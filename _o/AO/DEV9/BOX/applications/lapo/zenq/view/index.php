<main class="main">
	<!-- Breadcrumb-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Dashboard</li>
		<!-- Breadcrumb Menu-->
		<li class="breadcrumb-menu d-md-down-none">
			<div class="btn-group" role="group" aria-label="Button group">
				<a class="btn" href="#">
					<i class="icon-speech"></i>
				</a>
				<a class="btn" href="./">
					<i class="icon-graph"></i>  Dashboard</a>
					<a class="btn" href="#">
						<i class="icon-settings"></i>  Quick Overview</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-sm-12">
							<div class="card text-white bg-white">
								<div class="card-body">
									<input class="form-control" id="company" type="text" placeholder="Search for...">
									<input type="submit" value="Search" class="mt-3 btn btn-success" />
								</div>
							</div>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-success">
									<div class="card-header">Members Contributions</div>
									<div class="card-body">
										<div class="count_number">Number : 7</div>
										<div class="count_amount">Amt : 1,324,000.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-primary">
									<div class="card-header">Applied Loans</div>
									<div class="card-body">
										<div class="count_number">Number : 13</div>
										<div class="count_amount">Amt : 5,474,371.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-success">
									<div class="card-header">Approved Loans</div>
									<div class="card-body">
										<div class="count_number">Number : 1</div>
										<div class="count_amount">Amt : 800,067.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-primary">
									<div class="card-header">In Progress</div>
									<div class="card-body">
										<div class="count_number">Number : 4</div>
										<div class="count_amount">Amt : 2,220,000.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-warning">
									<div class="card-header">Pending Loans</div>
									<div class="card-body">
										<div class="count_number">Number : 3</div>
										<div class="count_amount">Amt : 2,220,004.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-danger">
									<div class="card-header">Declined Loans</div>
									<div class="card-body">
										<div class="count_number">Number : 1</div>
										<div class="count_amount">Amt : 45,000.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-info">
									<div class="card-header">Disbursed Loans</div>
									<div class="card-body">
										<div class="count_number">Number : 7</div>
										<div class="count_amount">Amt : 1,021,112.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-success">
									<div class="card-header">Total interest</div>
									<div class="card-body">
										<div class="count_number">Number : 40</div>
										<div class="count_amount">Amt : 50,021,112.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-danger">
									<div class="card-header">Registered members</div>
									<div class="card-body">
										<div class="count_number">Number : 40</div>
										<div class="count_amount">Amt : 20,021,112.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-3">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-success">
									<div class="card-header">Total Inventory</div>
									<div class="card-body">
										<div class="count_number">Number : 100</div>
										<div class="count_amount">Amt : 500,021,112.00</div>
									</div>
								</div>
							</a>
						</div>
						<!-- /.col-->
						<div class="col-sm-6 col-md-6">
							<a href="#" style="text-decoration: none;">
								<div class="card text-white bg-primary">
									<div class="card-header">Total savings</div>
									<div class="card-body">
										<div class="count_number">Number : 100</div>
										<div class="count_amount">Amt : 500,021,112.00</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- /.row-->
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">Chart Of Loan Application</div>
								<div class="card-body">
									<div class="chart-wrapper">
										<canvas id="pieChart" width="400" height="200"></canvas>
										<script src="node_modules/jquery/dist/jquery.min.js"></script>
										<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
										<script>
											var ctx = document.getElementById('pieChart').getContext('2d');
											var myChart = new Chart(ctx, {
												type: 'bar',
												data: {
													labels: ['Approved', 'Pending', 'Declined', 'In-Progress', 'Disbursed'],
													datasets: [{
														label: '#5 of Votes',
														data: [12, 19, 3, 5, 2],
														backgroundColor: [
														'green',
														'blue',
														'red',
														'yellow',
														'orange'
														],
														borderColor: [
														'rgba(255, 99, 132, 1)',
														'rgba(54, 162, 235, 1)',
														'rgba(255, 206, 86, 1)',
														'rgba(75, 192, 192, 1)',
														'rgba(153, 102, 255, 1)'
														],
														borderWidth: 1
													}]
												},
												options: {
													responsive: true,
													maintainAspectRatio: false,
													tooltips: {
														callbacks: {
															label: function(tooltipItem, data) {
																return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
															}
														}
													},
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
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">Chart Of Loan Volume</div>
								<div class="card-body">
									<div class="chart-wrapper">
										<canvas id="barChart" width="400" height="200"></canvas>
										<script src="node_modules/jquery/dist/jquery.min.js"></script>
										<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
										<script>
											var ctx = document.getElementById('barChart').getContext('2d');
											var myChart = new Chart(ctx, {
												type: 'pie',
												data: {
													labels: ['Approved', 'Pending', 'Declined', 'In-Progress', 'Disbursed'],
													datasets: [{
														label: '#5 of Votes',
														data: [12, 19, 3, 5, 2],
														backgroundColor: [
														'green',
														'blue',
														'red',
														'yellow',
														'orange'
														],
														borderColor: [
														'rgba(255, 99, 132, 1)',
														'rgba(54, 162, 235, 1)',
														'rgba(255, 206, 86, 1)',
														'rgba(75, 192, 192, 1)',
														'rgba(153, 102, 255, 1)'
														],
														borderWidth: 1
													}]
												},
												options: {
													responsive: true,
													maintainAspectRatio: false,
													tooltips: {
														callbacks: {
															label: function(tooltipItem, data) {
																return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
															}
														}
													},
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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>