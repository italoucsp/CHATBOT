<!DOCTYPE html>
<html>
<body>
  <?php

      $ANSWER = "";
      $QUESTION = "";
      $CONVERSATION = "";
      $ANIM = "";

      $file = fopen("conv.txt", "r") or exit("Unable to open file!");
      while(!feof($file)){
        $CONVERSATION = fgets($file);
      }
      fclose($file);

      if(isset($_POST['SendButton'])){
        $ANSWER = $_POST['SendButton'];
        $QUESTION = $_POST['mess'];
      }

      function RandomAnswer($list){
        return $list[rand(0,sizeof($list)-1)];
      }
      function Reader($ANSWER,$QUESTION,$CONVERSATION,$ANIM){
        $speak = array("Bien, hablame de ti :3","Que opinas de la situacion actual en el mundo?","Sigue sigue... dime todo","Wow en serio?","Es muy interesante","Hahahahaha","Listo para los parciales?", "Podriamos hablar de otra cosa?","De que tema quieres que hablemos?","Lograremos los viajes en el tiempo algun dia?");
        $greetings = array("Hola amigo estudiante de la UCSP!!","Que tal, joven estudiante futuro del pais?","Un saludo para ti tambien joven estudiante :)");
        $insans = array("oye tranquilo viejo","LENGUAJE!!!!","no digas esas cosas!!!");
        $comp1 = array("Big Data es un término que describe el gran volumen de datos, tanto estructurados como no estructurados, que inundan los negocios cada día.","Internet es un conjunto descentralizado de redes de comunicación interconectadas que utilizan la familia de protocolos TCP/IP, lo cual garantiza que las redes físicas heterogéneas que la componen, formen una red lógica única de alcance mundial.");
        $comp2 = array("La Organización Mundial de la Salud (OMS) recomienda tomar 5 raciones de frutas y verduras al día (3 raciones de frutas y 2 raciones de verduras).","El CAMD recomienda ejercitarse de 3 a 5 días por semana (2, 5) para mantener el cuerpo saludable.");

        $Mygreetings = array("Hola","hola");
        $ins = array("eres un perdedor","apestas","fracasado","imbecil","mierd");
        $Salud = array("salud","bienestar","vida","recomiendame","comida");
        $Compu = array("internet","redes","data","web");

        if($ANSWER){
          $CONVERSATION = $CONVERSATION."Me: ".$QUESTION."<br>";
          for($i=0;$i<sizeof($Mygreetings);$i++){
            if(substr_count ($QUESTION,$Mygreetings[$i],0,strlen($QUESTION)) != 0 ){
              $Chappie = RandomAnswer($greetings);
              $CONVERSATION = $CONVERSATION."Chappie: ".$Chappie."<br>";
              return $CONVERSATION;
            }
          }
          for($i=0;$i<sizeof($ins);$i++){
            if(substr_count ($QUESTION,$ins[$i],0,strlen($QUESTION)) != 0 ){
              $Chappie = RandomAnswer($insans);
              $CONVERSATION = $CONVERSATION."Chappie: ".$Chappie."<br>";
              return $CONVERSATION;
            }
          }
          if($QUESTION != ""){
            if(substr_count ($QUESTION,"?",0,strlen($QUESTION)) != 0 ){
              for($i=0;$i<sizeof($Salud);$i++){
                if(substr_count ($QUESTION,$Salud[$i],0,strlen($QUESTION)) != 0 ){
                  $Chappie = RandomAnswer($comp2);
                  $CONVERSATION = $CONVERSATION."Chappie: ".$Chappie."<br>";
                  return $CONVERSATION;
                }
              }
              for($i=0;$i<sizeof($Compu);$i++){
                if(substr_count ($QUESTION,$Compu[$i],0,strlen($QUESTION)) != 0 ){
                  $Chappie = RandomAnswer($comp1);
                  $CONVERSATION = $CONVERSATION."Chappie: ".$Chappie."<br>";
                  return $CONVERSATION;
                }
              }
            }
            $Chappie = RandomAnswer($speak);
            $CONVERSATION = $CONVERSATION."Chappie: ".$Chappie."<br>";
            return $CONVERSATION;
          }
        }
      }
      $CONVERSATION = Reader($ANSWER,$QUESTION,$CONVERSATION,$ANIM);
      $file = fopen("conv.txt", "w") or exit("Unable to open file!");
      fwrite($file,$CONVERSATION);
      fclose($file);
      $file = fopen("conv.txt", "r") or exit("Unable to open file!");
      while(!feof($file)){
        echo fgets($file);
      }
      fclose($file);

  ?>
</body>
</html>
