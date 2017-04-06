<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>themes/bootstrap3/img/receipt.ico">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>themes/bootstrap3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="<?=base_url()?>themes/admin/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/wow/css/libs/animate.css" rel="stylesheet">
      <link href="<?=base_url()?>themes/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url()?>assets/bootsnipp/custom.css" rel="stylesheet" type="text/css" />
      
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>themes/bootstrap3/css/main.css" rel="stylesheet">
    <?=$_styles?>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
        <script src="<?=base_url()?>themes/bootstrap3/js/jquery.min.js"></script>
     <script src="<?=base_url()?>assets/wow/js/wow.min.js"></script>
       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>themes/bootstrap3/js/bootstrap.js"></script>
	<script>

var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();
    	
	$('.carousel').carousel({
	  interval: 6500
	})
$('.carousel').on('slide.bs.carousel', function (ev) {
  var id = ev.relatedTarget.id;
   switch (id) {
    case "1":
    new WOW().init();
      $('#headerwrap').removeClass('s2');
        $('#headerwrap').addClass('s'+id);
  		
      break;
    case "2":
    	$('#headerwrap').removeClass('s1');
         $('#headerwrap').addClass('s'+id);
      break;

    default:
      //the id is none of the above
  }


  //alert(id);
  /*switch (id) {
    case "1":
      // do something the id is 1
      break;
    case "2":
      // do something the id is 2
      break;
    case "3":
      // do something the id is 3
    default:
      //the id is none of the above
  }*/
});
	</script>
    <?=$_scripts?>
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navigation">

    <!-- Fixed navbar -->
	 <div id="navigation" class="navbar navbar-default navbar-fixed-top bg-green-gradient">
		<div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?=base_url()?>"><?=$band_name?></a>
	        </div>
	        <?=$menu?>
		</div>
		
	 </div>
   <div class="gis-map">
   		<?=$content?>
   </div>
    
    <div class="clearfix"></div>
		<div class="container">
			<p><?=$footer?></p>		
		</div>

  
  </body>
</html>
