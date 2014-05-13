<?php

namespace WikiLanka\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mobile
 */
class Mobile
{
    /**
     * @var integer
     */
    private $user;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var \DateTime
     */
    private $time;

    /**
     * @var integer
     */
    private $pin;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set user
     *
     * @param integer $user
     * @return Mobile
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Mobile
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Mobile
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
     * Set pin
     *
     * @param integer $pin
     * @return Mobile
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return integer 
     */
    public function getPin()
    {
        return $this->pin;
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
