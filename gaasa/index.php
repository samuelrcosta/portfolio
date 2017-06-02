<?php
session_start();
require "config.php";
date_default_timezone_set('America/Sao_Paulo');
registraAcesso($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--=============================================================================================================
Criado por : Samuel Rocha Costa | email: samuel.rcosta@hotmail.com.br
=====================================================================================================================-->
	<meta name="keywords" content="Ovo, Gaasa, Gaasa e Alimentos, Granja, Ovos branco, Compra de ovos, Granja Inhumas, compra de ovos em Inhumas, peixes, peixes em Inhumas, compra de peixes em Inhumas, Gaasa Inhumas, Ovos Gaasa, Eucalipto, compra de Eucaplipto">
	<meta name="description" content="Venda de ovos, e de peixes, granja localizada na Rodovia GO-070 no KM-43 em Inhumas-GO, Telefone: (62) 3511-1862">
	<meta name="Distribution" content="Global">
	<meta name="Rating" content="General">
	<meta name="author" content="Samuel R. Costa">
	<meta name="robots" content="index, follow">
	<meta name="robots" content="all">
	<meta name="ICBM" content="-16.3242036,-49.5180027">
    <meta charset="UTF-8" id="viewport" name="viewport" content="width=device-width user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Gaasa e Alimentos Inhumas</title>
	<link rel='shortcut icon' href="assets/imgs/logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-index.css"/>
    <script type="text/javascript" src="assets/js/tether.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-98468534-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
    <div id='site'>
        <header>
            <nav>
                <div class="container-fluid">
                    <div class="topo">
                        <div class="topo-img">
                            <img src="assets/imgs/logo.png" height="120px">
                        </div>
                        <div class="topo-titulo">
                            <h1>Gaasa e Alimentos LTDA</h1>
                            <h2>Rodovia GO-070, KM-43<br>75400-000 – Inhumas-GO<br>(62) 3511 - 1862</h2>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
		<main>
			<article class="container-fluid main">
				<div id="construcao" align="center">
					<h4>SITE EM CONSTRUÇÃO</h4>
				</div>
				<?php
				if (isset($_SESSION['retorno']) && $_SESSION['retorno'] != null && $_SESSION['retorno'] != 0 ){
					if($_SESSION['retorno'] == 99){
						echo "<div id='retornosessao' style='margin-bottom: 5px;margin-top: 5px' class=\"alert alert-success\">
                E-mail enviado com sucesso!
          </div>";
						$_SESSION['retorno'] = null;
					}
				}
				?>
				<hr class="hr1">
				<div class="row">
					<div class="col-lg-3">

					</div>
					<div class="col-lg-6">
						<section>
							<div class="conteudo">
								<div class="contatos">
									<div class="contatos_box">
										<div class="title">Contatos</div>
										<div class="content">
											<div class="area-contato">
												<h5>Departamento de Vendas</h5>
												<div class="area-contato-box">
													<div class="area-email">
														<div class="area-contato-img">
															<img class="img" src="assets/imgs/envelope-white.png" data-tipo="1"/>
														</div>
														<div class="area-contato-email-1">
														</div>
													</div>
													<div class="area-telefone">
														<div class="area-telefone-imagem">
															<img src="assets/imgs/phone.png"/>
														</div>
														<div class="area-telefone-numero">
															(62) 3511 - 1862
														</div>
													</div>
												</div>
											</div>
											<hr class="hr">
											<div class="area-contato">
												<h5>Departamento de Compras</h5>
												<div class="area-contato-box">
													<div class="area-email">
														<div class="area-contato-img">
															<img class="img" src="assets/imgs/envelope-white.png" data-tipo="2"/>
														</div>
														<div class="area-contato-email-2">
														</div>
													</div>
													<div class="area-telefone">
														<div class="area-telefone-imagem">
															<img src="assets/imgs/phone.png"/>
														</div>
														<div class="area-telefone-numero">
															(62) 3511 - 1862
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
					</section>
				</div>
				<div class="col-lg-3">

				</div>
	</div>
	</article>
		</main>
		<footer class="footer">
			<div class="container">
                2017 ® <strong>Gaasa e Alimentos LTDA</strong> - Todos os direitos reservados<br><a href="contato">Entre em contato</a> - <a href="login">Acesso restrito</a>
			</div>
		</footer>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.redirect.js"></script>
<script type="text/javascript">
	resize();
    window.onload=function () {
        setTimeout(function () {
            if($("#retornosessao") != null){
                $("#retornosessao").slideUp();
            }
        },3000);
		resize();
    };

	window.onresize=function() {
		resize();
    };

    function resize() {
        $('.topo-titulo').css('width', ((parseFloat($('.topo').css('width'))) - parseFloat($('.topo-img').css('width')) - 15));
        $('.topo-titulo').find('div').css('width', parseFloat($('.topo-titulo').find('h1').css('width')));
        if($('html').height() < $(window).height()){
            $('.footer').css('position', 'fixed');
            $('#site').css('height', (parseFloat($(window).height()) - parseFloat($('.footer').css('height'))));
        }
        if($(document).height() > $(window).height()){
            $('.footer').css('position', 'static');
            $('#site').css('height', 'auto');
        }
    }


    $(".contatos_box").find('.img').bind("mouseover", function () {
        $(this).attr('src', 'assets/imgs/envelope-green.png');
    });

    $(".contatos_box").find('.img').bind("mouseout", function () {
        $(this).attr('src', 'assets/imgs/envelope-white.png');
    });

    $(".contatos_box").find('.img').bind('click', function () {
        var tipo = $(this).attr('data-tipo');
        $.redirect('contato', {tipo: tipo});
    });

</script>
</body>
</html>