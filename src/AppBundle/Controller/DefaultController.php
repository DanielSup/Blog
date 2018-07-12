<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->getLastArticles();
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function articleAction(Request $request, $id){
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        if(empty($article)){
            throw new NotFoundHttpException("Článek s daným ID nebyl nalezen.");
        }
        return $this->render('default/article.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'article' => $article
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request){
        return $this->render('default/contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
