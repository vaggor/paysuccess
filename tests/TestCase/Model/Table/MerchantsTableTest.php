<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchantsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchantsTable Test Case
 */
class MerchantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchantsTable
     */
    protected $Merchants;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Merchants',
        'app.Settings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Merchants') ? [] : ['className' => MerchantsTable::class];
        $this->Merchants = $this->getTableLocator()->get('Merchants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Merchants);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MerchantsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MerchantsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
