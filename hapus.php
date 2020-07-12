<style type="text/css">
	body {
	width: 100wh;
	height: 90vh;
	color: black;
	background: linear-gradient(-45deg, #7CFC00, #00FF00, #EE7752, #E73C7E, #23A6D5, #23D5AB, #FFFF00);
	background-size: 400% 400%;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
}
 
@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
 
@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
 
@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
	#footer {
  		width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        background: white;
        margin: 0 auto;
        text-align: center;
  	}
</style>

<?php
		$file="data_mhs.txt";
			$fl=fopen($file, "r+");

			//tampilkan

			$fl=fopen($file, "w+");

			$data=null;

			//simpan
			fwrite($fl, $data, strlen($data));

			//tutup
			fclose($fl);

			echo "<div id='footer'>Data Anda Telah Dihapus<br>";
			echo "<a style='color:black;border-radius:2px;font-weight:bold;' href='form.html'>Kembali Ke Formulir</a>
			</div>";
		
?>