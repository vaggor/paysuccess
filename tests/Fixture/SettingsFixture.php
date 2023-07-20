<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SettingsFixture
 */
class SettingsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'param' => 'public',
                'value' => 'pk_test_c68ae078c6022e3cfc24244dd82390386f7cb051',
                'merchant_id' => 1,
                'deleted' => 0,
            ],
            [
                'id' => 2,
                'param' => 'secret',
                'value' => 'sk_test_c4a6f9aad0aec5475841e38d680bae0990e31b5a',
                'merchant_id' => 1,
                'deleted' => 0,
            ],
        ];
        parent::init();
    }
}
