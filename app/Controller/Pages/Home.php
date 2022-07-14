<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Model\Entity\Organization;

//Classe com mesmo nome do arquivo.
class Home extends Page
{
    /**
     * Método responsável por retornar o conteúdo view da Home
     * @return string (Conteúdo HTML a ser impresso)
     */
    public static function getHome()
    {
        //Objeto que referencia a classe de organização/retorno de um banco de dados.
        $obOrganization = new Organization;

        //Recebe a view da Home
        $content = View::render('Pages/Home', [
            'name'        => $obOrganization->name,
        ]);

        //Retorna a view da página
        return parent::getPage('HOME - MVC', $content);
    }
}
