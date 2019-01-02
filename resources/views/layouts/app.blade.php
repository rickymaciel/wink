<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js">
	<head>
		<title>Wink</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css', App::environment() == 'production' ) . '?v='. md5(microtime()) }}">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

		<!-- Modernizr runs quickly on page load to detect features -->
	<script src="{{ asset('assets/js/modernizr.custom.js', App::environment() == 'production' ) . '?v='. md5(microtime()) }}"></script>
	</head>
	<body>
		<div class="outer-home">
			<section id="home">
				<div id="vegas-background"></div>
				<!-- Overlay -->
				<div class="global-overlay"></div>

				<img src="assets/img/logo/logo.png" alt="" class="brand-logo text-intro" />
				<div class="" id="player-nav">
					<ul class="nav navbar-nav">
						<li class="nav-item">
							<a data-dialog="somedialog" class="nav-link">About us</a>
						</li>
					</ul>
				</div>
				<div class="content">
					<h2 class="col-lg-12 text-intro opacity-0">
						@include('flash::message')
					</h2>
					<h1 class="text-intro opacity-0">
						Binvenida a Wink
					</h1>
					<p class="text-intro opacity-0">
						Somos la plataforma de Anuncios mas exclusiva de Latinoamerica, crea un anuncio con nosotros y recibe una suscripción por 6 meses
					</p>
					<nav>
						<ul>
							<li>
								<a id="open-more-info" data-target="right-side" class="action-btn-red trigger text-intro opacity-0">
								<i class="fa fa-plus"></i> Crea tu anuncio
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</section>
		</div>
		<div class="close-right-part layer-left hide-layer-left"></div>
		<div class="border-right-side hide-border"></div>
		<content id="app">
			@yield('content')
		</content>
		<button id="close-more-info" class="close-right-part hide-close">
		<i class="icon ion-android-close"></i>
		</button>

		<!-- START - About Us Popup -->
		<div id="somedialog" class="dialog">

			<div class="dialog__overlay"></div>

			<!-- START - dialog__content -->
			<div class="dialog__content">

				<!-- START - dialog-inner -->
				<div class="dialog-inner text-justify font-weight-bold">

					<h4 style="font-size:36px;">About Us</h4>

					<p>Somos una compañia especializada en anuncios digitales que ha concentrado todo su pontencial y talento humano.</p>
					<p>Queremos que tus anuncios lleguen a los Clientes que estan dispuestos a pagar por un servicio de Calidad y Exclusivo.</p>
					<p>Para eso contamos con un equipo de profesionales que trabaja de manera incansable para cumplir tus requerimientos de publicidad.</p>
					<p>Si tienes alguna duda o problema porfavor escribenos a info@winkus.com</p>
					<p>No olvides que estamos en una etapa de prelanzamiento y tendras una servicio promocional por 6 meses, completamente gratis si haces tu anuncio antes de 15_11_2018.
					</p>

				</div>
				<!-- END - dialog-inner -->

				<!-- Cross to close the About Us Popup -->
				<button class="close-newsletter" data-dialog-close><i class="icon ion-android-close"></i></button>

			</div>
			<!-- END - dialog__content -->

		</div>
		<!-- END - About Us Popup -->

		<!-- * Libraries jQuery, Easing and Bootstrap * -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<!-- Slideshow/Image plugin -->
		<script src="{{ asset('assets/js/vegas.js', App::environment() == 'production' ) . '?v='. md5(microtime()) }}"></script>

		<!-- Custom Scrollbar plugin -->
		<script src="{{ asset('assets/js/jquery.mCustomScrollbar.js', App::environment() == 'production' ) . '?v='. md5(microtime()) }}"></script>


		<!-- Popup About Us -->
		<script src="{{ asset('assets/js/classie.js', App::environment() == 'production' ) . '?v='. md5(microtime()) }}"></script>
		<script src="{{ asset('assets/js/dialogFx.js', App::environment() == 'production' ) . '?v='. md5(microtime()) }}"></script>
		<!-- END - About Us Popup -->


		<script src="{{ asset('assets/js/main.js', App::environment() == 'production' ) . '?v='. md5(microtime()) }}"></script>



		<!-- Main JS File -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/piexif.min.js" type="text/javascript"></script>

		<script src="{{ asset('assets/js/fileinput.min.js', App::environment() == 'production' ) . '?v='. md5(microtime()) }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/themes/explorer/theme.js"></script>


		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/fileinput.min.js"></script> -->

		<script type="text/javascript">
			$("#file_video").fileinput({
		        browseClass: "",
		        showCaption: false,
		        showRemove: true,
		        showUpload: false,
		        allowedFileExtensions: ["avi", "mpg", "mkv", "mov", "mp4", "3gp", "webm", "wmv"],
		        maxFilePreviewSize: 2048,
		        maxFileSize: 80000,
		        resizeImage: true,
		        resizeIfSizeMoreThan: 5000,
		        maxFileCount: 1,
			    removeLabel: 'Cancelar',
			    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			    removeTitle: 'Cancelar o quitar el video',
		    });
		    $("#file_img").fileinput({
		    	theme: "explorer",
		    	uploadAsync: false,
		    	//uploadUrl: "/file-upload-batch/2",
		        browseClass: "",
		        showCaption: false,
		        showRemove: true,
		        showUpload: false,
		        showCancel: false,
		        allowedFileExtensions: ["jpg", "png"],
		        maxImageWidth: 2048,
		        resizeImage: true,
		        maxFileSize: 80000,
		        maxFileCount: 10,
		        maxFileNum: 10,
		        resizeIfSizeMoreThan: 1000,
		        initialPreviewFileType: 'image', // image is the default and can be overridden in config below
		        preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
			    showClose: true,
			    removeLabel: 'Quitar todas las fotos',
			    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			    removeTitle: 'Cancelar o quitar todas las fotos',
			    overwriteInitial: false,
			    initialCaption: "Puedes seleccionar hasta 10 fotos de una vez!"
		    });
		</script>
	</body>
</html>