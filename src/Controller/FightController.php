<?php

namespace App\Controller;

use App\Figth\DamageCalculator;
use App\Form\FightType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FightController extends Controller
{

    public function indexAction(Request $request, EntityManager $manager)
    {
        $form = $this->createForm(FightType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \App\Figth\Fight $fight */
            $fight = $form->getData();
        }

        return $this->render('Fight/index.html.twig', ['form' => $form->createView()]);
    }
}