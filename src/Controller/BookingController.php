<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Housing;
use App\Entity\Person;
use Exception;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/booking", name="booking_")
 */
class BookingController extends AbstractController
{
    /**
     * Lists all Booking for a particular person.
     * @Route("/read/person_id/{personId}", name="read")
     *
     * @return Response
     */
    public function getPersonBookingsAction(SerializerInterface $serializer, $personId){
        /**
         * @var \App\Repository\BookingRepository $repository
         */
        $repository = $this->getDoctrine()->getRepository(Booking::class);

        $person = $this->getDoctrine()->getRepository(Person::class)->find($personId);

        $bookingCollection = $repository->findPersonBookings($person);

        $bookingCollection = $serializer->serialize($bookingCollection, 'json');

        $response = new Response($bookingCollection);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    /**
     * Lists all Booking for a particular housing.
     * @Route("/read/housing_id/{housingId}", name="read")
     *
     * @return Response
     */
    public function getHousingBookingsAction(SerializerInterface $serializer, $housingId){
        /**
         * @var \App\Repository\BookingRepository $repository
         */
        $repository = $this->getDoctrine()->getRepository(Booking::class);

        $housing = $this->getDoctrine()->getRepository(Housing::class)->find($housingId);

        $bookingCollection = $repository->findHousingBookings($housing);

        $bookingCollection = $serializer->serialize($bookingCollection, 'json');

        $response = new Response($bookingCollection);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Get on particular booking by Id
     * @Route("/read/id/{id}", name="read_single")
     *
     * @return Response
     */
    public function getBookingByIdAction(SerializerInterface $serializer, $id) {
        $repository = $this->getDoctrine()->getRepository(Booking::class);
        $booking = $repository->find($id);

        $booking = $serializer->serialize($booking, 'json');

        $response = new Response($booking);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Create a booking item
     * @Route("/create", name="create")
     *
     * @return Response
     */
    public function createBookingAction(Request $request, SerializerInterface $serializer) {
        $body = $request->getContent();

        try {
            /**
             * @var \App\Entity\Booking $booking
             */
            $booking = $serializer->deserialize($body, Booking::class, 'json' );
            $booking->setCreatedAt(new \DateTime());
            $booking->setUpdatedAt(new \DateTime());
            $booking->setIsConfirmed(false);

            if($booking->getBeginningDate() > $booking->getEndingDate()) {
                throw new \Exception('Ending date cannot be before beginning date !');
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->merge($booking);
            $entityManager->flush();

            return new Response('Booking created successfully');

        } catch (Exception $e) {
            return new Response('Booking couldn\'t be created' . $e);
        }
    }

    /**
     * Deleting an booking object by id
     * @Route("/delete/{id}", name="delete")
     *
     * @return Response
     */
    public function deleteBookingAction($id) {
        $repository = $this->getDoctrine()->getRepository(Booking::class);

        $booking = $repository->find($id);

        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($booking);
            $entityManager->flush();

            return new Response('Booking deleted successfully');

        } catch (Exception $e) {
            return new Response('Booking couldn\'t be deleted' . $e);
        }
    }
}