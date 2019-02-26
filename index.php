<?php

  session_start();
  $usuario = "root";
  $servidor = "localhost";
  $basedatos = "presupuestos";
  $conexion =mysqli_connect($servidor, $usuario, "") or die ("Error");
  $db = mysqli_select_db($conexion, $basedatos) or die("Error");

  $consulta = "SELECT * FROM usuarios";

  $resultado = mysqli_query($conexion, $consulta) or die("Fallo");

  $nom_usuario = '';
  $contrasena = '';
  $columna = '';
  $enviar = '';


  if(isset($_POST['enviar'])){ 

	    $nom_usuario=$_POST['usuario'];
	    $contrasena=$_POST['contra']; 

	    while ($columna = mysqli_fetch_array($resultado)) {
	    	//echo $contrasena;
	     	if ( ($columna['contra_usuario'] == ($contrasena)) && ($columna ['nombre_usuario'] == ($nom_usuario))) {
	     		
		      	//$_SESSION["nombre_usuario"] = $columna['Nombre_usuario'];
		      	$enviar = 'Prueba.php';     
	    	}
		    else{

		      	$enviar = 'index.php'; 
		    }
	   }
  	}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>


<form class="Form" method="POST">
  <h1 class="Form-title">Login</h1>
  <p class="Form-description"></p>
  <div class="Form-fields">

      <input type="text"
             id="email"
             class="ControlInput ControlInput--email"
             placeholder="Correo"
             name="usuario" 
             required
      >

      <label for="email"
             class="Control-label Control-label--email"
      >Usuario</label>
      <div class="Control-requirements Control-requirements--email">
        Must be a valid email
      </div>

        <!-- this is here to give power to the :checked css selector -->
        <!-- </b><input type="checkbox"
               id="show-password"
               class="show-password"
        > -->
    
        <label for="show-password"
               class="Control-label Control-label--showPassword"
        >
          
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32" class="svg-toggle-password" title="Toggle Password Security">
            <title>Hide/Show Password</title>
            <path d="M24,9A23.654,23.654,0,0,0,2,24a23.633,23.633,0,0,0,44,0A23.643,23.643,0,0,0,24,9Zm0,25A10,10,0,1,1,34,24,10,10,0,0,1,24,34Zm0-16a6,6,0,1,0,6,6A6,6,0,0,0,24,18Z"/>
              <rect x="20.133" y="2.117" height="44" transform="translate(23.536 -8.587) rotate(45)" class="closed-eye"/>
              <rect x="22" y="3.984" width="4" height="44" transform="translate(25.403 -9.36) rotate(45)" style="fill:#fff" class="closed-eye"/>
          </svg>
        </label> 
    
        <input type="password"
              	id="password" 
               placeholder="Contraseña"
               
               name="contra" 
               required
               
               class="ControlInput ControlInput--password"
        >

        <label for="password"
               class="Control-label Control-label--password"
        >Contraseña</label>
		    	
		    	<?php
		          echo "<input type=\"submit\" value=\"Entrar\" name=\"enviar\">";
		          if ($enviar == 'Prueba.php') {
		          	echo 'entro';
		            header("location:Prueba.php");
		          }
		        ?>      
	<!--
       <a href="starter.php"><button type="submit" class="Button Form-submit">
          Login
           <svg width='26px' height='26px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="Button-spinner">
              <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect>
              <circle cx="50" cy="50" r="40" stroke="#fff" fill="none" stroke-width="18" stroke-linecap="round"></circle>
              <circle cx="50" cy="50" r="40" stroke="#e7542b" fill="none" stroke-width="9" stroke-linecap="round" class="spinner"></circle>
          </svg>
        </button></a> -->
        
    
    
  </div>
</form>


</body>
</html>

<!--


<form class="Form" method="POST">
  <h1 class="Form-title">Login</h1>
  <p class="Form-description"></p>
  <div class="Form-fields">

      <input type="text"
             id="email"
             class="ControlInput ControlInput--email"
             placeholder="Correo"
             name="usuario" 
             required
      >

      <label for="email"
             class="Control-label Control-label--email"
      >Usuario</label>
      <div class="Control-requirements Control-requirements--email">
        Must be a valid email
      </div>

        <!-- this is here to give power to the :checked css selector -->
        <!-- </b><input type="checkbox"
               id="show-password"
               class="show-password"
        > 
    
        <label for="show-password"
               class="Control-label Control-label--showPassword"
        >
          
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32" class="svg-toggle-password" title="Toggle Password Security">
            <title>Hide/Show Password</title>
            <path d="M24,9A23.654,23.654,0,0,0,2,24a23.633,23.633,0,0,0,44,0A23.643,23.643,0,0,0,24,9Zm0,25A10,10,0,1,1,34,24,10,10,0,0,1,24,34Zm0-16a6,6,0,1,0,6,6A6,6,0,0,0,24,18Z"/>
              <rect x="20.133" y="2.117" height="44" transform="translate(23.536 -8.587) rotate(45)" class="closed-eye"/>
              <rect x="22" y="3.984" width="4" height="44" transform="translate(25.403 -9.36) rotate(45)" style="fill:#fff" class="closed-eye"/>
          </svg>
        </label> 
    
        <input type="password"
              	id="password" 
               placeholder="Contraseña"
               
               name="contraseña" 
               required
               
               class="ControlInput ControlInput--password"
        >

        <label for="password"
               class="Control-label Control-label--password"
        >Contraseña</label>
    
        <div class="Control-requirements">
          Must contain at least 6 characters. We did this for your own sake.
        </div>  
      

      	<?php
		          
		?>

       <a href="starter.php"><button type="submit" class="Button Form-submit">
          Login
           <svg width='26px' height='26px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="Button-spinner">
              <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect>
              <circle cx="50" cy="50" r="40" stroke="#fff" fill="none" stroke-width="18" stroke-linecap="round"></circle>
              <circle cx="50" cy="50" r="40" stroke="#e7542b" fill="none" stroke-width="9" stroke-linecap="round" class="spinner"></circle>
          </svg>
        </button></a> 
        
    
    
  </div>
</form>-->