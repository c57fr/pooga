<?php
/**
 * Created by PhpStorm.
 * User: Mhammed
 * Date: 13/11/2016
 * Time: 12:46
 */

namespace App\Entity;


use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public function getUrl(){
        return 'index.php?page=categorie&id=' . $this->id ;
    }

}