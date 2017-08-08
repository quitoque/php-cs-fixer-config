<?php

namespace Quitoque\Tools\PhpCsFixer;

use PhpCsFixer\Config as BasePhpCsFixerConfig;

abstract class Base extends BasePhpCsFixerConfig
{
    public function __construct($name = 'default')
    {
        parent::__construct($name);

        $finder = $this
            ->getFinder()
            ->name('*.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
        ;

        $this
            ->setRiskyAllowed(false)
            ->setFinder($finder)
        ;
    }

    /**
     * Add rules to predefined rules of this configuration.
     *
     * @param array $rules
     *
     * @return self
     */
    public function addRules(array $rules)
    {
        return $this->setRules(
            array_merge(
                $this->getRules(),
                $rules
            )
        );
    }
}