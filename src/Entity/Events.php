<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventsRepository")
 */
class Events
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $SessionCode;

    /**
     * @ORM\Column(type="string")
     */
    private $SessionDate;

    /**
     * @ORM\Column(type="string")
     */
    private $StartDateTime;

    /**
     * @ORM\Column(type="string")
     */
    private $StartDate;

    /**
     * @ORM\Column(type="string")
     */
    private $StartTime;

    /**
     * @ORM\Column(type="string")
     */
    private $EndTime;


    /**
     * @ORM\Column(type="string")
     */
    private $TimeCode;


    /**
     * @ORM\Column(type="string")
     */
    private $Medal;


    /**
     * @ORM\Column(type="string")
     */
    private $Gender;


    /**
     * @ORM\Column(type="string")
     */
    private $DescriptionName;


    /**
     * @ORM\Column(type="string")
     */
    private $DescriptionNameDetail;


    /**
     * @ORM\Column(type="string")
     */
    private $DisciplineCode;


    /**
     * @ORM\Column(type="string")
     */
    private $DisciplineName;


    /**
     * @ORM\Column(type="string")
     */
    private $DisciplineSort;

    /**
     * @ORM\Column(type="string")
     */
    private $StadiumCode;


    /**
     * @ORM\Column(type="string")
     */
    private $StadiumName;


    /**
     * @ORM\Column(type="string")
     */
    private $ClusterCode;


    /**
     * @ORM\Column(type="string")
     */
    private $ClusterName;


    /**
     * @ORM\Column(type="string")
     */
    private $VenueName;


    /**
     * @ORM\Column(type="string")
     */
    private $SessionPrice;


    /**
     * @ORM\Column(type="string")
     */
    private $SessionPriceA;

    /**
     * @ORM\Column(type="integer")
     */
    private $SeatCount;


    /**
     * @ORM\Column(type="integer")
     */
    private $OrgSeatCount;

    /**
     * @ORM\Column(type="integer")
     */
    private $DisciplineDescription;


    /**
     * @ORM\Column(type="integer")
     */
    private $PictogramCode;


    /**
     * @ORM\Column(type="integer")
     */
    private $DisciplineInfoUrl;


    /**
     * @ORM\Column(type="integer")
     */
    private $PINID;

    /**
     * @ORM\Column(type="integer")
     */
    private $VenueCode;
    /**
     * @ORM\Column(type="integer")
     */
    private $VenueCodes;
    /**
     * @ORM\Column(type="integer")
     */
    private $OrderSeq;
    /**
     * @ORM\Column(type="integer")
     */
    private $GP_SeatCount;
    /**
     * @ORM\Column(type="integer")
     */
    private $GP_OrgSeatCount;

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
    public function getSessionCode()
    {
        return $this->SessionCode;
    }

    /**
     * @param mixed $SessionCode
     */
    public function setSessionCode($SessionCode)
    {
        $this->SessionCode = $SessionCode;
    }

    /**
     * @return mixed
     */
    public function getSessionDate()
    {
        return $this->SessionDate;
    }

    /**
     * @param mixed $SessionDate
     */
    public function setSessionDate($SessionDate)
    {
        $this->SessionDate = $SessionDate;
    }

    /**
     * @return mixed
     */
    public function getStartDateTime()
    {
        return $this->StartDateTime;
    }

    /**
     * @param mixed $StartDateTime
     */
    public function setStartDateTime($StartDateTime)
    {
        $this->StartDateTime = $StartDateTime;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->StartDate;
    }

    /**
     * @param mixed $StartDate
     */
    public function setStartDate($StartDate)
    {
        $this->StartDate = $StartDate;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->StartTime;
    }

    /**
     * @param mixed $StartTime
     */
    public function setStartTime($StartTime)
    {
        $this->StartTime = $StartTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->EndTime;
    }

    /**
     * @param mixed $EndTime
     */
    public function setEndTime($EndTime)
    {
        $this->EndTime = $EndTime;
    }

    /**
     * @return mixed
     */
    public function getTimeCode()
    {
        return $this->TimeCode;
    }

    /**
     * @param mixed $TimeCode
     */
    public function setTimeCode($TimeCode)
    {
        $this->TimeCode = $TimeCode;
    }

    /**
     * @return mixed
     */
    public function getMedal()
    {
        return $this->Medal;
    }

    /**
     * @param mixed $Medal
     */
    public function setMedal($Medal)
    {
        $this->Medal = $Medal;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * @param mixed $Gender
     */
    public function setGender($Gender)
    {
        $this->Gender = $Gender;
    }

    /**
     * @return mixed
     */
    public function getDescriptionName()
    {
        return $this->DescriptionName;
    }

    /**
     * @param mixed $DescriptionName
     */
    public function setDescriptionName($DescriptionName)
    {
        $this->DescriptionName = $DescriptionName;
    }

    /**
     * @return mixed
     */
    public function getDescriptionNameDetail()
    {
        return $this->DescriptionNameDetail;
    }

    /**
     * @param mixed $DescriptionNameDetail
     */
    public function setDescriptionNameDetail($DescriptionNameDetail)
    {
        $this->DescriptionNameDetail = $DescriptionNameDetail;
    }

    /**
     * @return mixed
     */
    public function getDisciplineCode()
    {
        return $this->DisciplineCode;
    }

    /**
     * @param mixed $DisciplineCode
     */
    public function setDisciplineCode($DisciplineCode)
    {
        $this->DisciplineCode = $DisciplineCode;
    }

    /**
     * @return mixed
     */
    public function getDisciplineName()
    {
        return $this->DisciplineName;
    }

    /**
     * @param mixed $DisciplineName
     */
    public function setDisciplineName($DisciplineName)
    {
        $this->DisciplineName = $DisciplineName;
    }

    /**
     * @return mixed
     */
    public function getDisciplineSort()
    {
        return $this->DisciplineSort;
    }

    /**
     * @param mixed $DisciplineSort
     */
    public function setDisciplineSort($DisciplineSort)
    {
        $this->DisciplineSort = $DisciplineSort;
    }

    /**
     * @return mixed
     */
    public function getStadiumCode()
    {
        return $this->StadiumCode;
    }

    /**
     * @param mixed $StadiumCode
     */
    public function setStadiumCode($StadiumCode)
    {
        $this->StadiumCode = $StadiumCode;
    }

    /**
     * @return mixed
     */
    public function getStadiumName()
    {
        return $this->StadiumName;
    }

    /**
     * @param mixed $StadiumName
     */
    public function setStadiumName($StadiumName)
    {
        $this->StadiumName = $StadiumName;
    }

    /**
     * @return mixed
     */
    public function getClusterCode()
    {
        return $this->ClusterCode;
    }

    /**
     * @param mixed $ClusterCode
     */
    public function setClusterCode($ClusterCode)
    {
        $this->ClusterCode = $ClusterCode;
    }

    /**
     * @return mixed
     */
    public function getClusterName()
    {
        return $this->ClusterName;
    }

    /**
     * @param mixed $ClusterName
     */
    public function setClusterName($ClusterName)
    {
        $this->ClusterName = $ClusterName;
    }

    /**
     * @return mixed
     */
    public function getVenueName()
    {
        return $this->VenueName;
    }

    /**
     * @param mixed $VenueName
     */
    public function setVenueName($VenueName)
    {
        $this->VenueName = $VenueName;
    }

    /**
     * @return mixed
     */
    public function getSessionPrice()
    {
        return $this->SessionPrice;
    }

    /**
     * @param mixed $SessionPrice
     */
    public function setSessionPrice($SessionPrice)
    {
        $this->SessionPrice = $SessionPrice;
    }

    /**
     * @return mixed
     */
    public function getSessionPriceA()
    {
        return $this->SessionPriceA;
    }

    /**
     * @param mixed $SessionPriceA
     */
    public function setSessionPriceA($SessionPriceA)
    {
        $this->SessionPriceA = $SessionPriceA;
    }

    /**
     * @return mixed
     */
    public function getSeatCount()
    {
        return $this->SeatCount;
    }

    /**
     * @param mixed $SeatCount
     */
    public function setSeatCount($SeatCount)
    {
        $this->SeatCount = $SeatCount;
    }

    /**
     * @return mixed
     */
    public function getOrgSeatCount()
    {
        return $this->OrgSeatCount;
    }

    /**
     * @param mixed $OrgSeatCount
     */
    public function setOrgSeatCount($OrgSeatCount)
    {
        $this->OrgSeatCount = $OrgSeatCount;
    }

    /**
     * @return mixed
     */
    public function getDisciplineDescription()
    {
        return $this->DisciplineDescription;
    }

    /**
     * @param mixed $DisciplineDescription
     */
    public function setDisciplineDescription($DisciplineDescription)
    {
        $this->DisciplineDescription = $DisciplineDescription;
    }

    /**
     * @return mixed
     */
    public function getPictogramCode()
    {
        return $this->PictogramCode;
    }

    /**
     * @param mixed $PictogramCode
     */
    public function setPictogramCode($PictogramCode)
    {
        $this->PictogramCode = $PictogramCode;
    }

    /**
     * @return mixed
     */
    public function getDisciplineInfoUrl()
    {
        return $this->DisciplineInfoUrl;
    }

    /**
     * @param mixed $DisciplineInfoUrl
     */
    public function setDisciplineInfoUrl($DisciplineInfoUrl)
    {
        $this->DisciplineInfoUrl = $DisciplineInfoUrl;
    }

    /**
     * @return mixed
     */
    public function getPINID()
    {
        return $this->PINID;
    }

    /**
     * @param mixed $PINID
     */
    public function setPINID($PINID)
    {
        $this->PINID = $PINID;
    }

    /**
     * @return mixed
     */
    public function getVenueCode()
    {
        return $this->VenueCode;
    }

    /**
     * @param mixed $VenueCode
     */
    public function setVenueCode($VenueCode)
    {
        $this->VenueCode = $VenueCode;
    }

    /**
     * @return mixed
     */
    public function getVenueCodes()
    {
        return $this->VenueCodes;
    }

    /**
     * @param mixed $VenueCodes
     */
    public function setVenueCodes($VenueCodes)
    {
        $this->VenueCodes = $VenueCodes;
    }

    /**
     * @return mixed
     */
    public function getOrderSeq()
    {
        return $this->OrderSeq;
    }

    /**
     * @param mixed $OrderSeq
     */
    public function setOrderSeq($OrderSeq)
    {
        $this->OrderSeq = $OrderSeq;
    }

    /**
     * @return mixed
     */
    public function getGPSeatCount()
    {
        return $this->GP_SeatCount;
    }

    /**
     * @param mixed $GP_SeatCount
     */
    public function setGPSeatCount($GP_SeatCount)
    {
        $this->GP_SeatCount = $GP_SeatCount;
    }

    /**
     * @return mixed
     */
    public function getGPOrgSeatCount()
    {
        return $this->GP_OrgSeatCount;
    }

    /**
     * @param mixed $GP_OrgSeatCount
     */
    public function setGPOrgSeatCount($GP_OrgSeatCount)
    {
        $this->GP_OrgSeatCount = $GP_OrgSeatCount;
    }



}
