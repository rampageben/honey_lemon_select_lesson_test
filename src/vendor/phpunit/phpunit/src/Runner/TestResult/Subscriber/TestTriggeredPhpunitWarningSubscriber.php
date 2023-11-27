<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\TestRunner\TestResult;

use PHPUnit\Event\Test\PhpunitWarningTriggered;
use PHPUnit\Event\Test\PhpunitWarningTriggeredSubscriber;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestTriggeredPhpunitWarningSubscriber extends Subscriber implements PhpunitWarningTriggeredSubscriber
{
    public function notify(PhpunitWarningTriggered $event): void
    {
        $this->collector()->testTriggeredPhpunitWarning($event);
    }
}
