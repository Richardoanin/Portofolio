<!doctype html>
<html lang="en">
  <head>
  	<title>PG Candi Baru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo-candi.png">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-3">
					<h1 class="heading-section mb-3">Selamat datang di SIGCG</h1>
					<img src="/assets/images/logocb.png" width="400" height="120">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
				<form action="/login" method="post">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control rounded-left" placeholder="Username" name="username" required>
					</div>
					<div class="form-group d-flex">
					<input type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
					</div>
					<div class="form-group">
						<input class="form-control btn btn-primary rounded submit px-3" type="submit" value="Login">
					</div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="/js/jquery.min.js"></script>
  <script src="/js/popper.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>

	</body>
</html>