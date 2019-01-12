<?php declare(strict_types=1);

namespace Matthewbdaly\AbstractOrFinalClassesOnly\Sniffs;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * Sniff for catching classes not marked as abstract or final
 */
final class AbstractOrFinalSniff implements Sniff
{
    private $tokens = [
        T_ABSTRACT,
        T_FINAL,
    ];

    private $fixer;

    private $position;

    /**
     * @return int[]
     */
    public function register(): array
    {
        return [T_CLASS];
    }

    public function process(File $file, $position): void
    {
        $this->fixer = $file->fixer;
        $this->position = $position;

        if (!$file->findPrevious($this->tokens, $position)) {
            $file->addFixableError(
                'All classes should be declared either "abstract" or "final"',
                $position - 1,
                self::class
            );
            $this->fix();
        }
    }

    private function fix(): void
    {
        $this->fixer->addContent($this->position - 1, 'final ');
    }
}
