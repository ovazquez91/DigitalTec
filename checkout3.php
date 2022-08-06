<!doctype html>
<html class="no-js" lang="zxx">
<?php 
include('head.php');
    include('menu.php');
$id_producto = $_GET['id_producto'];    
    
if($id_producto == "6726419"){
$titulo = "30 horas de soporte";
$precio = 5000;    
}    
?>
<style>


.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}
    
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}


span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
    </style>
<body>

<div style="padding-top:250px; padding-bottom: 80px; padding-right: 50px; padding-left: 50px;" class="row">
  <div class="col-75">
    <div style="background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;" class="container">
      <form action="pago.php" method="POST">

        <div class="row">
          <div class="col-50">
            <h3>¿Estas listo para comprar?</h3>
            <p>Verifica bien toda tu información de contacto para hacer tu pedido</p><br>
            <label for="fname"><i class="fa fa-user"></i> Nombre completo</label>
            <input type="text" id="nombre" name="nombre" placeholder="Omar Vázquez">
            <input hidden value="<?php echo $precio; ?>" id="precio" name="precio">
            <input hidden value="<?php echo $titulo; ?>" id="titulo" name="titulo"> 
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
             <label for="email"><i class="fa fa-phone"></i> Celular</label>
            <input type="text" id="cel" name="cel" placeholder="4423204636">
          </div>


        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Acepto que mi información de contacto es la correcta.
        </label>
  <script
     src="https://www.mercadopago.com.mx/integrations/v1/web-tokenize-checkout.js"
    data-public-key="TEST-e2556e33-b9e8-4822-aaf5-ca51bf81d235"
    data-transaction-amount="<?php echo $precio; ?>">
  </script>

</form>
     
    </div>
  </div>

  <div class="col-25">
    <div style="background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;" class="container">
      <h4>Carrito
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>1</b>
        </span>
      </h4>
      <p>Compra de: <?php echo $titulo ?></p><br> 
       <p>Sub Total <span class="price" style="color:black"><b>$<?php echo $precio ?></b></span></p><br>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$<?php echo $precio ?></b></span></p>
    </div>
  </div>
</div>
<?php 
include('footer.php');
?>
  
</body>

</html>    