<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Category;


/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog_index")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route ("/show/{slug}", defaults={"slug"="Article sans titre"}, requirements={"slug"="^[a-z0-9-]+$"}, name="blog_show")
     */
    public function show($slug)
    {
        $slug = ucwords(str_replace('-', ' ', $slug));
        return $this->render('blog/show.html.twig', [
            'titre' => $slug
        ]);
    }

    /**
     * @Route("/category/{name}", name="show_category")
     */
    public function showByCategory(Category $category)
    {
        $articles = $category->getArticles();

        return $this->render('blog/category.html.twig',
            [
                'category' => $category,
                'articles' => $articles
            ]
        );
    }

}
