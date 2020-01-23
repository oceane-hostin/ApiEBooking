<?php
namespace App\Controller;

use App\Entity\Housing;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/housing", name="housing_")
 */
class HousingController extends AbstractFOSRestController
{
    /**
     * Lists all Housing item.
     * @Rest\Get("/read")
     *
     * @return Response
     */
    public function getAllHousingAction(SerializerInterface $serializer){
        $repository = $this->getDoctrine()->getRepository(Housing::class);
        $housingCollection = $repository->findAll();

        $housingCollection = $serializer->serialize($housingCollection, 'json');

        $response = new Response($housingCollection);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

        //return $this->handleView($this->view("jnjn"));
    }

}