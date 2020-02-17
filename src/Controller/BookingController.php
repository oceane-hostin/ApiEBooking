<?php

namespace App\Controller;

use App\Entity\Booking;
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
}