<?php
/**
 * User: ofields
 * Date: 11/8/13
 * Time: 11:26 AM
 */

namespace elevate\util;

use elevate\HVObjects\MethodObjects\Info;

/**
 * Class HVClientHelper
 * @package elevate\util
 *
 * Utility class to help parse, create objects for HealthVault calls
 */
class HVClientHelper {

    /**
     * @param Info $info
     * @return string
     */
    static function HVInfoAsXML(Info $info)
    {

        return "";
    }


    static function HVGroupsFromXML(string $xml)
    {
        $groups = aray();

        return $groups;
    }


}