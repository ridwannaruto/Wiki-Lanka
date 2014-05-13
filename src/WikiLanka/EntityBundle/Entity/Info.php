<?php

namespace WikiLanka\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 */
class Info
{
    /**
     * @var string
     */
    private $mobile;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Info
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
