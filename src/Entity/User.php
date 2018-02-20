<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{

    public function __construct()
    {


        $this->ins_date = new \DateTime();

        $this->tickets = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $token_auth;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pincode;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $ip_adress;


    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $ins_date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tickets", mappedBy="user")
     */
    private $tickets;

    /**
     * @return mixed
     * @return Collection|Tickets[]
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param mixed $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
    }


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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getTokenAuth()
    {
        return $this->token_auth;
    }

    /**
     * @param mixed $token_auth
     */
    public function setTokenAuth($token_auth)
    {
        $this->token_auth = $token_auth;
    }

    /**
     * @return mixed
     */
    public function getPincode()
    {
        return $this->pincode;
    }

    /**
     * @param mixed $pincode
     */
    public function setPincode($pincode)
    {
        $this->pincode = $pincode;
    }

    /**
     * @return mixed
     */
    public function getIpAdress()
    {
        return $this->ip_adress;
    }

    /**
     * @param mixed $ip_adress
     */
    public function setIpAdress($ip_adress)
    {
        $this->ip_adress = $ip_adress;
    }

    /**
     * @return mixed
     */
    public function getInsDate()
    {
        return $this->ins_date;
    }

    /**
     * @param mixed $ins_date
     */
    public function setInsDate($ins_date)
    {
        $this->ins_date = $ins_date;
    }





}
