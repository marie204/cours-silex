<?php
/**
 * City entity
 */

namespace Entity;

use Doctrine\Mapping as ORM;

/**
 * City entity
 *
 * list of cities
 *
 * @Entity
 * @Table(name="city")
 */
class City
{
    /**
     * id
     *
     * @var int
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * city name
     *
     * @var string
     * @Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * city slug, used to build urls
     *
     * @var string
     * @Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * city zipCode
     *
     * @var string
     * @Column(name="zipCode", type="string", length=255)
     */
    private $zipCode;

    /**
     * region linked to this city
     *
     * @ManyToOne(targetEntity="Entity\Region", inversedBy="cities")
     */
    private $region;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return City
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return City
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Get region
     * @return \Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set region
     *
     * @param \Entity\Region $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

}

