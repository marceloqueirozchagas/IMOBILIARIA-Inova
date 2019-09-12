$(document).ready(function(){
	//*******Carrosel
	$('#slider').nivoSlider();
		
	//***** Coloca borda nos imagens q tiver a classe foto-borda
	$(".foto-borda").corner("5px");
		
	$('#home #menu-home').css('background','url(assets/img/circulo-menu.png) no-repeat left');
	$('#quemsomos #menu-quemsomos').css('background','url(assets/img/circulo-menu.png) no-repeat left');
	$('#contato #menu-faleconosco').css('background','url(assets/img/circulo-menu.png) no-repeat left');
	$('#menutopo ul li').mouseover(function(){			
		if($(this).css('background-image')=='none')
		{
			$(this).css('background','url(assets/img/circulo-menu.png) no-repeat left');		
			$(this).mouseout(function(){
				$(this).css('background','none');							
			});
		}
	 });
	
	 /*
	 * SUBMENU LATERAL
	 * Obs: esta linha define a largura e altura da div opacity igual a largura e altura da div q esta o submenu
	 */
	var largura = 	$("#submenu #sub").width();
	var altura  =    $("#submenu #sub").height();
		
	$("#opacity").css("width",largura);
	$("#opacity").css("height",altura);					   
});