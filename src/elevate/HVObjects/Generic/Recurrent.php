<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Generic;


use elevate\HVObjects\Generic\Date\ApproxDateTime;

/**
 * @XmlRoot("recurrent")
 */
class Recurrent extends CustomExtension
{
    /**
     * @Type("string")
     * @SerializedName("repeat")
     */
    protected $repeat;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("end-date")
     */
    protected $endDate;

    /**
     * @Type("string")
     * @SerializedName("type")
     */
    protected $type;

    function __construct($endDate = NULL, $repeat = NULL, $type = NULL)
    {
        $this->endDate = $endDate;
        $this->repeat = $repeat;
        $this->type = $type;
    }


    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $repeat
     */
    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;
    }

    /**
     * @return mixed
     */
    public function getRepeat()
    {
        return $this->repeat;
    }

}