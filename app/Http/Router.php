<?php

namespace App\Http;

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
     * Método responsável por retornar a URI sem o prefixo
     * @return string
     */
    private function getUri()
    {
        //URI da request
        $uri = $this->request->getUri();

        //Fatia a URI com o prefixo
        $xUri = strlen($this->prefix) ?
            explode($this->prefix, $uri) : [$uri];

        return end($xUri);
    }

    /**
     * Método responsável por retornar os dados da rota atual
     * @return array
     */
    private function getRoute()
    {
        //URI
        $uri = $this->getUri();

        //METHOD
        $httpMethod = $this->request->getHttpMethod();

        //Valida as ROTAS
        foreach ($this->routes as $patternRoute => $methods) {

            //Verifica se a URI bate com o padrão
            if (preg_match($patternRoute, $uri)) {

                //Verifica o Método
                if ($methods[$httpMethod])
                    return $methods[$httpMethod];

                throw new Exception("Método não permitido", 405);
            }
        }

        throw new Exception("URL não encontrada", 404);
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
     * Método responsável por definir uma rota de POST
     * @param string $route
     * @param array $params
     */
    public function post($route, $params = [])
    {
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de PUT
     * @param string $route
     * @param array $params
     */
    public function put($route, $params = [])
    {
        return $this->addRoute('PUT', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de DELETE
     * @param string $route
     * @param array $params
     */
    public function delete($route, $params = [])
    {
        return $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Método responsável por executar a rota atual
     * @return Response
     */
    public function run()
    {
        try {
            //Obtém a rota atual
            $route = $this->getRoute();

            //Verifica o controlador
            if (!isset($route['controller']))
                throw new Exception("A URL não pôde ser processada", 500);

            //Argumentos da função
            $args = [];

            //Retorna a execução da função
            return call_user_func_array($route['controller'], $args);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}
