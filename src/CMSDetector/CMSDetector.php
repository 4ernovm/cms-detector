<?php

namespace Chernoff\CMSDetector;

use Chernoff\CMSDetector\Interfaces\CMSRuleInterface;
use Chernoff\CMSDetector\Interfaces\CMSRulesSetInterface;
use Chernoff\CMSDetector\Interfaces\FileAccessorInterface;

/**
 * Class CMSDetector
 * @package Chernoff\CMSDetector
 */
class CMSDetector
{
    /** @var FileAccessorInterface  */
    protected $fileAccessor;

    /** @var CMSRulesSetInterface[]  */
    protected $availableCmss;

    /**
     * @param CMSRulesSetInterface[] $availableCmss
     * @param FileAccessorInterface $fileAccessor
     */
    public function __construct(array $availableCmss = array(), FileAccessorInterface $fileAccessor = null)
    {
        $this->fileAccessor  = $fileAccessor;
        $this->availableCmss = $availableCmss;
    }

    /**
     * @param CMSRulesSetInterface $cms
     * @return $this
     */
    public function addCMS(CMSRulesSetInterface $cms)
    {
        $this->availableCmss[] = $cms;

        return $this;
    }

    /**
     * @return Interfaces\CMSRulesSetInterface[]
     */
    public function getAvailableCMSs()
    {
        return $this->availableCmss;
    }

    /**
     * @param CMSRulesSetInterface[] $cmss
     * @return $this
     */
    public function setAvailableCMSs(array $cmss = array())
    {
        $this->availableCmss = $cmss;

        return $this;
    }

    /**
     * @param FileAccessorInterface $fileAccessor
     * @return $this
     */
    public function setFileAccessor(FileAccessorInterface $fileAccessor)
    {
        $this->fileAccessor = $fileAccessor;

        return $this;
    }

    /**
     * @return FileAccessorInterface
     */
    public function getFileAccessor()
    {
        return $this->fileAccessor;
    }

    /**
     * @return string
     */
    public function detect()
    {
        $results = array();

        /** @var CMSRulesSetInterface $cms */
        foreach ($this->availableCmss as $cms) {
            $rules       = $cms->getRules();
            $possibility = 0;

            /** @var CMSRuleInterface $rule */
            foreach ($rules as $rule) {
                $possibility += (int) $rule->check($this->fileAccessor);
            }

            // @TODO Figure out a way to take into consideration percent of probability AND total number of successful checks.
//            $results[$cms->getName()] = (!empty($rules)) ? ($possibility / count($rules)) : 0;
            $results[$cms->getName()] = $possibility;
        }

        // Remove CMSs with 0 probability from the list.
        $results = array_filter($results);

        // Get most probable CMS from the list.
        arsort($results, SORT_NUMERIC);

        $cmss = array_keys($results);

        return reset($cmss);
    }
}
