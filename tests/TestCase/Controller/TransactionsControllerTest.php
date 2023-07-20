<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\TransactionsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TransactionsController Test Case
 *
 * @uses \App\Controller\TransactionsController
 */
class TransactionsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    /*protected $fixtures = [
        'app.Transactions',
    ];*/

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\TransactionsController::index()
     */
    public function testIndex(): void
    {
        //$this->markTestIncomplete('Not implemented yet.');
        $result = $this->get('/transactions/index');
        $this->assertResponseOk();
        $this->assertResponseContains('good');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\TransactionsController::view()
     */
    /*public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    
}
