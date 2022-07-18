<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Model\Entity\Testimony as EntityTestimony;

//Classe com mesmo nome do arquivo.
class Testimony extends Page
{
    /**
     * Método responsável por retornar o conteúdo view de depoimentos
     * @return string (Conteúdo HTML a ser impresso)
     */
    public static function getTestimonies()
    {
        //Recebe a view de depoimentos
        $content = View::render('Pages/Testimonies', []);

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
