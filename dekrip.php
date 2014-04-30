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
					<?php
						$eks = array('.txt');
						$ekst = strrchr($_FILES['teks']['name'],'.');
						$kunci = $_POST['key'];
						
						if(!in_array($ekst,$eks)) {
							echo "<script>alert('Masukkan File .txt!');location.replace('enkripsi.php');</script>";
							//echo $ekst;
						}
					
						if ($_FILES['teks']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['teks']['tmp_name'])) { //checks that file is uploaded
							$isi = file_get_contents($_FILES['teks']['tmp_name']); 
						}
					?>
					<br/>
					<h4>Cipher Text:</h4>
					<br/>
					<form method="POST" action="simpande.php">
					<div class="input-control textarea">
						<textarea name="cipher"><?php echo $isi; ?></textarea>
					</div>
					<br/>
					
					<h4>Key:</h4>
					<div class="input-control text">
						<input type="text" name="key" value="<?php echo $kunci; ?>" />
						<button class="btn-clear"></button>
					</div>
					<br/>
					
					<?php
						$tab = "abcdefghijklmnopqrstuvwxyz";
						$tab1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
						
						$ciparr = array();
	
						$idx = 0;
						$idx1 = 0;
						$j = 0;
						for($i=0;$i<strlen($isi);$i++) {
							if($isi[$i]==" " || !ctype_alpha($isi[$i])) {
								array_push($ciparr,$isi[$i]);
								continue;
							}
							
							for($k=0;$k<=strlen($tab);$k++) {
								if($isi[$i]==$tab[$k] || $isi[$i]==$tab1[$k]) {
									$idx = $k;
								}
							}
							
							for($k=0;$k<=strlen($tab);$k++) {
								if($kunci[$j]==$tab[$k] || $kunci[$j]==$tab1[$k]) {
									$idx1 = $k;
								}
							}
							
							$hasil = ($idx - $idx1)%26;
							if($hasil<0) {
								$hasil1 = ($hasil+26)%26;
								array_push($ciparr,$tab[$hasil1]);
							} else {
								array_push($ciparr,$tab[$hasil]);
							}
							
							if($j==(strlen($kunci)-1)) {
								$j = 0;
							} else {
								$j++;
							}
						}
						$cipher1 = implode('',$ciparr);
					?>
					
					<h4>Plain Text:</h4>
					<br/>
					<div class="input-control textarea">
						<textarea name="plain"><?php echo $cipher1; ?></textarea>
					</div>
					<br/>
					
					<h4>Nama File:</h4>
					<div class="input-control text">
						<input type="text" name="nama" required="required"/>
						<button class="btn-clear"></button>
					</div>
					<br/>
					<input type="submit" value="Simpan" class="button large bg-green" />
					</form>
				</div>
			</div>
		</div>
    </body>
</html>