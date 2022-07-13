<?php

namespace app\Model\Entity;

/**
 * Classe apenas de exemplificação, simulando um retorno de dados
 * vindos de um banco de dados.
 */

class Organization
{
    /**
     * ID da organização
     * @var integer
     */
    public $id = 1;

    /**
     * Nome... Nesse caso o meu
     * @var string
     */
    public $name = 'Gabriel Vitor';

    /**
     * Site da organização... No caso meu git
     * @var string
     */
    public $site = 'https://github.com/apenasLotus/MVC';

    /**
     * Descrição da organização
     * @var string
     */
    public $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex at nobis saepe, recusandae vitae voluptatum quos asperiores pariatur harum ea, ratione tempore! Voluptas similique aperiam enim ipsum dignissimos molestiae eos';
}
