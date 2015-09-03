<?php

namespace Chernoff\CMSDetector\Rules;

use Chernoff\CMSDetector\Interfaces\CMSRuleInterface;
use Chernoff\CMSDetector\Interfaces\FileAccessorInterface;

/**
 * Class ContainsDir
 * @package Chernoff\CMSDetector\Rules
 */
class ContainsDir implements CMSRuleInterface
{
    /** @var  string */
    protected $path, $dirName;

    /**
     * @param string $path
     * @param string $dirName
     */
    public function __construct($path, $dirName)
    {
        $this->path     = $path;
        $this->dirName = $dirName;
    }

    /**
     * @param FileAccessorInterface $fileAccessor
     * @return bool
     */
    public function check(FileAccessorInterface $fileAccessor)
    {
        $fileAccessor->changeDir($this->path);

        $files = $fileAccessor->listDirs();

        return (in_array($this->dirName, $files));
    }
}
