<!DOCTYPE html>
<html lang="en">
	<?php 
include('head.php');
?>
	<body>
		<div class="main-page-wrapper">

<?php 
include('menu.php');
?>

			
			<!-- 
			=============================================
				Error
			============================================== 
			-->
            <div class="shape-wrapper">
					<svg class="img-shape shape-one">
						<path fill-rule="evenodd"  fill="rgb(255, 205, 111)"
						 d="M8.000,15.999 C12.418,15.999 16.000,12.417 16.000,7.999 C16.000,3.581 12.418,-0.001 8.000,-0.001 C3.582,-0.001 -0.000,3.581 -0.000,7.999 C-0.000,12.417 3.582,15.999 8.000,15.999 Z"/>
					</svg>
					<svg class="img-shape shape-two">
						<path fill-rule="evenodd"  fill="rgb(206, 124, 255)"
						 d="M5.500,10.999 C8.537,10.999 11.000,8.537 11.000,5.499 C11.000,2.462 8.537,-0.001 5.500,-0.001 C2.462,-0.001 -0.000,2.462 -0.000,5.499 C-0.000,8.537 2.462,10.999 5.500,10.999 Z"/>
					</svg>
				</div>
			<div style="padding-top: 250px;" class="aprobado-page">
				<div>
					<h2>Tu pago fue aprobado</h2>
					<p style="color: #000;">Te enviamos un correo electronico con tus datos de acceso para que puedas entrar a la plataforma<br>, verificaremos tu pago para agregar las horas correspodientes de tu plan.</p>
					<a href="index.php" class="theme-btn solid-button-one">Regresar</a>
				</div>
			</div>
			
			
<?php 
include('js.php');
?>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>