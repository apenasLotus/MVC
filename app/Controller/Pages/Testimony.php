<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Model\Entity\Testimony as EntityTestimony;
use LDAP\Result;

//Classe com mesmo nome do arquivo.
class Testimony extends Page
{

    /**
     * Método responsável por obter a renderização dos itens de depoimentos
     * @return string
     */
    private static function getTestimonyItens()
    {
        //Depoimentos
        $itens = '';

        //Resultados da página
        $results = EntityTestimony::getTestimonies(null, 'id DESC');

        //Renderiza o item
        while ($obTestimony = $results->fetchObject(EntityTestimony::class)) {
            $itens .= View::render('Pages/Testimonies/Item', [
                'nome' => $obTestimony->nome,
                'mensagem' => $obTestimony->mensagem,
                'data' => date('d/m/Y H:i:s', strtotime($obTestimony->data))
            ]);
        }

        //Retorna os depoimentos
        return $itens;
    }

    /**
     * Método responsável por retornar o conteúdo view de depoimentos
     * @return string (Conteúdo HTML a ser impresso)
     */
    public static function getTestimonies()
    {
        //Recebe a view de depoimentos
        $content = View::render('Pages/Testimonies', [
            'itens' => self::getTestimonyItens()
        ]);

        //Retorna a view da página
        return parent::getPage('DEPOIMENTOS - MVC', $content);
    }

    /**
     * Método responsável por cadastrar um depoimento
     * @param Request $request
     * @return string
     */
    public static function insertTestimony($request)
    {
        //Dados do POST  
        $postVars = $request->getPostVars();

        //Nova instancia de depoimento
        $obTestimony = new EntityTestimony;
        $obTestimony->nome = $postVars['nome'];
        $obTestimony->mensagem = $postVars['mensagem'];
        $obTestimony->cadastrar();

        return self::getTestimonies();
    }
}
