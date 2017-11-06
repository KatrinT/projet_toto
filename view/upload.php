

<html>
<head>
	<title>UPLOAD</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="page-header">
		  			<h1>Upload d'un fichier <small>csv uniquement</small></h1>
				</div>

				<form action='' method="post" enctype="multipart/form-data">
					<fieldset>
					<input type="hidden" name="submitFile" value="1" />
					<label for="fileForm">Fichier</label>
					<input type="file" name="fileForm" id="fileForm" />
					<p class="help-block">toutes les extensions sont autorisées</p>
					<br />
					<input type="submit" class="btn btn-success btn-block" value="Téléverser" />
					</fieldset>
				</form>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
		</div>

	</div>

<!--DEUXIEME FORM-->
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="page-header">
					<h1>Générer un fichier  <small>csv uniquement</small></h1>
				</div>
				<form action='' method="post">
					<fieldset>
					<input type="submit" name='fileGenere' class="btn btn-success btn-block" value="Générer un fichier" />
					</fieldset>
				</form>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
		</div>
	</div>
</body>
</html>
