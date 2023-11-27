<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\CodeCoverage\Node;

use Countable;
use SebastianBergmann\CodeCoverage\Util\Percentage;
use function array_merge;
use function str_ends_with;
use function str_replace;
use function substr;
use const DIRECTORY_SEPARATOR;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 *
 * @psalm-import-type LinesOfCodeType from \SebastianBergmann\CodeCoverage\StaticAnalysis\FileAnalyser
 * @psalm-import-type ProcessedFunctionType from \SebastianBergmann\CodeCoverage\Node\File
 * @psalm-import-type ProcessedClassType from \SebastianBergmann\CodeCoverage\Node\File
 * @psalm-import-type ProcessedTraitType from \SebastianBergmann\CodeCoverage\Node\File
 */
abstract class AbstractNode implements Countable
{
    private readonly string $name;
    private string $pathAsString;
    private array $pathAsArray;
    private readonly ?AbstractNode $parent;
    private string $id;

    public function __construct(string $name, self $parent = null)
    {
        if (str_ends_with($name, DIRECTORY_SEPARATOR)) {
            $name = substr($name, 0, -1);
        }

        $this->name = $name;
        $this->parent = $parent;

        $this->processId();
        $this->processPath();
    }

    private function processId(): void
    {
        if ($this->parent === null) {
            $this->id = 'index';

            return;
        }

        $parentId = $this->parent->id();

        if ($parentId === 'index') {
            $this->id = str_replace(':', '_', $this->name);
        } else {
            $this->id = $parentId . '/' . $this->name;
        }
    }

    public function id(): string
    {
        return $this->id;
    }

    private function processPath(): void
    {
        if ($this->parent === null) {
            $this->pathAsArray = [$this];
            $this->pathAsString = $this->name;

            return;
        }

        $this->pathAsArray = $this->parent->pathAsArray();
        $this->pathAsString = $this->parent->pathAsString() . DIRECTORY_SEPARATOR . $this->name;

        $this->pathAsArray[] = $this;
    }

    public function pathAsArray(): array
    {
        return $this->pathAsArray;
    }

    public function pathAsString(): string
    {
        return $this->pathAsString;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function parent(): ?self
    {
        return $this->parent;
    }

    public function percentageOfTestedClasses(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedClasses(),
            $this->numberOfClasses(),
        );
    }

    abstract public function numberOfTestedClasses(): int;

    abstract public function numberOfClasses(): int;

    public function percentageOfTestedTraits(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedTraits(),
            $this->numberOfTraits(),
        );
    }

    abstract public function numberOfTestedTraits(): int;

    abstract public function numberOfTraits(): int;

    public function percentageOfTestedClassesAndTraits(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedClassesAndTraits(),
            $this->numberOfClassesAndTraits(),
        );
    }

    public function numberOfTestedClassesAndTraits(): int
    {
        return $this->numberOfTestedClasses() + $this->numberOfTestedTraits();
    }

    public function numberOfClassesAndTraits(): int
    {
        return $this->numberOfClasses() + $this->numberOfTraits();
    }

    public function percentageOfTestedFunctions(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedFunctions(),
            $this->numberOfFunctions(),
        );
    }

    abstract public function numberOfTestedFunctions(): int;

    abstract public function numberOfFunctions(): int;

    public function percentageOfTestedMethods(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedMethods(),
            $this->numberOfMethods(),
        );
    }

    abstract public function numberOfTestedMethods(): int;

    abstract public function numberOfMethods(): int;

    public function percentageOfTestedFunctionsAndMethods(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfTestedFunctionsAndMethods(),
            $this->numberOfFunctionsAndMethods(),
        );
    }

    public function numberOfTestedFunctionsAndMethods(): int
    {
        return $this->numberOfTestedFunctions() + $this->numberOfTestedMethods();
    }

    public function numberOfFunctionsAndMethods(): int
    {
        return $this->numberOfFunctions() + $this->numberOfMethods();
    }

    public function percentageOfExecutedLines(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfExecutedLines(),
            $this->numberOfExecutableLines(),
        );
    }

    abstract public function numberOfExecutedLines(): int;

    abstract public function numberOfExecutableLines(): int;

    public function percentageOfExecutedBranches(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfExecutedBranches(),
            $this->numberOfExecutableBranches()
        );
    }

    abstract public function numberOfExecutedBranches(): int;

    abstract public function numberOfExecutableBranches(): int;

    public function percentageOfExecutedPaths(): Percentage
    {
        return Percentage::fromFractionAndTotal(
            $this->numberOfExecutedPaths(),
            $this->numberOfExecutablePaths()
        );
    }

    abstract public function numberOfExecutedPaths(): int;

    abstract public function numberOfExecutablePaths(): int;

    public function classesAndTraits(): array
    {
        return array_merge($this->classes(), $this->traits());
    }

    /**
     * @psalm-return array<string, ProcessedClassType>
     */
    abstract public function classes(): array;

    /**
     * @psalm-return array<string, ProcessedTraitType>
     */
    abstract public function traits(): array;

    /**
     * @psalm-return array<string, ProcessedFunctionType>
     */
    abstract public function functions(): array;

    /**
     * @psalm-return LinesOfCodeType
     */
    abstract public function linesOfCode(): array;
}
