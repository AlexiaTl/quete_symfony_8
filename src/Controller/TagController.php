<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Tag;

class TagController extends AbstractController
{
    /**
     * @Route("/tag/{name}", name="show_tag")
     */
    public function showByTag(Tag $tag)
    {
        $articles = $tag->getArticles();

        return $this->render('tag/index.html.twig',
            [
                'tag' => $tag,
                'articles' => $articles
            ]
        );
    }

}
