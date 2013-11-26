<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;


class TypeId 
{
    /**
     * @XmlAttribute
     * @Type("string")
     */
    protected $name;

    /**
     * @XmlValue
     * @Type("string")
     */
    protected $typeId;

    public function __construct($name, $typeId)
    {
        $this->name = $name;
        $this->typeId = $typeId;
        return $this;
    }


} 