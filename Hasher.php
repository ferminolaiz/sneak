<?php 
 /***********************************************************************
 * Sneak.php - v 1.0 - 09/04/2013
 * Proyect Webpage: https://github.com/isseu/Sneak
 * Author: isseu (@isseu) http://www.isseu.com
 ************************************************************************/
$version = 1.0;

@require( dirname(__FILE__) . '/lib.php');
$supported_methods = array( 
	"ASCII to HEX" => 1
	);

?>
<html>
<head>
	<title>Hasher</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="./css.css" rel="stylesheet" type="text/css" />
</head>
<div id="container">
	<form method="post">
		<div id="aside">
			<textarea name="Data" id="Data"></textarea>
			<div id="result">
				<div id="res_text">
					<?php 
					if( isset($_POST['submit']) ) {

						$text = $_POST['Data'];	
						$text = urldecode(stripslashes($text));
						$orig_text = htmlentities($text);
						$algs = hash_algos();
						if(in_array($_POST['cryptmethod'], $supported_methods)){
							switch ($_POST['cryptmethod']) {
									case 1:
										$text = asc2hex($text);
										break;
									
									default:
										# code...
										break;
								}	
						}else{
							$text = "Encriptacion no Soportada.";
						}       	
						echo htmlentities($text);
					}
					?>
				</div>
			</div>
		</div>
		<div id="bside">
			<select name="cryptmethod" id="cryptmethod">
				<?php
				foreach ($supported_methods as $encript => $val) {
					echo "<option value='".$val."'>".$encript."</option>";
				}
				?>
			</select>
			<input type="submit" name="submit" value="OK" />
			<input type="reset" value="Clear" onclick="document.Data.value=''"/>
		</div>
		<div id="footer">
			<p>
				<font size="1">
					Sneak <?php printf("%.2f",$version); ?><br />
					Author <a href="http://www.isseu.com">Isseu</a>, &copy; <?php echo date('Y'); ?><br>
					Download script <a href="https://github.com/isseu/Sneak">here</a>
				</font>
			</p>
		</div>
	</form>
</div>

<body>

</body>
</html>