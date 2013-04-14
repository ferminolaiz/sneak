<?php 
 /***********************************************************************
 * Sneak.php - v 1.0 - 09/04/2013
 * Proyect Webpage: https://github.com/isseu/Sneak
 * Author: isseu (@isseu) http://www.isseu.com
 ************************************************************************/
$version = 1.0;

require( dirname(__FILE__) . '/lib.php');
$supported_methods = array( 
	"ASCII to HEX" => 1,
	"HEX to ASCII" => 2,
	"ASCII to BIN" => 3,
	"BIN to ASCII" => 4,
	"BIN to HEX" => 5,
	"HEX to BIN" => 6,
	"BASE64 Encode" => 7,
	"BASE64 Decode" => 8,
	"Backwards" => 9,
	);

foreach (hash_algos() as $n => $hash) {
	$supported_methods[strtoupper($hash)] = count($supported_methods) + 1;
}

?>
<html>
<head>
	<title>Hasher</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="./css.css" rel="stylesheet" type="text/css" />
</head>
<div id="container">
	<form method="post">
		<div class="aside">
			<textarea name="Data" id="Data"><?php

			if( isset($_POST['submit']) && isset($_POST['Data'])) {
				$text = $_POST['Data'];	
				$text = urldecode( stripslashes( $text) );
				echo htmlentities( $text );
			}

			?></textarea>
			<div id="result">
				<div id="res_text">
					<ol>
					<?php 
					if( isset($_POST['submit']) && isset($_POST['Data'])) {
						$eleccion = $_POST['cryptmethod'];
						settype( $eleccion, "integer" );
						$text = $_POST['Data'];	
						$text = urldecode( stripslashes( $text) );
						$orig_text = htmlentities( $text );
						$algs = hash_algos();
						if(in_array($eleccion, $supported_methods)){
							switch ($eleccion) {
									case 1:
										$text = asc2hex($text);
										break;
									case 2:
										$text = hex2asc($text);
										break;
									case 3:
										$text = asc2bin($text);
										break;
									case 4:
										$text = bin2asc($text);
										break;
									case 5:
										$text = binary2hex($text);
										break;
									case 6:
										$text = hex2binary($text);
										break;
									case 7:
										$text = base64_encode($text);
										break;
									case 8:
										$text = base64_decode( str_replace(" ", "", $text ) );
										break;
									case 9:
										$text = strrev( $text );
										break;
									default:
										if($eleccion > count($supported_methods) - count(hash_algos()))
										{
											$text = hash(strtolower(array_keys($supported_methods)[$eleccion - 1]), $text);
										}
										break;
								}	
						}else{
							$text = "Encriptacion no soportada.";
						}       	
						echo text2list(htmlentities($text));
					}
					?>
					</ol>
				</div>
			</div>
			<div id="footer_aside">
				<div id="icons">
					<a href="" title="Change"><img id="upicon" src="./images/t.gif"></a>
					<a href="" title="Copy to clipboard"><img id="copyicon" src="./images/t.gif"></a>
				</div>
			</div>
		</div>
		<div class="bside">
			<select name="cryptmethod" id="cryptmethod" autofocus>
				<?php
					$eleccion = $_POST['cryptmethod'];
					settype( $eleccion, "integer" );
				?>
				<optgroup label="Encoding">
				<?php
				for ( $i = 0 ; $i < count($supported_methods) - count(hash_algos()); $i++ ) { 
					echo "<option ".(($eleccion == $i + 1)?"selected ":"")."value='".($i + 1)."'>".array_keys($supported_methods)[$i]."</option>";
				}
				?>
				</optgroup>
				<optgroup label="Hashing">
				<?php
				for ( $i = count($supported_methods) - count(hash_algos()) ; $i < count($supported_methods); $i++ ) { 
					echo "<option ".(($eleccion == $i + 1)?"selected ":"")."value='".($i + 1)."'>".array_keys($supported_methods)[$i]."</option>";
				}
				?>
				</optgroup>
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