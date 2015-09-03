<?php

namespace Chernoff\CMSDetector\Rules;

use Chernoff\CMSDetector\Interfaces\CMSRuleInterface;
use Chernoff\CMSDetector\Interfaces\FileAccessorInterface;

/**
 * Class ContainsFile
 * @package Chernoff\CMSDetector\Rules
 */
class ContainsFile implements CMSRuleInterface
{
    /** @var  string */
    protected $path, $fileName;

    /**
     * @param string $path
     * @param string $fileName
     */
    public function __construct($path, $fileName)
    {
        $this->path     = $path;
        $this->fileName = $fileName;
    }

    /**
     * @param FileAccessorInterface $fileAccessor
     * @return bool
     */
    public function check(FileAccessorInterface $fileAccessor)
    {
        $fileAccessor->changeDir($this->path);

        $files = $fileAccessor->listFiles();

        return (in_array($this->fileName, $files));
    }
}
