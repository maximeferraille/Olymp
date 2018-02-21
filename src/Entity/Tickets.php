<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketsRepository")
 */
class Tickets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();

    }


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tickets")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Events", inversedBy="tickets")
     */
    private $events;


    /**
     * @ORM\Column(type="float")
     */
    private $start_price;


    /**
     * @ORM\Column(type="string")
     */
    private $status;


    /**
     * @ORM\Column(type="integer")
     */
    private $seat_number;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param mixed $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @return mixed
     */
    public function getStartPrice()
    {
        return $this->start_price;
    }

    /**
     * @param mixed $start_price
     */
    public function setStartPrice($start_price)
    {
        $this->start_price = $start_price;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSeatNumber()
    {
        return $this->seat_number;
    }

    /**
     * @param mixed $seat_number
     */
    public function setSeatNumber($seat_number)
    {
        $this->seat_number = $seat_number;
    }




}
