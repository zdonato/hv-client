<?php


namespace elevate\test\HVObjects;

abstract class BaseObjectTest extends \PHPUnit_Framework_TestCase
{
    protected $serializer;

    protected $sampleXMLPath;

    protected $xmlString;

    protected function setUp()
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }

    public function testSerialize()
    {
        $this->assertXmlStringEqualsXmlFile(
            $this->sampleXMLPath,
            $this->xmlString
        );
    }
}