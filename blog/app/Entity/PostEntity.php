<?php
/**
 * Created by PhpStorm.
 * User: Mhammed
 * Date: 13/11/2016
 * Time: 12:46
 */

namespace App\Entity;


use Core\Entity\Entity;

class PostEntity extends Entity
{
    public function getUrl(){
        return 'index.php?page=article&id=' . $this->id ;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
        $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a></p>';
        return $html;
    }

}
