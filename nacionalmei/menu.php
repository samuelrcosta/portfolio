<?php
function inserirMenu($usuario, $tipo){
    if($tipo == 0){
        echo "<sidebar class=\"sidebar\">
            <div class=\"logo\">
                <a href=\"\"><img src=\"assets/images/logo.png\" border=\"0\" width=\"35\" /></a>
            </div>
            <div class=\"userinfo\">
                <div class=\"userinfo_photo\">
                    <img src=\"assets/media/avatar/default.jpg\" border=\"0\" width=\"41\" height=\"41\" />
                </div>
                <div class=\"userinfo_info\">
                    <p>".$usuario->getNome()."</p>
                    <small>".$usuario->getFuncao()."</small>
                </div>
                <div style=\"clear:both\"></div>
            </div>
            <menu>
                <ul>
                    <li class=\"active\"><a href=\"home\">Dashboard</a></li>
                    <li ><a href=\"pedidos\">Pedidos</a></li>
                    <li ><a href='#'>Membros</a></li>
                    <li ><a href='#'>Discussões</a></li>
                    <li ><a href='#'>Meus Clubes</a></li>
                    <li ><a href='#'>Meu Perfil</a></li>
                    <li ><a href='#'>Suporte</a></li>
                    <li ><a href='logout.php'>Sair</a></li>
                </ul>
            </menu>
        </sidebar>";
    } else if ($tipo == 1){
        echo "<sidebar class=\"sidebar\">
            <div class=\"logo\">
                <a href=\"\"><img src=\"assets/images/logo.png\" border=\"0\" width=\"35\" /></a>
            </div>
            <div class=\"userinfo\">
                <div class=\"userinfo_photo\">
                    <img src=\"assets/media/avatar/default.jpg\" border=\"0\" width=\"41\" height=\"41\" />
                </div>
                <div class=\"userinfo_info\">
                    <p>".$usuario->getNome()."</p>
                    <small>".$usuario->getFuncao()."</small>
                </div>
                <div style=\"clear:both\"></div>
            </div>
            <menu>
                <ul>
                    <li ><a href=\"home\">Dashboard</a></li>
                    <li class='active' ><a href=\"pedidos\">Pedidos</a></li>
                    <li ><a href='#'>Membros</a></li>
                    <li ><a href='#'>Discussões</a></li>
                    <li ><a href='#'>Meus Clubes</a></li>
                    <li ><a href='#'>Meu Perfil</a></li>
                    <li ><a href='#'>Suporte</a></li>
                    <li ><a href='logout.php'>Sair</a></li>
                </ul>
            </menu>
        </sidebar>";
    } else{
        echo "<sidebar class=\"sidebar\">
    <div class=\"logo\">
        <a href=\"\"><img src=\"assets/images/logo.png\" border=\"0\" width=\"35\" /></a>
    </div>
    <div class=\"userinfo\">
        <div class=\"userinfo_photo\">
            <img src=\"assets/media/avatar/default.jpg\" border=\"0\" width=\"41\" height=\"41\" />
        </div>
        <div class=\"userinfo_info\">
            <p>".$usuario->getNome()."</p>
            <small>".$usuario->getFuncao()."</small>
        </div>
        <div style=\"clear:both\"></div>
    </div>
    <menu>
        <ul>
            <li class=\"active\"><a href=\"home\">Dashboard</a></li>
            <li ><a href=\"pedidos\">Pedidos</a></li>
            <li ><a href='#'>Membros</a></li>
            <li ><a href='#'>Discussões</a></li>
            <li ><a href='#'>Meus Clubes</a></li>
            <li ><a href='#'>Meu Perfil</a></li>
            <li ><a href='#'>Suporte</a></li>
            <li ><a href='logout.php'>Sair</a></li>
        </ul>
    </menu>
</sidebar>";
    }
}

function converterData($data){
    $retorno = explode("-",$data)[2]."/".explode("-",$data)[1]."/".explode("-",$data)[0];
    return $retorno;
}

function lerPedidos($filtro){
    if($filtro == 0){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0";
    }else if($filtro == 1){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND statuspg = 0";
    }else if($filtro == 2){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND statuspg = 1";
    }else if($filtro == 3){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND statuspg = 2";
    }else if($filtro == 4){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND status = 0";
    }else if($filtro == 5){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND status = 1";
    }else if($filtro == 6){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND status = 2";
    }else if($filtro == 7){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND tipo = 0";
    }else if($filtro == 8){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND tipo = 1";
    }else if($filtro == 9){
        $sql = "SELECT * FROM pedidos WHERE statussys = 0 AND tipo = 2";
    }
    try{
        $pdo = new PDO("mysql:dbname=nacionalmei;host=localhost;charset=utf8", "root", "root");
    }catch (PDOException $e){
        echo "FALHOU: ".$e->getMessage();
    }
    $sql = $pdo->prepare($sql);
    $sql->execute();

    if($sql->rowCount() > 0){
        $data = $sql->fetchAll();
        foreach ($data as $item){
            $data_compra = explode("-", $item['data_compra']);
            $hora_compra = explode(":", $item['data_compra'], 10);
            if ($item['statuspg'] == 0){
                $statuspg = "Em aberto";
            }
            if ($item['status'] == 0){
                $status = "Recebido";
            }
            if($item['tipo'] ==  "0")
                $tipo = "Criar MEI";
            echo "<a href='verPedido?id=".base64_encode(base64_encode($item['id']))."'>
                <div class=\"discussion_item\">
                    <div class=\"dis_img\">
                        <img src=\"assets/imgs/text-file.png\" border=\"0\" width=\"25\" height=\"25\">
                    </div>
                    <div class=\"dis_info\">
                        <div class=\"dis-numero\">
                            Número: <span>".$item['id']."</span>
                        </div>
                        <div class=\"dis_title\">
                            <div>".$status."</div>
                            ".$tipo."
                        </div>
                        <div class=\"dis_author\">Criado por: ".$item['nome']."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<img src=\"assets/imgs/time.png\" border=\"0\" width=\"13\" height=\"13\"> em ".explode(" ", $data_compra[2])[0]."/".$data_compra[1]."/".$data_compra[0]." às ".explode(" ", $hora_compra[0])[1].":".$hora_compra[1]."</div>
                        <div class=\"dis_author\">Pagamento: ".$statuspg."</div>
                    </div>
                </div>
            </a>";
        }
    } else{
        echo "Nenhum pedido encontrado!";
    }
}