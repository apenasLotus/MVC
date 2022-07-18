<?php

namespace App\Model\Entity;

use App\Database\Database;

class Testimony
{

    /**
     * ID do depoimento
     * @var integer
     */
    public $id;

    /**
     * NOME do usuário que fez o depoimento
     * @var string
     */
    public $nome;

    /**
     * MENSAGEM do depoimento
     * @var string
     */
    public $mensagem;

    /**
     * DATA de publicação do depoimento
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar a instancia atual no banco de dados.
     * @return boolean
     */
    public function cadastrar()
    {

        //Define e data
        $this->data = date('Y-m-d H:i:s');

        //Insere o depoimento no banco de dados
        $this->id = (new Database('depoimentos'))->insert([
            'nome'     => $this->nome,
            'mensagem' => $this->mensagem,
            'data'     => $this->data
        ]);
        echo '<pre>';
        print_r($this);
        echo '</pre>';
        exit;
    }
}
