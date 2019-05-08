<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Chat bot</title>
		<link type="text/css" rel="stylesheet" href="css/ChatCSS.css" />
	</head>
	<body  BGCOLOR = "434343" background = "BG.jpg">
		<div id="contador"></div>
		<div id="TitleIMG"><CENTER><IMG SRC="Title.png" ALIGN="BOTTOM"> </CENTER></div>
		<h1 class="GlitchEffect">Chappie quiere hablar</h1>
		<form action="LOGICCHAT.php" method="post" target="CHAT">
			<div id="ChatDiv">
				<p><img src="gif/CH_STAND.gif" alt="Hello" id="imagen">
					<iframe name="CHAT" id="CHATt" src="LOGICCHAT.php"></iframe>
				</p>
				<p>
					<input type="text" name="mess" id="Message" placeholder="Dile algo a Chappie..." size="60">
					<input type="submit" id="Send" name="SendButton" onclick="rotarImagenes();" value="Enviar">
				</p>
		  </div>
	  </form>
		<script>
	    var imagenes = ["gif/CH_STAND.gif","gif/CH_HELLO.gif","gif/CH_RIENDO.gif","gif/CH_IRA.gif"];
			var Mygreetings = ["Hola","hola"];
			var ins = ["eres un perdedor","apestas","fracasado","imbecil","mierd"];
			var contador = 12;

	    function rotarImagenes()
	    {
					tmp = $('#Message').val();
					var index = 2;
					contador = 12;
					var i = 0;
					while(i < ins.length){
						if(tmp.indexOf(ins[i]) != -1){
							index = 3;
							break;
						}
						i = i+1;
					}
					i = 0;
					while(i < Mygreetings.length){
						if(tmp.indexOf(Mygreetings[i]) != -1){
							index = 1;
							break;
						}
						i = i+1;
					}
					if(tmp == ""){
						index = 0;
					}
	        document.getElementById("imagen").src=imagenes[index];
	    }
			function boring(){
				if(contador == 0){
					document.getElementById("imagen").src=imagenes[0];
				}
			}
			function cont(){
				contador = contador - 1;
			}
			setInterval(cont,1000);
			setInterval(boring,1000);
		</script>
		<script src="js/JQuery.js"></script>
		<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	</body>
</html>
