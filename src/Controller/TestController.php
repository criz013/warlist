<?php

namespace App\Controller;

use App\Entity\Army;
use App\Entity\Games;
use App\Entity\KeyWord;
use App\Form\ArmyType;
use App\Form\GameType;
use App\Form\KeywordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    #[Route('/game/list', name: 'game_list')]
    public function index(): Response {

    }

    #[Route('/game/add', name: 'game_add')]
    public function addGame(Request $request, EntityManagerInterface $em): Response{
        $gameForm = new Games();
        $form = $this->createForm(GameType::class,$gameForm);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($gameForm);
            $em->flush();
        }
        return $this->render('game/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/army/add', name: 'army_add')]
    public function addArmy(Request $request, EntityManagerInterface $em): Response {
        $armyForm = new Army();
        $form = $this->createForm(ArmyType::class, $armyForm);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($armyForm);
            $em->flush();
        }
        return $this->render('game/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/keyword/add', name: 'keyword_add')]
    public function addkeyword(Request $request, EntityManagerInterface $em): Response {
        $keyForm = new KeyWord();
        $form = $this->createForm(KeyWordType::class, $keyForm);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($keyForm);
            $em->flush();
        }
        return $this->render('game/new.html.twig', [
            'form' => $form,
        ]);
    }
}