<?php

namespace WikiLanka\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memory
 */
class Memory
{
    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $token;

    /**
     * @var \DateTime
     */
    private $time;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Memory
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
     * Set token
     *
     * @param string $token
     * @return Memory
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
     * Set time
     *
     * @param \DateTime $time
     * @return Memory
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
