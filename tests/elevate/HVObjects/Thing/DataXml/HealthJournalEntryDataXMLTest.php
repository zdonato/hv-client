<?php
    /**
     *
     */

    namespace elevate\test\HVObjects\Thing\DataXml;


    use elevate\HVObjects\Thing\DataXML\HealthJournalEntryDataXML;
    use elevate\HVObjects\Thing\DataXML\Type\HealthJournalEntryType;
    use elevate\test\HVObjects\BaseObjectTest;
    use elevate\HVObjects\Generic\Address;
    use elevate\HVObjects\Generic\CodableValue;
    use elevate\HVObjects\Generic\CodedValue;
    use elevate\HVObjects\Generic\Contact;
    use elevate\HVObjects\Generic\Date\ApproxDate;
    use elevate\HVObjects\Generic\Date\ApproxDateTime;
    use elevate\HVObjects\Generic\Date\StructuredApproxDate;
    use elevate\HVObjects\Generic\Date\Time;
    use elevate\HVObjects\Generic\Email;
    use elevate\HVObjects\Generic\Name;
    use elevate\HVObjects\Generic\Person;
    use elevate\HVObjects\Generic\Phone;
    use elevate\HVObjects\Generic\Common;

    class HealthJournalEntryDataXmlTest extends BaseObjectTest
    {
        public static function setUpBeforeClass()
        {
            self::$sampleXMLPath    = __DIR__ . '/../../SampleXML/Thing/DataXml/HealthJournalEntryDataXML.xml';
            self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\HealthJournalEntryDataXML';

            //When
            $whenTime = new Time(4, 0, 0, 0);
            $whenDate = new ApproxDate(2013, 10, 12);
            $whenTZ = new CodableValue('New York', array());
            $whenStructured = new StructuredApproxDate($whenDate, $whenTime, $whenTZ);
            $when = new ApproxDateTime($whenStructured, 'First Observed Date');

            //Category
            $categoryCode = new CodedValue("234", "category", array("category"), array("Version 5"));
            $category = new CodableValue("Hives", array($categoryCode));

            //Content
            $content = 'content';

            $healthJournalEntry = new HealthJournalEntryType($when, $category, $content);

            $common = new Common('Health Journal Entry Note', 'Unit Test', 'Some tags');

            self::$testObject = new HealthJournalEntryDataXML($healthJournalEntry, $common);

            parent::setUpBeforeClass();
            }
    }