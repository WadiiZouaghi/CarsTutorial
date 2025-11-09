<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/voiture', name: 'voiture_')]
class VoitureController extends AbstractController
{
    #[Route('/liste', name: 'liste')]
    public function listeVoiture(VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();
        return $this->render('voiture/listVoiture.html.twig', [
            'voitures' => $voitures,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Voiture $voiture, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($voiture);
        $entityManager->flush();

        $this->addFlash('success', 'Voiture supprimée avec succès');
        return $this->redirectToRoute('voiture_liste');
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Request $request, Voiture $voiture, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $voiture->setSerie($request->request->get('serie'));
            $voiture->setModele($request->request->get('modele'));
            $voiture->setPrixJour((float)$request->request->get('prixJour'));
            $voiture->setDateMiseEnMarche(new \DateTime($request->request->get('dateMiseEnMarche')));

            $entityManager->flush();

            $this->addFlash('success', 'Voiture modifiée avec succès');
            return $this->redirectToRoute('voiture_liste');
        }

        return $this->render('voiture/edit.html.twig', [
            'voiture' => $voiture
        ]);
    }

    
    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $voiture = new Voiture();
            $voiture->setSerie($request->request->get('serie'));
            $voiture->setModele($request->request->get('modele'));
            $voiture->setPrixJour((float)$request->request->get('prixJour'));
            $voiture->setDateMiseEnMarche(new \DateTime($request->request->get('dateMiseEnMarche')));

            $entityManager->persist($voiture);
            $entityManager->flush();

            $this->addFlash('success', 'Voiture ajoutée avec succès');
            return $this->redirectToRoute('voiture_liste');
        }

        return $this->render('voiture/new.html.twig');
    }
}