var intervalo;

$(".finish").click(function(){

    Date.prototype.yyyymmdd = function() {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();
      
        return [this.getFullYear(),
                (mm>9 ? '' : '0') + mm,
                (dd>9 ? '' : '0') + dd
               ].join('');
    };
      
    var date = new Date();

    var horas = $(this).parent().find(".horas").html();

    // declarar variável para anexar minutos e atribuir ligação ao elemento id definido em html 
    var minutos = $(this).parent().find(".minutos").html();

    // declarar variável para anexar segundos e atribuir ligação ao elemento id definido em html 
    var segundos = $(this).parent().find(".segundos").html();

    // declarar variável para anexar milissegundos e atribuir ligação ao elemento id defindo em html 
    var millis = $(this).parent().find(".milissegundos").html();

    var borderColor = "#f56954";
    var backgroundColor = "#f56954";
    var allDay = false;
    var url = "";
    var start = date.yyyymmdd();
    var end = start;
    var title = "Alongamento "+$(this).parent().parent().find(".title").html()+" concluído";
    var description = "Duração de alongamento: "+horas+"h "+minutos+"m "+segundos+"s "+millis+"ms";
    
    clearInterval(intervalo);

    $.post(
        "/calendario/criar",
        {
            color: borderColor,
            allDay: allDay,
            url: url,
            date: start,
            end: end,
            title: title,
            description: description
        },
        function(data){
            Swal.fire({
                icon: "success",
                title: "Alongamento Concluído",                    
                text: "O alongamento foi concluído e salvo na sua agenda!",				
            })  
        }	
        
    );


});

$(".botao-iniciar").click(function () {

	// declarar variável horas e atribuir ligação ao tempo definido em html 
	var horas = 00;

	// declarar variável minutos e atribuir ligação ao tempo definido em html	  		
	var minutos = 00;

	// declarar variável segundos e atribuir ligação ao tempo definido em html
	var segundos = 00;

	// declarar variável milissegundos e atribuir ligação ao tempo defindo em html
	var milissegundos = 00;

    $(this).parent().find(".finish").removeAttr("disabled");

	// declarar variável para anexar horas e atribuir ligação ao elemento id definido em html 
	var anexarHoras = $(this).parent().find(".horas")[0];
    
	// declarar variável para anexar minutos e atribuir ligação ao elemento id definido em html 
	var anexarMinutos = $(this).parent().find(".minutos")[0];

	// declarar variável para anexar segundos e atribuir ligação ao elemento id definido em html 
	var anexarSegundos = $(this).parent().find(".segundos")[0];

	// declarar variável para anexar milissegundos e atribuir ligação ao elemento id defindo em html 
	var anexarMilissegundos = $(this).parent().find(".milissegundos")[0];


	// declarar variável para iniciar contagem e atrbuir ligação ao elemento id definido em html
	var botaoIniciar = $(this).parent().find(".botao-iniciar")[0];

	// declarar variável para parar contagem e atribuir ligação ao elemento id definido em html 
	var botaoParar = $(this).parent().find(".botao-parar")[0];

	// declarar variável para apagar contagem e atribuir ligação ao elemento id definido em html 
	var botaoApagar = $(this).parent().find(".botao-apagar")[0];

	// declarar variável para determinar a duração da contagem 
	var intervalo = setInterval(duracaoContagem, 10);



	// após se clicar no botão iniciar
	botaoIniciar.onclick = function () {

		// atribuir ligação entre a duração da contagem e o intervalo em milissegundos. 1 segundo é igual a 1000 milissegundos 
		intervalo = setInterval(duracaoContagem, 10);
		
	}

	// após se clicar no botão parar 
	botaoParar.onclick = function () {

		// limpar intervalo	
		clearInterval(intervalo);
	}

	// após se clicar no botão apagar 	
	botaoApagar.onclick = function () {

		// limpar intervalo	
		clearInterval(intervalo);

		// atribuir ligação entre horas e o tempo definido em html 
		horas = "00";

		// atribuir ligação entre minutos e o tempo definido em html	
		minutos = "00";

		// atribuir ligação entre segundos e o tempo definido em html
		segundos = "00";

		// atribuir ligação entre milissegundos e o tempo definido em html  
		milissegundos = "00";


		// aparecer no ecrã horas, minutos, segundos e milissegundos a zero  	
		anexarHoras.innerHTML = horas;
		anexarMinutos.innerHTML = minutos;
		anexarSegundos.innerHTML = segundos;
		anexarMilissegundos.innerHTML = milissegundos;
	}



	// definir como vai ser a contagem   
	function duracaoContagem() {

		// começar contagem dos milissegundos
		milissegundos++;

		// se for menor que 9 colocar um 0
		if (milissegundos < 9) {
			anexarMilissegundos.innerHTML = "0" + milissegundos;
		}

		if (milissegundos > 9) {
			anexarMilissegundos.innerHTML = milissegundos;
		}


		// começar contagem dos segundos 
		// se os milissegundos forem superiores a 99 	
		if (milissegundos > 99) {

			// aparece no ecrã os segundos 
			console.log("segundos");

			segundos++;
			anexarSegundos.innerHTML = "0" + segundos;
			milissegundos = 0;
			anexarMilissegundos.innerHTML = "0" + 0;
		}


		if (segundos > 9) {
			anexarSegundos.innerHTML = segundos;
		}

		// começar contagem dos minutos	
		// se os segundos forem superiores a 59
		if (segundos > 59) {

			// aparece no ecrã os minutos
			console.log("minutos");
			minutos++;
			anexarMinutos.innerHTML = "0" + minutos;
			segundos = 0;
			anexarSegundos.innerHTML = "0" + 0;
		}


		if (minutos > 9) {
			anexarMinutos.innerHTML = minutos;
		}

		// começar contagem das horas 
		// se os minutos forem superiores a 59
		if (minutos > 59) {

			// aparece no ecrã as horas 
			console.log("horas");
			horas++;
			anexarHoras.innerHTML = "0" + horas;
			minutos = 0;
			anexarMinutos.innerHTML = "0" + 0;
		}


		if (horas > 9) {
			anexarHoras.innerHTML = horas;
		}


	}

});