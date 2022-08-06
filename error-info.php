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
			<div style="padding-top: 250px;" class="error-page">
				<div>
					<h2>Ocurrio un error en el sistema</h2>
					<p style="color: #000;">Tu pago no fue procesado, vuelve a intertarlo, si sigue ocurriendo comunicate a info@digitaltec.com.mx</p>
					<a href="index.php" class="theme-btn solid-button-one">Regresar</a>
				</div>
			</div>
			
			
<?php 
include('js.php');
?>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>