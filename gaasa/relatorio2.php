<?php
require 'config.php';
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false && $_SESSION['id'] != -1){

} else{
    $_SESSION['retorno'] = 10;
    header("Location:login");
}
$acessos = buscarTotal("conexoes", $pdo);
echo "<h4>Total de acessos: ".$acessos->rowCount()."</h4>";
echo "<table class=\"table table-bordered tabela\">
                                    <thead>
                                    <tr>
                                        <th>Data de acesso</th>
                                        <th>IP</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
foreach ($acessos->fetchALL() as $item){
    echo "<tr>
                                            <td>".$item['data']."</td>
                                            <td>".$item['ip']."</td>";
}
echo "</tbody>
                                </table>";
?>
