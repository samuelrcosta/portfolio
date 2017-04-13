<DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>
        PHP Training
    </title>
    <link href="normalize.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<header>
    <div class="titulo">
    <h1>Título da Página</h1>
    </div>
</header>
<nav>
    <div class="menu">
        Este é nosso menu
    </div>
</nav>
<hr/>
<div class="conteudo">
    <text class="php_return">
        <?php
        require "PHP_Receiver.php";
        ?>
    </text>
    <form method="POST">
        E-mail:<br/>
        <input type="text" name="email" class="camp" required autofocus/><br><br/>
        Senha:<br/>
        <input type="password" name="password" class="camp" required/><br/><br/>
        <input type="submit" value="Enviar Dados"/>
    </form>
    <a href="http://pudim.com.br" target="_blank">Se apertar vai pro Pudim</a>
    <br/>
    <br/>
    <table width="500px" border="1px">
        <tr bgcolor="#999999">
            <td>Imagem</td>
            <td>Nome do Produto</td>
            <td align="center">Estoque</td>
            <td>Preço</td>
        </tr>
        <tr>
            <td><img src="http://1.bp.blogspot.com/-I_CrWXZrXK8/UbRyoN8kHAI/AAAAAAABSas/zjAgLoyHzW0/s1600/pedra.jpg" class="img"/></td>
            <td>Pedra</td>
            <td align="center">5</td>
            <td>R$ 100,00</td>
        </tr>
        <tr>
            <td><img src="https://static.mobly.com.br/r/540x540/p/Fibrasca-----Travesseiro-Frio-Geltex-Nasa-ViscoelC3A1stico-Block-Base-System-para-Fronhas-50x70-2011-066641-1-zoom.jpg" class="img"/></td>
            <td>Travesseiro</td>
            <td align="center">4</td>
            <td>R$ 30,00</td>
        </tr>
        <tr>
            <td colspan="3" align="right">SUB-TOTAL</td>
            <td>R$ 130,00</td>
        </tr>
    </table>
    <div class="testbord">
    </div>
</div>
<footer>
</footer>
<br/><br/>
</body>
</html>