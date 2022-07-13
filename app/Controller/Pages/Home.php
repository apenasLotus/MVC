<?php

namespace app\Controller\Pages;

use app\Utils\View;

//Classe com mesmo nome do arquivo.
class Home extends Page
{
    /**
     * Método responsável por retornar o conteúdo view da Home
     * @return string (Conteúdo HTML a ser impresso)
     */
    public static function getHome()
    {
        //Recebe a view da Home
        $content = View::render('Pages/Home', [
            'name'        => 'MVC Gabriel',
            'description' => 'Treino MVC',
            'site'        => 'youtube.com'
        ]);

        //Retorna a view da página
        return parent::getPage('Gabriel MVC', $content);
    }
}
