<?php

namespace app\Http;

class Response
{
    /**
     * Código do status HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do Response
     * @var mixed
     */
    private $content;

    /**
     * Método responsável por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content  = $content;
        $this->setContentType($contentType);
    }

    /**
     * Método responsável por alterar o content type do response
     * @param string
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho de Response
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value)
    {
        $this->header[$key] = $value;
    }

    /**
     * Método responsável por enviar a resposta para o usuário
     */
    public function sendResponse()
    {
        /**
         * Switch é executado imprimindo o conteúdo na tela, caso o mesmo for HTML
         */
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}
