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

use PHPUnit\Event\Test\BeforeFirstTestMethodErrored;
use PHPUnit\Event\Test\ConsideredRisky;
use PHPUnit\Event\Test\Errored;
use PHPUnit\Event\Test\Failed;
use PHPUnit\Event\Test\MarkedIncomplete;
use PHPUnit\Event\Test\PhpunitDeprecationTriggered;
use PHPUnit\Event\Test\PhpunitErrorTriggered;
use PHPUnit\Event\Test\PhpunitWarningTriggered;
use PHPUnit\Event\Test\Skipped as TestSkipped;
use PHPUnit\Event\TestRunner\DeprecationTriggered as TestRunnerDeprecationTriggered;
use PHPUnit\Event\TestRunner\WarningTriggered as TestRunnerWarningTriggered;
use PHPUnit\Event\TestSuite\Skipped as TestSuiteSkipped;
use PHPUnit\TestRunner\TestResult\Issues\Issue;
use function count;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestResult
{
    private readonly int $numberOfTests;
    private readonly int $numberOfTestsRun;
    private readonly int $numberOfAssertions;

    /**
     * @psalm-var list<BeforeFirstTestMethodErrored|Errored>
     */
    private readonly array $testErroredEvents;

    /**
     * @psalm-var list<Failed>
     */
    private readonly array $testFailedEvents;

    /**
     * @psalm-var list<MarkedIncomplete>
     */
    private readonly array $testMarkedIncompleteEvents;

    /**
     * @psalm-var list<TestSuiteSkipped>
     */
    private readonly array $testSuiteSkippedEvents;

    /**
     * @psalm-var list<TestSkipped>
     */
    private readonly array $testSkippedEvents;

    /**
     * @psalm-var array<string,list<ConsideredRisky>>
     */
    private readonly array $testConsideredRiskyEvents;

    /**
     * @psalm-var array<string,list<PhpunitDeprecationTriggered>>
     */
    private readonly array $testTriggeredPhpunitDeprecationEvents;

    /**
     * @psalm-var array<string,list<PhpunitErrorTriggered>>
     */
    private readonly array $testTriggeredPhpunitErrorEvents;

    /**
     * @psalm-var array<string,list<PhpunitWarningTriggered>>
     */
    private readonly array $testTriggeredPhpunitWarningEvents;

    /**
     * @psalm-var list<TestRunnerDeprecationTriggered>
     */
    private readonly array $testRunnerTriggeredDeprecationEvents;

    /**
     * @psalm-var list<TestRunnerWarningTriggered>
     */
    private readonly array $testRunnerTriggeredWarningEvents;

    /**
     * @psalm-var list<Issue>
     */
    private readonly array $errors;

    /**
     * @psalm-var list<Issue>
     */
    private readonly array $deprecations;

    /**
     * @psalm-var list<Issue>
     */
    private readonly array $notices;

    /**
     * @psalm-var list<Issue>
     */
    private readonly array $warnings;

    /**
     * @psalm-var list<Issue>
     */
    private readonly array $phpDeprecations;

    /**
     * @psalm-var list<Issue>
     */
    private readonly array $phpNotices;

    /**
     * @psalm-var list<Issue>
     */
    private readonly array $phpWarnings;

    /**
     * @psalm-var non-negative-int
     */
    private readonly int $numberOfIssuesIgnoredByBaseline;

    /**
     * @psalm-param list<BeforeFirstTestMethodErrored|Errored> $testErroredEvents
     * @psalm-param list<Failed> $testFailedEvents
     * @psalm-param array<string,list<ConsideredRisky>> $testConsideredRiskyEvents
     * @psalm-param list<TestSuiteSkipped> $testSuiteSkippedEvents
     * @psalm-param list<TestSkipped> $testSkippedEvents
     * @psalm-param list<MarkedIncomplete> $testMarkedIncompleteEvents
     * @psalm-param array<string,list<PhpunitDeprecationTriggered>> $testTriggeredPhpunitDeprecationEvents
     * @psalm-param array<string,list<PhpunitErrorTriggered>> $testTriggeredPhpunitErrorEvents
     * @psalm-param array<string,list<PhpunitWarningTriggered>> $testTriggeredPhpunitWarningEvents
     * @psalm-param list<TestRunnerDeprecationTriggered> $testRunnerTriggeredDeprecationEvents
     * @psalm-param list<TestRunnerWarningTriggered> $testRunnerTriggeredWarningEvents
     * @psalm-param list<Issue> $errors
     * @psalm-param list<Issue> $deprecations
     * @psalm-param list<Issue> $notices
     * @psalm-param list<Issue> $warnings
     * @psalm-param list<Issue> $phpDeprecations
     * @psalm-param list<Issue> $phpNotices
     * @psalm-param list<Issue> $phpWarnings
     * @psalm-param non-negative-int $numberOfIssuesIgnoredByBaseline
     */
    public function __construct(int $numberOfTests, int $numberOfTestsRun, int $numberOfAssertions, array $testErroredEvents, array $testFailedEvents, array $testConsideredRiskyEvents, array $testSuiteSkippedEvents, array $testSkippedEvents, array $testMarkedIncompleteEvents, array $testTriggeredPhpunitDeprecationEvents, array $testTriggeredPhpunitErrorEvents, array $testTriggeredPhpunitWarningEvents, array $testRunnerTriggeredDeprecationEvents, array $testRunnerTriggeredWarningEvents, array $errors, array $deprecations, array $notices, array $warnings, array $phpDeprecations, array $phpNotices, array $phpWarnings, int $numberOfIssuesIgnoredByBaseline)
    {
        $this->numberOfTests = $numberOfTests;
        $this->numberOfTestsRun = $numberOfTestsRun;
        $this->numberOfAssertions = $numberOfAssertions;
        $this->testErroredEvents = $testErroredEvents;
        $this->testFailedEvents = $testFailedEvents;
        $this->testConsideredRiskyEvents = $testConsideredRiskyEvents;
        $this->testSuiteSkippedEvents = $testSuiteSkippedEvents;
        $this->testSkippedEvents = $testSkippedEvents;
        $this->testMarkedIncompleteEvents = $testMarkedIncompleteEvents;
        $this->testTriggeredPhpunitDeprecationEvents = $testTriggeredPhpunitDeprecationEvents;
        $this->testTriggeredPhpunitErrorEvents = $testTriggeredPhpunitErrorEvents;
        $this->testTriggeredPhpunitWarningEvents = $testTriggeredPhpunitWarningEvents;
        $this->testRunnerTriggeredDeprecationEvents = $testRunnerTriggeredDeprecationEvents;
        $this->testRunnerTriggeredWarningEvents = $testRunnerTriggeredWarningEvents;
        $this->errors = $errors;
        $this->deprecations = $deprecations;
        $this->notices = $notices;
        $this->warnings = $warnings;
        $this->phpDeprecations = $phpDeprecations;
        $this->phpNotices = $phpNotices;
        $this->phpWarnings = $phpWarnings;
        $this->numberOfIssuesIgnoredByBaseline = $numberOfIssuesIgnoredByBaseline;
    }

    public function numberOfTestsRun(): int
    {
        return $this->numberOfTestsRun;
    }

    public function numberOfAssertions(): int
    {
        return $this->numberOfAssertions;
    }

    /**
     * @psalm-return list<BeforeFirstTestMethodErrored|Errored>
     */
    public function testErroredEvents(): array
    {
        return $this->testErroredEvents;
    }

    /**
     * @psalm-return list<Failed>
     */
    public function testFailedEvents(): array
    {
        return $this->testFailedEvents;
    }

    /**
     * @psalm-return array<string,list<ConsideredRisky>>
     */
    public function testConsideredRiskyEvents(): array
    {
        return $this->testConsideredRiskyEvents;
    }

    public function hasTestConsideredRiskyEvents(): bool
    {
        return $this->numberOfTestsWithTestConsideredRiskyEvents() > 0;
    }

    public function numberOfTestsWithTestConsideredRiskyEvents(): int
    {
        return count($this->testConsideredRiskyEvents);
    }

    /**
     * @psalm-return list<TestSuiteSkipped>
     */
    public function testSuiteSkippedEvents(): array
    {
        return $this->testSuiteSkippedEvents;
    }

    public function hasTestSuiteSkippedEvents(): bool
    {
        return $this->numberOfTestSuiteSkippedEvents() > 0;
    }

    public function numberOfTestSuiteSkippedEvents(): int
    {
        return count($this->testSuiteSkippedEvents);
    }

    /**
     * @psalm-return list<TestSkipped>
     */
    public function testSkippedEvents(): array
    {
        return $this->testSkippedEvents;
    }

    public function hasTestSkippedEvents(): bool
    {
        return $this->numberOfTestSkippedEvents() > 0;
    }

    public function numberOfTestSkippedEvents(): int
    {
        return count($this->testSkippedEvents);
    }

    /**
     * @psalm-return list<MarkedIncomplete>
     */
    public function testMarkedIncompleteEvents(): array
    {
        return $this->testMarkedIncompleteEvents;
    }

    public function hasTestMarkedIncompleteEvents(): bool
    {
        return $this->numberOfTestMarkedIncompleteEvents() > 0;
    }

    public function numberOfTestMarkedIncompleteEvents(): int
    {
        return count($this->testMarkedIncompleteEvents);
    }

    /**
     * @psalm-return array<string,list<PhpunitDeprecationTriggered>>
     */
    public function testTriggeredPhpunitDeprecationEvents(): array
    {
        return $this->testTriggeredPhpunitDeprecationEvents;
    }

    public function hasTestTriggeredPhpunitDeprecationEvents(): bool
    {
        return $this->numberOfTestsWithTestTriggeredPhpunitDeprecationEvents() > 0;
    }

    public function numberOfTestsWithTestTriggeredPhpunitDeprecationEvents(): int
    {
        return count($this->testTriggeredPhpunitDeprecationEvents);
    }

    /**
     * @psalm-return array<string,list<PhpunitErrorTriggered>>
     */
    public function testTriggeredPhpunitErrorEvents(): array
    {
        return $this->testTriggeredPhpunitErrorEvents;
    }

    /**
     * @psalm-return array<string,list<PhpunitWarningTriggered>>
     */
    public function testTriggeredPhpunitWarningEvents(): array
    {
        return $this->testTriggeredPhpunitWarningEvents;
    }

    /**
     * @psalm-return list<TestRunnerDeprecationTriggered>
     */
    public function testRunnerTriggeredDeprecationEvents(): array
    {
        return $this->testRunnerTriggeredDeprecationEvents;
    }

    public function hasTestRunnerTriggeredDeprecationEvents(): bool
    {
        return $this->numberOfTestRunnerTriggeredDeprecationEvents() > 0;
    }

    public function numberOfTestRunnerTriggeredDeprecationEvents(): int
    {
        return count($this->testRunnerTriggeredDeprecationEvents);
    }

    /**
     * @psalm-return list<TestRunnerWarningTriggered>
     */
    public function testRunnerTriggeredWarningEvents(): array
    {
        return $this->testRunnerTriggeredWarningEvents;
    }

    public function wasSuccessfulAndNoTestHasIssues(): bool
    {
        return $this->wasSuccessful() && !$this->hasTestsWithIssues();
    }

    public function wasSuccessful(): bool
    {
        return $this->wasSuccessfulIgnoringPhpunitWarnings() &&
            !$this->hasTestTriggeredPhpunitErrorEvents() &&
            !$this->hasTestRunnerTriggeredWarningEvents() &&
            !$this->hasTestTriggeredPhpunitWarningEvents();
    }

    public function wasSuccessfulIgnoringPhpunitWarnings(): bool
    {
        return !$this->hasTestErroredEvents() &&
            !$this->hasTestFailedEvents();
    }

    public function hasTestErroredEvents(): bool
    {
        return $this->numberOfTestErroredEvents() > 0;
    }

    public function numberOfTestErroredEvents(): int
    {
        return count($this->testErroredEvents);
    }

    public function hasTestFailedEvents(): bool
    {
        return $this->numberOfTestFailedEvents() > 0;
    }

    public function numberOfTestFailedEvents(): int
    {
        return count($this->testFailedEvents);
    }

    public function hasTestTriggeredPhpunitErrorEvents(): bool
    {
        return $this->numberOfTestsWithTestTriggeredPhpunitErrorEvents() > 0;
    }

    public function numberOfTestsWithTestTriggeredPhpunitErrorEvents(): int
    {
        return count($this->testTriggeredPhpunitErrorEvents);
    }

    public function hasTestRunnerTriggeredWarningEvents(): bool
    {
        return $this->numberOfTestRunnerTriggeredWarningEvents() > 0;
    }

    public function numberOfTestRunnerTriggeredWarningEvents(): int
    {
        return count($this->testRunnerTriggeredWarningEvents);
    }

    public function hasTestTriggeredPhpunitWarningEvents(): bool
    {
        return $this->numberOfTestsWithTestTriggeredPhpunitWarningEvents() > 0;
    }

    public function numberOfTestsWithTestTriggeredPhpunitWarningEvents(): int
    {
        return count($this->testTriggeredPhpunitWarningEvents);
    }

    public function hasTestsWithIssues(): bool
    {
        return $this->hasRiskyTests() ||
            $this->hasIncompleteTests() ||
            $this->hasDeprecations() ||
            !empty($this->errors) ||
            $this->hasNotices() ||
            $this->hasWarnings();
    }

    public function hasRiskyTests(): bool
    {
        return !empty($this->testConsideredRiskyEvents);
    }

    public function hasIncompleteTests(): bool
    {
        return !empty($this->testMarkedIncompleteEvents);
    }

    public function hasDeprecations(): bool
    {
        return $this->numberOfDeprecations() > 0;
    }

    public function numberOfDeprecations(): int
    {
        return count($this->deprecations) +
            count($this->phpDeprecations) +
            count($this->testTriggeredPhpunitDeprecationEvents) +
            count($this->testRunnerTriggeredDeprecationEvents);
    }

    public function hasNotices(): bool
    {
        return $this->numberOfNotices() > 0;
    }

    public function numberOfNotices(): int
    {
        return count($this->notices) +
            count($this->phpNotices);
    }

    public function hasWarnings(): bool
    {
        return $this->numberOfWarnings() > 0;
    }

    public function numberOfWarnings(): int
    {
        return count($this->warnings) +
            count($this->phpWarnings) +
            count($this->testTriggeredPhpunitWarningEvents) +
            count($this->testRunnerTriggeredWarningEvents);
    }

    /**
     * @psalm-return list<Issue>
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * @psalm-return list<Issue>
     */
    public function deprecations(): array
    {
        return $this->deprecations;
    }

    /**
     * @psalm-return list<Issue>
     */
    public function notices(): array
    {
        return $this->notices;
    }

    /**
     * @psalm-return list<Issue>
     */
    public function warnings(): array
    {
        return $this->warnings;
    }

    /**
     * @psalm-return list<Issue>
     */
    public function phpDeprecations(): array
    {
        return $this->phpDeprecations;
    }

    /**
     * @psalm-return list<Issue>
     */
    public function phpNotices(): array
    {
        return $this->phpNotices;
    }

    /**
     * @psalm-return list<Issue>
     */
    public function phpWarnings(): array
    {
        return $this->phpWarnings;
    }

    public function hasTests(): bool
    {
        return $this->numberOfTests > 0;
    }

    public function hasErrors(): bool
    {
        return $this->numberOfErrors() > 0;
    }

    public function numberOfErrors(): int
    {
        return $this->numberOfTestErroredEvents() +
            count($this->errors) +
            $this->numberOfTestsWithTestTriggeredPhpunitErrorEvents();
    }

    public function hasSkippedTests(): bool
    {
        return !empty($this->testSkippedEvents);
    }

    public function hasIssuesIgnoredByBaseline(): bool
    {
        return $this->numberOfIssuesIgnoredByBaseline > 0;
    }

    /**
     * @psalm-return non-negative-int
     */
    public function numberOfIssuesIgnoredByBaseline(): int
    {
        return $this->numberOfIssuesIgnoredByBaseline;
    }
}
