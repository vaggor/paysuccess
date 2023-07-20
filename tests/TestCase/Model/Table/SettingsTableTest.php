<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SettingsTable;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Model\Table\SettingsTable Test Case
 */
class SettingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SettingsTable
     */
    public $Settings;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Settings',
        'app.Merchants',
    ];


    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Settings = $this->getTableLocator()->get('Settings');
    }


    public function testGetPublicKay(): void
    {
       
        $result = $this->Settings->getPublicKay(1);
        //$this->assertResponseOk();
        //$this->assertResponseContains('pk_test_c68ae078c6022e3cfc24244dd82390386f7cb051');
    }

    

    /**
     * tearDown method
     *
     * @return void
     */
    /*protected function tearDown(): void
    {
        unset($this->Settings);

        parent::tearDown();
    }*/

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SettingsTable::validationDefault()
     */
    /*public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SettingsTable::buildRules()
     */
    /*public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
}
