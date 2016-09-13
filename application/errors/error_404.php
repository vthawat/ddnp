<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>themes/bootstrap3/img/receipt.ico">

    <title>Error</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>themes/bootstrap3/css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>themes/bootstrap3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>themes/bootstrap3/css/error-404.css" rel="stylesheet">
  </head>
  <body>
		<div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="error-template well">
		            	<div class="jumbotron">
		                <h1>
		                    Oops!</h1>
		                <h2>
		                    Error <?=$status_code?></h2>
		                <div class="error-details">
		                    <?=$message?>
		                </div>
		                <div class="error-actions">
		                    <a href="javascript:history.back()" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
		                        ย้อนกลับไป</a>
		                </div>
		            </div>
		            </div>
		        </div>
		    </div>
		</div>  	
  </body>
</html>