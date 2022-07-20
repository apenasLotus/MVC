<?php

namespace App\Model\Entity;

use App\Database\Database;

class Testimony
{

    /**
     * ID do depoimento
     * @var integer
     */
    public $ID;

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
        $this->ID = (new Database('DEPOIMENTOS'))->insert([
            'nome'     => $this->nome,
            'mensagem' => $this->mensagem,
            'data'     => $this->data
        ]);

        //Sucesso
        return true;
    }

    /**
     * Método responsável por retornar depoimentos
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * 
     * @return PDOStatement
     */
    public static function getTestimonies($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('DEPOIMENTOS'))->select($where, $order, $limit, $fields);
    }
}
