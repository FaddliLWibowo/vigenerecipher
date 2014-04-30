<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
    </head>
    <body class="metro">
        <nav class="navigation-bar">
			<nav class="navigation-bar-content">
				<div class="element">
					Vigenere Cipher
				</div>
				<span class="element-divider"></span>
				<a class="element" href="index.php" >Home</a>
				<span class="element-divider"></span>
				<div class="element">
					<a class="dropdown-toggle" href="#">Menu</a>
					<ul class="dropdown-menu" data-role="dropdown">
						<li><a href="enkripsi.php">Enkripsi</a></li>
						<li><a href="dekripsi.php">Dekripsi</a></li>
					</ul>
				</div>
			</nav>
		</nav>
		
		<div class="grid">
			<div class="row ">
				<div class="span8 offset2">
					<h2>Vigenere Cipher</h2>
					<br/>
					<h4>Masukkan File Plain Text Anda (.txt):</h4>
					<br/>
					<form method="POST" action="enkrip.php" enctype="multipart/form-data">
					<input type="file" data-transform="input-control" required="required" name="teks" accept=".txt" />
					<br/>
					
					<h4>Key:</h4>
					<div class="input-control text">
						<input type="text" name="key" required="required" />
						<button class="btn-clear"></button>
					</div>
					<br/>
					
					<input type="submit" value="Enkripsi!" class="button large bg-green" />
					</form>
				</div>
			</div>
		</div>
    </body>
</html>