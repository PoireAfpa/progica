<?php

namespace App\Controller;

use App\Entity\OptionCost;
use App\Form\OptionCostType;
use App\Repository\OptionCostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/option/cost')]
class OptionCostController extends AbstractController
{
    #[Route('/', name: 'app_option_cost_index', methods: ['GET'])]
    public function index(OptionCostRepository $optionCostRepository): Response
    {
        return $this->render('option_cost/index.html.twig', [
            'option_costs' => $optionCostRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_option_cost_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OptionCostRepository $optionCostRepository): Response
    {
        $optionCost = new OptionCost();
        $form = $this->createForm(OptionCostType::class, $optionCost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $optionCostRepository->add($optionCost);
            return $this->redirectToRoute('app_option_cost_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('option_cost/new.html.twig', [
            'option_cost' => $optionCost,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_option_cost_show', methods: ['GET'])]
    public function show(OptionCost $optionCost): Response
    {
        return $this->render('option_cost/show.html.twig', [
            'option_cost' => $optionCost,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_option_cost_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OptionCost $optionCost, OptionCostRepository $optionCostRepository): Response
    {
        $form = $this->createForm(OptionCostType::class, $optionCost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $optionCostRepository->add($optionCost);
            return $this->redirectToRoute('app_option_cost_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('option_cost/edit.html.twig', [
            'option_cost' => $optionCost,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_option_cost_delete', methods: ['POST'])]
    public function delete(Request $request, OptionCost $optionCost, OptionCostRepository $optionCostRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$optionCost->getId(), $request->request->get('_token'))) {
            $optionCostRepository->remove($optionCost);
        }

        return $this->redirectToRoute('app_option_cost_index', [], Response::HTTP_SEE_OTHER);
    }
}
