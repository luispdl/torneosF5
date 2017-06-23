
$(".goles1").each(function(){
	$(this).mouseout(sumar1);
})

function sumar1(){
	cant_goles = 0;
	goles = $(".goles1").each(function(){
		cant_goles += parseInt(this.value);
		console.log(cant_goles);
	});
	$("#goles1").html(cant_goles);
		
}



$(".goles2").each(function(){
	$(this).mouseout(sumar2);
})

function sumar2(){
	cant_goles = 0;
	goles = $(".goles2").each(function(){
		cant_goles += parseInt(this.value);
		console.log(cant_goles);
	});
	$("#goles2").html(cant_goles);
		
}

document.querySelector('.agregar').addEventListener('click',clonar);

function clonar(){
	var div = document.createElement('div');
    document.querySelector('.jugadores').appendChild(div);

}
