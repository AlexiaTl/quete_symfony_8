<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category_add")
     */
    public function add(Request $request, ObjectManager $objectManager)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $objectManager->persist($category);
            $objectManager->flush();

            return $this->redirectToRoute('category_add');
        }

        return $this->render('category/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'CategoryController',
        ]);
    }
}
