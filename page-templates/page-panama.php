<?php
/*
	Template Name: Panama Page
*/
?>

<?php
$video_url = get_field( 'video' );
?>

<!doctype html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Renan Sigolo">
	<title>Panama · Free Travel Culture</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

	<!-- Bootstrap core CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<!-- Custom styles for this template -->
	<link href="heroes.css" rel="stylesheet">
	</head>
	<body>
	
<main>
	<h1 class="visually-hidden">Panama Page</h1>

	<div class="b-example-divider"></div>

	<section class="container px-4 pt-5 my-5 text-center">
	<h1 class="display-4 fw-bold">Free Travel Culture</h1>
	<div class="col-lg-6 mx-auto">
		<p class="lead text-secondary mb-5">4 Week Hackathon for Panamanian University Students</p>
	</div>
	<div class="row">
		<div class="col-lg-6 mx-auto">
		<div class="ratio ratio-16x9">
			<video controls class="rounded-3">
			<source src="<?php echo $video_url; ?>" type="video/mp4" />
			</video>
		</div>
		</div>
	</div>
	</section>

	<!-- <div class="row">
	<div class="col-lg-11 mx-auto">
		<hr />
	</div>
	</div> -->
	
	<!-- <section class="container mt-3 mb-5">
	<div class="row text-center">
		<div class="col-lg-6 mx-auto mb-4">
		<h2 class="display-5 fw-bold">Apply Now</h2>
		<p class="lead text-secondary">Classes starting in August</p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6 mx-auto">
		<form>
			<div class="mb-3">
			<label for="name" class="form-label">Full Name</label>
			<input type="email" class="form-control" id="name" aria-describedby="name">
			</div>
			<div class="mb-3">
			<label for="email" class="form-label">Email address</label>
			<input type="email" class="form-control" id="email" aria-describedby="email">
			</div>
			<div class="mb-3">
			<label for="phone" class="form-label">Phone</label>
			<input type="tel" class="form-control" id="phone" aria-describedby="phone">
			</div>
			<div class="mb-3">
			<label for="nationality" class="form-label">Nationality</label>
			<input type="text" class="form-control" id="nationality" aria-describedby="nationality">
			</div>
			<div class="mb-3">
			<label for="university" class="form-label">University Name</label>
			<input type="text" class="form-control" id="university" aria-describedby="university">
			</div>
			<div class="mb-3">
			<label for="degree" class="form-label">University Degree</label>
			<input type="text" class="form-control" id="degree" aria-describedby="degree">
			</div>
			<button type="submit" class="btn btn-primary">Apply</button>
		</form>
		</div>
	</div>
	</section> -->

	<section class="fixed-bottom bg-light border-top text-center">
	<div class="container">
		<div class="row">
		<div class="col-12">
			<p class="my-3">All rights reserved.</p>
		</div>
		</div>
	</div>
	</section>

</main>
	</body>
</html>
