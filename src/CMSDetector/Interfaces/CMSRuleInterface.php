<?php

namespace Chernoff\CMSDetector\Interfaces;

/**
 * Interface CMSRuleInterface
 * @package Chernoff\CMSDetector\Interfaces
 */
interface CMSRuleInterface
{
    /**
     * Returns result of the test
     *
     * @param FileAccessorInterface $fileAccessor
     * @return bool
     */
    public function check(FileAccessorInterface $fileAccessor);
}
