<?php
require "config.php";
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){

} else{
    $_SESSION['retorno'] = 10;
    header("Location:login");
}
$acessos = buscarOcorrencias($pdo, "conexoes", "ip");
echo "<h4>Total de acessos: ".$acessos->rowCount()."</h4>";
echo "<table class=\"table table-bordered tabela\">
                                    <thead>
                                    <tr>
                                        <th>IP</th>
                                        <th>Número de acessos</th>
                                        <th>Último acesso</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
foreach ($acessos->fetchALL() as $item){
    echo "<tr>
                                            <td>".$item['ip']."</td>
                                            <td>".$item['repeticoes']."</td>
                                            <td>".$item['max']."</td>";
}
echo "</tbody>
                                </table>";
?>