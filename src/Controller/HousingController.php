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
            $housing->setCreatedAt(new \DateTime());
            $housing->setUpdatedAt(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->merge($housing);
            $entityManager->flush();

            return new Response('Housing added successfully');

        } catch (Exception $e) {
            return new Response('Housing couldn\'t be added' . $e);
        }
    }

    /**
     * Updating an existing housing object by id
     * @Route("/update/{id}", name="update")
     *
     * @return Response
     */
    public function updateHousingAction(Request $request, SerializerInterface $serializer, $id) {
        $repository = $this->getDoctrine()->getRepository(Housing::class);
        /**
         * @var \App\Entity\Housing $housing
         */
        $housing = $repository->find($id);

        $body = $request->getContent();

        try {
            /**
             * @var \App\Entity\Housing $housingData
             */
            $housingData = $serializer->deserialize($body, Housing::class, 'json' );
            $housing
                ->setName($housingData->getName())
                ->setDescription($housingData->getDescription())
                ->setAddress($housingData->getAddress())
                ->setPricePerDay($housingData->getPricePerDay())
                ->setSurfaceArea($housingData->getSurfaceArea())
                ->setNumberOfTravellers($housingData->getNumberOfTravellers())
                ->setNumberOfBedrooms($housingData->getNumberOfBedrooms())
                ->setNumberOfBed($housingData->getNumberOfBed())
                ->setNumberOfBathrooms($housingData->getNumberOfBathrooms())
                ->setUpdatedAt(new \DateTime())
            ;

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return new Response('Housing updated successfully');

        } catch (Exception $e) {
            return new Response('Housing couldn\'t be updated' . $e);
        }
    }

    /**
     * Deleting an housing object by id
     * @Route("/delete/{id}", name="delete")
     *
     * @return Response
     */
    public function deleteHousingAction($id) {
        $repository = $this->getDoctrine()->getRepository(Housing::class);

        $housing = $repository->find($id);

        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($housing);
            $entityManager->flush();

            return new Response('Housing deleted successfully');

        } catch (Exception $e) {
            return new Response('Housing couldn\'t be deleted' . $e);
        }
    }

    /**
     * Get all cities for housings
     * @Route("/cities", name="cities")
     *
     * @return Response
     */
    public function getAllCitiesAction(SerializerInterface $serializer) {
        $repository = $this->getDoctrine()->getRepository(Housing::class);
        $housingCollection = $repository->findAll();

        $cities = [];
        /**
         * @var \App\Entity\Housing $housing
         */
        foreach ($housingCollection as $housing) {
            $cities[] = $housing->getCity();
        }
        $cities = array_unique($cities);

        $cities = $serializer->serialize($cities, 'json');

        $response = new Response($cities);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
