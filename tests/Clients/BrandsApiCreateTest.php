<?php declare(strict_types = 1);

namespace SandwaveIo\RealtimeRegister\Tests\Clients;

use DateTime;
use PHPUnit\Framework\TestCase;
use SandwaveIo\RealtimeRegister\Domain\Enum\LocaleEnum;
use SandwaveIo\RealtimeRegister\Tests\Helpers\MockedClientFactory;

class BrandsApiCreateTest extends TestCase
{
    public function test_create(): void
    {
        $customerHandle = 'customertestname';
        $brandHandle = 'brandtestname';

        $sdk = MockedClientFactory::makeSdk(
            200,
            '',
            MockedClientFactory::assertRoute('POST', "v2/customers/{$customerHandle}/brands/{$brandHandle}", $this)
        );

        $sdk->brands->create(
            $customerHandle,
            $brandHandle,
            LocaleEnum::LOCALE_EN_US,
            'organizationtestname',
            ['addresslinetest_1', 'addresslinetest_2'],
            'postcodetest',
            'citytest',
            'statetest',
            'countrytest',
            'email@test.com',
            'http://www.test.com',
            'voicetest',
            'faxtest',
            'privacycontacttest',
            'abusecontacttest',
            new DateTime('2020-08-30 01:02:03'),
            new DateTime('2020-09-05 11:02:03')
        );
    }
}
