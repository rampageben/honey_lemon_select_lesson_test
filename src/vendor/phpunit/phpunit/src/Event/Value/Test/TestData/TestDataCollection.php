<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Event\TestData;

use Countable;
use IteratorAggregate;
use function count;

/**
 * @template-implements IteratorAggregate<int, TestData>
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class TestDataCollection implements Countable, IteratorAggregate
{
    /**
     * @psalm-var list<TestData>
     */
    private readonly array $data;
    private ?DataFromDataProvider $fromDataProvider = null;

    /**
     * @throws MoreThanOneDataSetFromDataProviderException
     */
    private function __construct(TestData ...$data)
    {
        $this->ensureNoMoreThanOneDataFromDataProvider($data);

        $this->data = $data;
    }

    /**
     * @psalm-param list<TestData> $data
     *
     * @throws MoreThanOneDataSetFromDataProviderException
     */
    private function ensureNoMoreThanOneDataFromDataProvider(array $data): void
    {
        foreach ($data as $_data) {
            if ($_data->isFromDataProvider()) {
                if ($this->fromDataProvider !== null) {
                    throw new MoreThanOneDataSetFromDataProviderException;
                }

                $this->fromDataProvider = $_data;
            }
        }
    }

    /**
     * @psalm-param list<TestData> $data
     *
     * @throws MoreThanOneDataSetFromDataProviderException
     */
    public static function fromArray(array $data): self
    {
        return new self(...$data);
    }

    /**
     * @psalm-return list<TestData>
     */
    public function asArray(): array
    {
        return $this->data;
    }

    public function count(): int
    {
        return count($this->data);
    }

    /**
     * @throws NoDataSetFromDataProviderException
     */
    public function dataFromDataProvider(): DataFromDataProvider
    {
        if (!$this->hasDataFromDataProvider()) {
            throw new NoDataSetFromDataProviderException;
        }

        return $this->fromDataProvider;
    }

    /**
     * @psalm-assert-if-true !null $this->fromDataProvider
     */
    public function hasDataFromDataProvider(): bool
    {
        return $this->fromDataProvider !== null;
    }

    public function getIterator(): TestDataCollectionIterator
    {
        return new TestDataCollectionIterator($this);
    }
}
