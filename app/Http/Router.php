<?php

namespace app\Http;

use Closure;
use Exception;

class Router
{
    /**
     * URL completa do projeto (raiz)
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * @var string
     */
    private $prefix = '';

    /**
     * Índice de rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instancia de Request
     * @var Request
     */
    private $request;

    /**
     * Método responsável por iniciar a classe
     * @param string $url
     */
    public function __construct($url)
    {
        $this->request = new Request();
        $this->url     = $url;
        $this->setPrefix();
    }

    /**
     * Método responsável por definir o prefixo das rotas
     */
    private function setPrefix()
    {
        /**
         * Informações da URL atual
         * Prefix = ['path']
         * Caso não exista, não tem oque remover
         */
        $parseUrl = parse_url($this->url);

        //Define o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Método responsável por adicionar uma rota na classe
     * @param string $method
     * @param string $route
     * @param array $params
     */
    public function addRoute($method, $route, $params = [])
    {
        //Validação dos parâmetros
        foreach ($params as $key => $value) {

            /**
             * Trocando a posição numérica no array, para um 'controller'
             */

            //Se $value for uma instancia de Closure
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //Padrão de validação da URL
        $patternRoute = '/^' . str_replace('/', '\/', $route) . '$/';

        //Adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Método responsável por definir uma rota de GET
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Método responsável por executar a rota atual
     * @return Response
     */
    public function run()
    {
        try{

            $route = $this->getRoute();

        }catch(Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}
