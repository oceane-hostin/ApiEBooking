<?php
namespace App\Controller;

use App\Entity\Person;
use Exception;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/person", name="person")
 */
class PersonController extends AbstractController
{
    /**
     * Lists all Person item.
     * @Route("/read", name="read")
     *
     * @return Response
     */
    public function getAllPersonAction(SerializerInterface $serializer){
        $repository = $this->getDoctrine()->getRepository(Person::class);
        $personCollection = $repository->findAll();

        $personCollection = $serializer->serialize($personCollection, 'json');

        $response = new Response($personCollection);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Get on particular person by Id
     * @Route("/read/id/{id}", name="read_single")
     *
     * @return Response
     */
    public function getPersonByIdAction(SerializerInterface $serializer, $id) {
        $repository = $this->getDoctrine()->getRepository(Person::class);
        $person = $repository->find($id);

        $person = $serializer->serialize($person, 'json');

        $response = new Response($person);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Create a person
     * @Route("/create", name="create")
     *
     * @return Response
     */
    public function createPersonAction(Request $request, SerializerInterface $serializer) {
        $body = $request->getContent();

        try {
            $person = $serializer->deserialize($body, Person::class, 'json' );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($person);
            $entityManager->flush();

            return new Response('Person added successfully');

        } catch (Exception $e) {
            return new Response('Person couldn\'t be added' . $e);
        }
    }

    /**
     * Updating an existing person by id
     * @Route("/update/{id}", name="update")
     *
     * @return Response
     */
    public function updatePersonAction(Request $request, SerializerInterface $serializer, $id) {
        $repository = $this->getDoctrine()->getRepository(Person::class);
        /**
         * @var \App\Entity\Person $person
         */
        $person = $repository->find($id);

        $body = $request->getContent();

        try {
            /**
             * @var \App\Entity\Person $personData
             */
            $personData = $serializer->deserialize($body, Person::class, 'json' );
            $person
                ->setFirstName($personData->getFirstName())
                ->setLastName($personData->getLastName())
                ->setEmail($personData->getEmail())
                ->setPassword($personData->getPassword())
                ->setDateOfBirth($personData->getDateOfBirth())
                ->setIsAdmin($personData->getIsAdmin())
            ;

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return new Response('Person updated successfully');

        } catch (Exception $e) {
            return new Response('Person couldn\'t be updated' . $e);
        }
    }

    /**
     * Deleting an person by id
     * @Route("/delete/{id}", name="delete")
     *
     * @return Response
     */
    public function deleteHousingAction($id) {
        $repository = $this->getDoctrine()->getRepository(Person::class);

        $person = $repository->find($id);

        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($person);
            $entityManager->flush();

            return new Response('Person deleted successfully');

        } catch (Exception $e) {
            return new Response('Person couldn\'t be deleted' . $e);
        }
    }
}
