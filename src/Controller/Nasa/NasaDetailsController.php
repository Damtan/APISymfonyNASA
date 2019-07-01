<?php


namespace App\Controller\Nasa;


use App\Entity\NasaSpaceFullInfoView;
use Symfony\Component\Routing\Annotation\Route;


class NasaDetailsController extends NasaController
{

    /**
     * @Route("/nasa-details/{id}")
     */
    public function details($id)
    {
        $result = $this->nasaSpaceMissionService->getOneBy(NasaSpaceFullInfoView::class, ['id' => $id]);

        return $this->render('nasa/nasaDetails.html.twig', [
            'result' => $result,
        ]);
    }
}