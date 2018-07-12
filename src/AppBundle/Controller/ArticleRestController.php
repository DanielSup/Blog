<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11.7.2018
 * Time: 13:05
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Article;
use AppBundle\Functionality\ArticleFunctionality;
use FOS\RestBundle\Controller\Annotations\Prefix;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

/**
 * @Prefix("api")
 * @RouteResource("Article", pluralize=false)
 */
class ArticleRestController extends FOSRestController
{


    public function viewInJSON(View $view)
    {
        $handler = $this->get('fos_rest.view_handler');
        if (!$handler->isFormatTemplating($view->getFormat())) {
            $templatingHandler = function ($handler, $view, $request) {
                if ($view->getTemplate()) {
                    $data = $view->getData();
                    if (empty($data['params'])) {
                        $params = array();
                    } else {
                        $params = $data['params'];
                        unset($data['params']);
                    }

                    $view->setData($params);
                    $data['html'] = $handler->renderTemplate($view, 'html');

                    $view->setData($data);
                }

                return $handler->createResponse($view, $request, "json");
            };

            $handler->registerHandler($view->getFormat(), $templatingHandler);
        }
        return $handler->handle($view);
    }


    public function getAction($offset){
        $articles = $this->getDoctrine()->getRepository(Article::class)
            ->getLastArticles($offset, 2);
        $view = $this->view($articles,200)->setFormat("json");
        return $this->viewInJSON($view);
    }
}