<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 10:45 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\SleepSessionDataXML;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Awakening;
use elevate\HVObjects\Thing\DataXML\Type\SleepSessionType;
use elevate\HVObjects\Generic\Common;

class SleepSessionDataXMLTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../../SampleXML/Thing/DataXml/SleepSessionDataXML.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\SleepSessionDataXML';

        // When
        $whenDate = new Date('2013', '11', '4');
        $whenTime = new Time(1, 0, 0, 0);
        $when = new DateTime($whenDate, $whenTime);

        $bedTime = new Time(1, 0, 0, 0);

        $wakeTime = new Time(8, 0, 0, 0);

        $sleepMinutes = 7 * 60;

        $settlingMinutes = 14;

        // Awakening
        $awakeningDate = new Date('2013', '11', '4');
        $awakeningTime = new Time(8, 0, 0, 0);
        $awakeningWhen = new DateTime($awakeningDate, $awakeningTime);
        $awakening = new Awakening($awakeningWhen, 14);

        // Medication
        $medicationCoded = new CodedValue("Hypospary", "Meds", array("Medicine"), array("Version 5"));
        $medication = new CodableValue("Hypospary", array($medicationCoded));

        $wakeState = 2;

        $sleepSessionType = new SleepSessionType(
            $when, $bedTime, $wakeTime, $sleepMinutes, $settlingMinutes, $awakening, $medication, $wakeState
        );

        $common = new Common('Sleep Session Note', 'Unit Test', 'Some tags');

        self::$testObject = new SleepSessionDataXML($sleepSessionType, $common);

        parent::setUpBeforeClass();
    }
}