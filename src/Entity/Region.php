<?php
/**
 * Region entity
 */

namespace Entity;

use Doctrine\Mapping as ORM;

/**
 * Region entity
 *
 * @Entity
 * @Table(name="region")
 */
class Region
{
    /**
     * region id
     *
     * @var int
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * region name
     *
     * @var string
     *
     * @Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * region slug to build urls
     *
     * @var string
     *
     * @Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * region linked to this city
     *
     * @OneToMany(targetEntity="Entity\City", mappedBy="region")
     */
    private $cities;

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
     * @return Region
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
     * @return Region
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
}

