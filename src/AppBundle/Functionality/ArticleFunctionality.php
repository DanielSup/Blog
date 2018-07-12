<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11.7.2018
 * Time: 15:27
 */

namespace AppBundle\Functionality;


use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleFunctionality extends Controller
{

    public function getLastArticles($offset = 0, $limit = 2){
        return $this->getDoctrine()->getRepository(Article::class)->getLastArticles($offset, $limit);
    }
}