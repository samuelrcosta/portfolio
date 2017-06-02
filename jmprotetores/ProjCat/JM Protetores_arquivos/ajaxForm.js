$(document).ready(function() {
	$('.ajaxForm').submit(function(event) {
		if($(this).valid()) {
			var form = $(this);
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			if($('.alerta').length == 0){
		  		form.find('[type=submit]').after('<div class="alerta"></div>');
		  	}
			form.find('[type=submit]').attr('disabled','disabled');
			//form.find('[type=submit]').css('opacity','0.3');
			$('.alerta').removeClass('sucesso').addClass('enviando').html("Aguarde...");

			setTimeout(function(){
				$.ajax({
			        type: "POST",
			        enctype: 'multipart/form-data',
			        async: false,
			        crossDomain: true,
			        url: "http://www.linceweb.com.br/submit.php",
			        data: formData,
			        error: function (XMLHttpRequest, textStatus, errorThrown) {
			          alert("Erro ao carregar dados. Por favor tente novamente mais tarde.");
			          console.log(XMLHttpRequest+'-'+textStatus+'-'+errorThrown);
					},
			        success: function(retorno) {
			          	console.log(retorno);
			          	$('.alerta').removeClass('enviando').html("");
					  	$('.alerta').removeClass('enviando').addClass('sucesso').html("Mensagem enviada!");
					  	var event = new CustomEvent("orcamentoEnviado", { "detail": "Example of an event" });
					  	document.dispatchEvent(event);
			        },
			        beforeSend: function(){
						console.log('beforeSend');
			        },
			        complete: function(){
			        	form[0].reset();
			        	form.find('[type=submit]').removeAttr('disabled');
						form.find('[type=submit]').css('opacity','1');
			        },
			        cache: false,
			        contentType: false,
			        processData: false
				});
			}, 100);
			return false;
		}
	});
});