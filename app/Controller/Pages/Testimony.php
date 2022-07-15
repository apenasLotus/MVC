<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Model\Entity\Organization;

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
        $content = View::render('Pages/Testimonies', [
        ]);

        //Retorna a view da página
        return parent::getPage('DEPOIMENTOS - MVC', $content);
    }
}
