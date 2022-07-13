<?php

namespace app\Controller\Pages;

use app\Utils\View;

//Classe com mesmo nome do arquivo.
class Page
{
    /**
     * Método responsável por renderizar o HEADER da página
     * @return string 
     */
    private static function getHeader()
    {
        return View::render('Pages/Header');
    }
    /**
     * Método responsável por retornar o conteúdo VIEW da PAGE
     * @return string (Conteúdo HTML a ser impresso)
     */
    public static function getPage($title, $content)
    {
        return View::render('Pages/Page', [
            'title'   => $title,
            'content' => $content,
            'header'  => self::getHeader()
        ]);
    }
}
