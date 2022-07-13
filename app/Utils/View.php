<?php

namespace App\Utils;

//Classe com mesmo nome do arquivo.
class View
{
    /**
     * Método responsável por retornar o conteúdo da View
     * 
     * @param string $view
     * @return string
     */
    private static function getContentView($view)
    {
        //Concatena o nome da View com o caminho até a mesma.
        $file = __DIR__ . '/../../resources/View/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }
    /**
     * Retorna o conteúdo renderizado de uma view
     * 
     * @param string $view
     * @return string
     */
    public static function render($view)
    {
        //CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);

        //Retorna o conteúdo renderizado.
        return $contentView;
    }
}
