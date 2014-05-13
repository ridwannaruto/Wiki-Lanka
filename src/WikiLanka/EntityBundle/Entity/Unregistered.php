<?php

namespace WikiLanka\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unregistered
 */
class Unregistered
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $time;

    /**
     * @var string
     */
    private $temporycode;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set email
     *
     * @param string $email
     * @return Unregistered
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Unregistered
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set temporycode
     *
     * @param string $temporycode
     * @return Unregistered
     */
    public function setTemporycode($temporycode)
    {
        $this->temporycode = $temporycode;

        return $this;
    }

    /**
     * Get temporycode
     *
     * @return string 
     */
    public function getTemporycode()
    {
        return $this->temporycode;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
