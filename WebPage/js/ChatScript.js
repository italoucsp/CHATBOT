speak = ["Bien","xd","Sigue sigue... dime todo","Wow en serio?","Es muy interesante","Hahahahaha", "Podriamos hablar de otra cosa?"];
saludos = ["Hola amigo estudiante de la UCSP!!","Que tal?","Un saludo para ti tambien :)"];
insultos = ["chinga tu","mierd"," puto","gay","pendej"];
insultosresp = ["oye tranquilo viejo","LENGUAJE!!!!","no digas esas cosas!!!"];

function SendF(){
	tmp = $('#Message').val();
	$('#Chat').val($('#Chat').val() + "Yo: " + tmp + '\n');
	var answer = SolveMessage(tmp);
	$('#Chat').val($('#Chat').val() + "Chappie: " + answer + '\n');
	$('#Message').val(" ");
}

function Filter(Message){
	var i=0;
	while(i < insultos.length){
		if(Message.indexOf(insultos[i]) != -1)
			return true;
		i = i+1;
	}
	return false;
}

function Greetings(Message){
	if(Message.indexOf("hola") != -1 || Message.indexOf("Hola") != -1){
		return true;
	}
	else{
		return false;
	}
}

function RandomMessage(respuestas){
	var ind = Math.floor((Math.random() * respuestas.length));
	return respuestas[ind];
}

function SolveMessage(Message){
	if(Greetings(Message) == true){
		return RandomMessage(saludos);
	}
	else if(Filter(Message)==true){
		return RandomMessage(insultosresp);
	}
	else
		return RandomMessage(speak);
}
