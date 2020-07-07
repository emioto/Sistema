<?php 
namespace App\Entities;

use CodeIgniter\Entity;

abstract class PadraoEntidade extends Entity
{
    function _construct()
    {
       array_push($this->attributes, 'Id');
       array_push($this->casts , ['Id' => 'integer']);
    }
}