<?php declare(strict_types=1);

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

final class AbstractOrFinalSniff implements Sniff
{
    /**
     * @return int[]
     */
    public function register(): array
    {
        return [T_CLASS];
    }

    public function process(File $file, $position): void
    {
    }
}
