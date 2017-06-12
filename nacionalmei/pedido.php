<?php
class Pedido{
    private $id;
    private $cliente;
    private $datacompra;
    private $datapagamento;
    private $dataprocessamento;
    private $datafim;
    private $nome;
    private $cpf;
    private $email1;
    private $email2;
    private $datanasc;
    private $telefone;
    private $celular;
    private $rg;
    private $rgorgao;
    private $rguf;
    private $estado;
    private $cidade;
    private $ocprincipal;
    private $ocsecundaria;
    private $capitalsocial;
    private $nomefantasia;
    private $endlogradouro;
    private $endnumero;
    private $endcomplemento;
    private $endbairro;
    private $endcidade;
    private $endestado;
    private $endcep;
    private $imprendastatus;
    private $imprendadoc;
    private $status;
    private $condpag;
    private $statussys;
    private $tipo;
    private $statuspg;

    private $pdo;

    public function __construct($i = ""){
        try{
            $this->pdo = new PDO("mysql:dbname=nacionalmei;host=localhost;charset=utf8", "root", "root");
        }catch (PDOException $e){
            echo "FALHOU: ".$e->getMessage();
        }
        if(!empty($i) || $i != ""){
            $sql = "SELECT * FROM pedidos WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($i));

            if($sql->rowCount() > 0){
                $data = $sql->fetch();
                $this->id = $data['id'];
                $this->cliente = $data['cliente'];
                $this->datacompra = $data['data_compra'];
                $this->datapagamento = $data['data_pagamento'];
                $this->dataprocessamento = $data['data_processamento'];
                $this->datafim = $data['data_fim'];
                $this->nome = $data['nome'];
                $this->cpf = $data['cpf'];
                $this->email1 = $data['email1'];
                $this->email2 = $data['email2'];
                $this->datanasc = $data['data_nasc'];
                $this->telefone = $data['telefone'];
                $this->celular = $data['celular'];
                $this->rg = $data['rg'];
                $this->rgorgao = $data['rg_orgao'];
                $this->rguf = $data['rg_uf'];
                $this->estado = $data['estado'];
                $this->cidade = $data['cidade'];
                $this->ocprincipal = $data['oc_principal'];
                $this->ocsecundaria = $data['oc_secundaria'];
                $this->capitalsocial = $data['capital_social'];
                $this->nomefantasia = $data['nome_fantasia'];
                $this->endlogradouro = $data['end_logradouro'];
                $this->endnumero = $data['end_numero'];
                $this->endcomplemento = $data['end_complemento'];
                $this->endbairro = $data['end_bairro'];
                $this->endcidade = $data['end_cidade'];
                $this->endestado = $data['end_estado'];
                $this->endcep = $data['end_cep'];
                $this->imprendastatus = $data['imp_renda_status'];
                $this->imprendadoc = $data['imp_renda_doc'];
                $this->status = $data['status'];
                $this->condpag = $data['cond_pag'];
                $this->statussys = $data['statussys'];
                $this->tipo = $data['tipo'];
                $this->statuspg = $data['statuspg'];
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function getDatacompra()
    {
        return $this->datacompra;
    }

    public function setDatacompra($datacompra)
    {
        $this->datacompra = $datacompra;
    }

    public function getDatapagamento()
    {
        return $this->datapagamento;
    }

    public function setDatapagamento($datapagamento)
    {
        $this->datapagamento = $datapagamento;
    }

    public function getDataprocessamento()
    {
        return $this->dataprocessamento;
    }

    public function setDataprocessamento($dataprocessamento)
    {
        $this->dataprocessamento = $dataprocessamento;
    }

    public function getDatafim()
    {
        return $this->datafim;
    }

    public function setDatafim($datafim)
    {
        $this->datafim = $datafim;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getEmail1()
    {
        return $this->email1;
    }

    public function setEmail1($email1)
    {
        $this->email1 = $email1;
    }

    public function getEmail2()
    {
        return $this->email2;
    }

    public function setEmail2($email2)
    {
        $this->email2 = $email2;
    }

    public function getDatanasc()
    {
        return $this->datanasc;
    }

    public function setDatanasc($datanasc)
    {
        $this->datanasc = $datanasc;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    public function getRgorgao()
    {
        return $this->rgorgao;
    }

    public function setRgorgao($rgorgao)
    {
        $this->rgorgao = $rgorgao;
    }

    public function getRguf()
    {
        return $this->rguf;
    }

    public function setRguf($rguf)
    {
        $this->rguf = $rguf;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getOcprincipal()
    {
        return $this->ocprincipal;
    }

    public function setOcprincipal($ocprincipal)
    {
        $this->ocprincipal = $ocprincipal;
    }

    public function getOcsecundaria()
    {
        return $this->ocsecundaria;
    }

    public function setOcsecundaria($ocsecundaria)
    {
        $this->ocsecundaria = $ocsecundaria;
    }

    public function getCapitalsocial()
    {
        return $this->capitalsocial;
    }

    public function setCapitalsocial($capitalsocial)
    {
        $this->capitalsocial = $capitalsocial;
    }

    public function getNomefantasia()
    {
        return $this->nomefantasia;
    }

    public function setNomefantasia($nomefantasia)
    {
        $this->nomefantasia = $nomefantasia;
    }

    public function getEndlogradouro()
    {
        return $this->endlogradouro;
    }

    public function setEndlogradouro($endlogradouro)
    {
        $this->endlogradouro = $endlogradouro;
    }

    public function getEndnumero()
    {
        return $this->endnumero;
    }

    public function setEndnumero($endnumero)
    {
        $this->endnumero = $endnumero;
    }

    public function getEndcomplemento()
    {
        return $this->endcomplemento;
    }

    public function setEndcomplemento($endcomplemento)
    {
        $this->endcomplemento = $endcomplemento;
    }

    public function getEndbairro()
    {
        return $this->endbairro;
    }

    public function setEndbairro($endbairro)
    {
        $this->endbairro = $endbairro;
    }

    public function getEndcidade()
    {
        return $this->endcidade;
    }

    public function setEndcidade($endcidade)
    {
        $this->endcidade = $endcidade;
    }

    public function getEndestado()
    {
        return $this->endestado;
    }

    public function setEndestado($endestado)
    {
        $this->endestado = $endestado;
    }

    public function getEndcep()
    {
        return $this->endcep;
    }

    public function setEndcep($endcep)
    {
        $this->endcep = $endcep;
    }

    public function getImprendastatus()
    {
        return $this->imprendastatus;
    }

    public function setImprendastatus($imprendastatus)
    {
        $this->imprendastatus = $imprendastatus;
    }

    public function getImprendadoc()
    {
        return $this->imprendadoc;
    }

    public function setImprendadoc($imprendadoc)
    {
        $this->imprendadoc = $imprendadoc;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCondpag()
    {
        return $this->condpag;
    }

    public function setCondpag($condpag)
    {
        $this->condpag = $condpag;
    }

    public function getStatussys()
    {
        return $this->statussys;
    }

    public function setStatussys($statussys)
    {
        $this->statussys = $statussys;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getStatuspg(){
        return $this->statuspg;
    }

    public function setStatuspg($statuspg){
        $this->statuspg = $statuspg;
    }

    public function salvar(){
        if(!empty($this->id)){
            $sql = "UPDATE pedidos SET cliente = ?, data_compra = ?, data_pagamento = ?, data_processamento = ?, data_fim = ?, nome = ?, cpf = ?, email1 = ?, email2 = ?, data_nasc = ?, telefone = ?, celular = ?, rg = ?, rg_orgao = ?, rg_uf = ?, estado = ?, cidade = ?, oc_principal = ?, oc_secundaria = ?, capital_social = ?, nome_fantasia = ?, end_logradouro = ?, end_numero = ?, end_complemento = ?, end_bairro = ?, end_cidade = ?, end_estado = ?, end_cep = ?, imp_renda_status = ?, imp_renda_doc = ?, status = ?, cond_pag = ?, tipo = ?, statuspg = ?  WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->cliente, $this->datacompra, $this->datapagamento, $this->dataprocessamento, $this->datafim, $this->nome, $this->cpf, $this->email1, $this->email2, $this->datanasc, $this->telefone, $this->celular, $this->rg, $this->rgorgao, $this->rguf, $this->estado, $this->cidade, $this->ocprincipal, $this->ocsecundaria, $this->capitalsocial, $this->nomefantasia, $this->endlogradouro, $this->endnumero, $this->endcomplemento, $this->endbairro, $this->endcidade, $this->endestado, $this->endcep, $this->imprendastatus, $this->imprendadoc, $this->status, $this->condpag, $this->tipo,$this->statuspg, $this->id));
        } else{
            $sql = "INSERT INTO pedidos SET cliente = ?, data_compra = ?, data_pagamento = ?, data_processamento = ?, data_fim = ?, nome = ?, cpf = ?, email1 = ?, email2 = ?, data_nasc = ?, telefone = ?, celular = ?, rg = ?, rg_orgao = ?, rg_uf = ?, estado = ?, cidade = ?, oc_principal = ?, oc_secundaria = ?, capital_social = ?, nome_fantasia = ?, end_logradouro = ?, end_numero = ?, end_complemento = ?, end_bairro = ?, end_cidade = ?, end_estado = ?, end_cep = ?, imp_renda_status = ?, imp_renda_doc = ?, status = ?, cond_pag = ?, tipo = ?, statuspg = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->cliente, $this->datacompra, $this->datapagamento, $this->dataprocessamento, $this->datafim, $this->nome, $this->cpf, $this->email1, $this->email2, $this->datanasc, $this->telefone, $this->celular, $this->rg, $this->rgorgao, $this->rguf, $this->estado, $this->cidade, $this->ocprincipal, $this->ocsecundaria, $this->capitalsocial, $this->nomefantasia, $this->endlogradouro, $this->endnumero, $this->endcomplemento, $this->endbairro, $this->endcidade, $this->endestado, $this->endcep, $this->imprendastatus, $this->imprendadoc, $this->status, $this->condpag, $this->tipo, $this->statuspg));
        }
    }

    public function delete(){
        $sql = "UPDATE pedidos SET statussys = ? WHERE id = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array(-1,$this->id));
    }
}