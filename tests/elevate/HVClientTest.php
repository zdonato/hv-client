<?php

/**
 * @author troussos
 */

namespace elevate\test;

use elevate\HVClient;
use elevate\HVObjects\MethodObjects\Info;
use elevate\util\InfoHelper;
use elevate\util\HVClientHelper;

class HVClientTest extends BaseTest
{

    // /**
    //  * Test the HV Connect Method. It should return an Auth Code
    //  *
    //  * @covers elevate\HVClient::connect
    //  */
    // public function testConnect()
    // {
    //     $this->assertNotEmpty($this->hv->connect());
    // }

    // /**
    //  * Test the HV Disconnect Method. It should return an Auth Code
    //  *
    //  * @covers elevate\HVClient::disconnect
    //  */
    // public function testDisconnect()
    // {
    //     $this->hv->connect();
    //     $this->hv->disconnect();

    //     $config = $this->hv->getConfig();
    //     $this->assertNull($config['healthVault']);
    //     $this->assertNull($this->hv->getConnector());
    // }

    // /**
    //  * Test the HV isConnected Method. It should return true when connected and false when it is not.
    //  *
    //  * @covers elevate\HVClient::isConnected
    //  */
    // public function testIsConnected()
    // {
    //     $this->hv->connect();
    //     $this->assertTrue($this->hv->isConnected());

    //     $this->hv->disconnect();
    //     $this->assertFalse($this->hv->isConnected());
    // }

    // /**
    //  * Verify that the thumb print can be set and gotten
    //  *
    //  * @covers elevate\HVClient::getThumbPrint
    //  * @covers elevate\HVClient::setThumbPrint
    //  */
    // public function testThumbPrint()
    // {
    //     $this->hv->setThumbPrint('New Thumb Print');
    //     $this->assertEquals('New Thumb Print', $this->hv->getThumbPrint());
    // }

    // /**
    //  * Verify that the private key can be set and gotten
    //  *
    //  * @covers elevate\HVClient::getPrivateKey
    //  * @covers elevate\HVClient::setPrivateKey
    //  */
    // public function testPrivateKey()
    // {
    //     $this->hv->setPrivateKey('New Private Key');
    //     $this->assertEquals('New Private Key', $this->hv->getPrivateKey());
    // }

    // /**
    //  * Verify that the person id can be set and gotten
    //  *
    //  * @covers elevate\HVClient::getPersonId
    //  * @covers elevate\HVClient::setPersonId
    //  */
    // public function testPersonId()
    // {
    //     $this->hv->setPersonId('New Person');
    //     $this->assertEquals('New Person', $this->hv->getPersonId());
    // }

    // /**
    //  * Verify that the config can be set and gotten
    //  *
    //  * @covers elevate\HVClient::getConfig
    //  * @covers elevate\HVClient::setConfig
    //  */
    // public function testConfig()
    // {
    //     $this->hv->setConfig(array('New Config'));
    //     $this->assertEquals(array('New Config'), $this->hv->getConfig());
    // }

    // /**
    //  * Verify that the app returns the proper authcode
    //  *
    //  * @covers elevate\HVClient::getAppId
    //  * @covers elevate\HVClient::setAppId
    //  */
    // public function testAppId()
    // {
    //     $this->hv->setAppId('New App ID');
    //     $this->assertEquals('New App ID', $this->hv->getAppId());
    // }

    // /**
    //  * Verify that the app returns the proper authcode
    //  *
    //  * @covers elevate\HVClient::getOnlineMode
    //  */
    // public function testOnlineMode()
    // {
    //     $this->assertFalse($this->hv->getOnlineMode());
    //     $this->hv->setConfig(array('wctoken' => 'Random Token'));
    //     $this->assertTrue($this->hv->getOnlineMode());
    // }

    // /**
    //  * Verify that the auth URL is properly generated
    //  * Ommit the redirect token because it dynamically changes each time an AUTH URUL is created
    //  *
    //  * @covers elevate\HVClient::getAuthenticationURL
    //  */
    // public function testAuthenticationURL()
    // {
    //     $this->assertEquals(
    //         'https://account.healthvault-ppe.com/redirect.aspx?target=&targetqs=%3Fappid%3D05a059c9-c309-46af-9b86-b06d42510550%0A%26redirect%3Dhere%3',
    //         substr($this->hv->getAuthenticationURL('here'), 0, -49)
    //     );
    // }

    // /**
    //  * Verify a getter and setter
    //  *
    //  * @covers elevate\HVClient::setHealthVaultPlatform
    //  * @covers elevate\HVClient::getHealthVaultPlatform
    //  */
    // public function testHealthVaultPlatform()
    // {
    //     $this->hv->setHealthVaultPlatform('HV Platform');
    //     $this->assertEquals(
    //         'HV Platform',
    //         $this->hv->getHealthVaultPlatform()
    //     );
    // }

    // /**
    //  * Verify a getter and setter
    //  *
    //  * @covers elevate\HVClient::setHealthVaultAuthInstance
    //  * @covers elevate\HVClient::getHealthVaultAuthInstance
    //  */
    // public function testHVAuthIntance()
    // {
    //     $this->hv->setHealthVaultAuthInstance('Auth Instance');
    //     $this->assertEquals(
    //         'Auth Instance',
    //         $this->hv->getHealthVaultAuthInstance()
    //     );
    // }

    // public function testGetPersonInfo()
    // {
    //     $this->hv->connect();
    //     $person = $this->hv->getPersonInfo();

    //     print_r($person);
    // }




    public function testGetFile()
    {
        $reqGroup = InfoHelper::getHVRequestGroupForBase64ThingName('File', 2);
        $info = new Info(array($reqGroup));
        $this->hv->connect();
        $response = $this->hv->callHealthVault($info, 'GetThings', 2);
        $this->assertNotNull($response);

        $hvResponseGroups = HVClientHelper::HVGroupsFromXML($response);
        $this->assertNotNull($hvResponseGroups);
    }


        public function testGetThingsByName()
        {
            // $hvThingNames = array("Medication", "Question Answer", "Body Composition", "Personal Demographic Information", "Allergy");
            // $hvThingNames = array("Device", "Appointment", "Height Measurement", "Weight Measurement", "Sleep Session", "Sleep Related Activity", "Immunization");
            $hvThingNames = array("File");

            $this->hv->connect();
            foreach($hvThingNames as $thingName)
            {
                $response = $this->hv->getThingsByName($thingName, 1, $thingName);
                $this->assertNotNull($response);
            }
        }



        public function testGetGroups()
        {
            $group1 = InfoHelper::getHVRequestGroupForThingName("Medication", 2, "first");
            $group2 = InfoHelper::getHVRequestGroupForThingName("Question Answer", 2, "second");
            $info = new Info(array($group1,$group2));
            $this->hv->connect();
            $response = $this->hv->callHealthVault($info, 'GetThings', 3);
            $this->assertNotNull($response);
            $hvResponseGroups = HVClientHelper::HVGroupsFromXML($response);
            $this->assertNotNull($hvResponseGroups);
        }

        public function testGetThingsByTypeId()
        {
            $typeId = '52bf9104-2c5e-4f1f-a66d-552ebcc53df7';
            $this->hv->connect();
            $response = $this->hv->getThingsByTypeId($typeId, 2, "sumit");
            $this->assertNotNull($response);
        }


}
 