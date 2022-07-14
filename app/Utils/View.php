<?php

namespace App\Utils;

//Classe com mesmo nome do arquivo.
class View
{
    /**
     * Variáveis padrões da View
     * @var array 
     */
    private static $vars = [];

    /**
     * Método responsável por definir os dados iniciais da classe
     * @param array $vars
     */
    public static function init($vars = [])
    {
        self::$vars = $vars;
    }
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
     * @param array $vars (string/numeric)
     * @return string
     */
    public static function render($view, $vars = [])
    {
        //CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);

        //MERGE de variáveis da View
        $vars = array_merge(self::$vars, $vars);

        //Define que mesmo se não tiver nada, a mesma ainda é um array
        //Caso o contrario dá erro no str_replace,
        $keys = [];

        //Pega as chaves dos arrays e deixa as mesmas no padrão HTML
        foreach ($vars as $key => $value) {
            $keys[] = '{{' . $key . '}}';
        }

        /**
         * Retorna o conteúdo renderizado.
         * str_replace 'Oque eu quero mudar, pelo que eu quero mudar, e de onde eu quero mudar.'
         * Ou seja, as chaves no formato HTML que estão na View, pelos valores contidos em $vars.
         */
        return str_replace($keys, array_values($vars), $contentView);
    }
}
