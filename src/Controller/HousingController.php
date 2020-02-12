<?php
namespace App\Controller;

use App\Entity\Housing;
use Exception;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use FOS\RestBundle\Controller\AbstractFOSRestController;
// use FOS\RestBundle\Controller\Annotations as Rest;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/housing", name="housing_")
 */
class HousingController extends AbstractController
{
    /**
     * Lists all Housing item.
     * @Route("/read", name="read")
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
    }

    /**
     * Get on particular housing by Id
     * @Route("/read/id/{id}", name="read_single")
     *
     * @return Response
     */
    public function getHousingByIdAction(SerializerInterface $serializer, $id) {
        $repository = $this->getDoctrine()->getRepository(Housing::class);
        $housing = $repository->find($id);

        $housing = $serializer->serialize($housing, 'json');

        $response = new Response($housing);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Create a housing item
     * @Route("/create", name="create")
     *
     * @return Response
     */
    public function createHousingAction(Request $request, SerializerInterface $serializer) {
        $body = $request->getContent();

        try {
            $housing = $serializer->deserialize($body, Housing::class, 'json' );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($housing);
            $entityManager->flush();

            return new Response('Housing added successfully');

        } catch (Exception $e) {
            return new Response('Housing couldn\'t be added' . $e);
        }
    }

    /**
     * Updating an existing housing object
     * @Route("/update/{id}", name="update")
     *
     * @return Response
     */
    public function updateHousingAction(Request $request, $id) {
        $repository = $this->getDoctrine()->getRepository(Housing::class);
        $housing = $repository->find($id);

        $headers = $request->headers->all();

        try {
            $housing
                ->setName($headers["name"][0])
                ->setDescription($headers["description"][0])
                ->setAddress($headers["address"][0])
                ->setPricePerDay($headers["price-per-day"][0])
                ->setSurfaceArea($headers["surface-area"][0])
                ->setNumberOfTravellers($headers["number-of-travellers"][0])
                ->setNumberOfBedrooms($headers["number-of-bedrooms"][0])
                ->setNumberOfBed($headers["number-of-bed"][0])
                ->setNumberOfBathrooms($headers["number-of-bathrooms"][0]);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($housing);
            $entityManager->flush();

            return new Response('Housing updated successfully');

        } catch (Exception $e) {
            return new Response('Housing couldn\'t be updated' . $e);
        }
    }
}
