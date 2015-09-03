<?php

namespace Chernoff\CMSDetector\Interfaces;

/**
 * Interface CMSRulesSetInterface
 * @package Chernoff\CMSDetector\Interfaces
 */
interface CMSRulesSetInterface
{
    /**
     * Returns name of CMS being tested
     *
     * @return string
     */
    public function getName();

    /**
     * Return set of rules to test CMS against
     *
     * @return CMSRuleInterface[]
     */
    public function getRules();
}
