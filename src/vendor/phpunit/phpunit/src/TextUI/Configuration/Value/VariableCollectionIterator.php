<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\TextUI\Configuration;

use Countable;
use Iterator;
use function count;
use function iterator_count;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @template-implements Iterator<int, Variable>
 */
final class VariableCollectionIterator implements Countable, Iterator
{
    /**
     * @psalm-var list<Variable>
     */
    private readonly array $variables;
    private int $position = 0;

    public function __construct(VariableCollection $variables)
    {
        $this->variables = $variables->asArray();
    }

    public function count(): int
    {
        return iterator_count($this);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return $this->position < count($this->variables);
    }

    public function key(): int
    {
        return $this->position;
    }

    public function current(): Variable
    {
        return $this->variables[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }
}
