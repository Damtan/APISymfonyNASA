<?php


namespace App\Controller\Nasa;


use App\Service\NasaSpaceMission\NasaSpaceMissionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class NasaController extends AbstractController
{
    protected $nasaSpaceMissionService;


    public function __construct(NasaSpaceMissionService $nasaSpaceMissionService)
    {
        $this->nasaSpaceMissionService = $nasaSpaceMissionService;
    }


    /**
     * @Route("/nasa")
     */
    public function index(Request $request)
    {
        $cameras = $this->handleGetCameras();
        $rovers = $this->handleGetRovers();

        $form = $this->createFormBuilder()
            ->add('from', DateType::class)
            ->add('to', DateType::class)
            ->add('camera', ChoiceType::class, ['choices' => $cameras])
            ->add('rover', ChoiceType::class, ['choices' => $rovers])
            ->add('search', SubmitType::class, ['label' => 'Search'])
            ->getForm();

        $results = $this->getData($form, $request);
    
        return $this->render('nasa/nasa.html.twig', [
            'results' => $results,
            'form' => $form->createView()
        ]);
    }

    private function getData($form, $request)
    {
        $form->handleRequest($request);
        $condition = NULL;
        $parameters = [];

        if ($form->isSubmitted()) {
            $condition = 't.earth_date BETWEEN :from AND :to AND t.rover_id = :rover_id AND t.camera_id = :camera_id';
            $parameters = $this->getNasaParametersFromForm($form);
        }

        return $this->nasaSpaceMissionService->getNasaData($condition, $parameters);
    }

    private function handleGetCameras()
    {
        $result = [];
        $cameras = $this->nasaSpaceMissionService->getCameras();

        foreach ($cameras AS $camera) {
            $result[$camera->getName()] = $camera->getClId();
        }

        return $result;
    }

    private function handleGetRovers()
    {
        $result = [];
        $rovers = $this->nasaSpaceMissionService->getRovers();

        foreach ($rovers AS $rover) {
            $result[$rover->getName()] = $rover->getClId();
        }

        return $result;
    }

    private function getNasaParametersFromForm($form)
    {
        $parameters = [
            'from' => $form->getData()['from']->format('Y-m-d'),
            'to' => $form->getData()['to']->format('Y-m-d'),
            'rover_id' => $form->getData()['rover'],
            'camera_id' => $form->getData()['camera'],
        ];

        return $parameters;
    }
}