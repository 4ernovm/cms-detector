<?php

namespace Chernoff\CMSDetector\Rules;

use Chernoff\CMSDetector\Interfaces\CMSRuleInterface;
use Chernoff\CMSDetector\Interfaces\FileAccessorInterface;

/**
 * Class FileContains
 * @package Chernoff\CMSDetector\Rules
 */
class FileContains implements CMSRuleInterface
{
    /** @var  string */
    protected $path, $fileName, $regex;

    /**
     * @param string $path
     * @param string $fileName
     */
    public function __construct($path, $fileName, $regex)
    {
        $this->path     = $path;
        $this->fileName = $fileName;
        $this->regex    = $regex;
    }

    /**
     * @param FileAccessorInterface $fileAccessor
     * @return bool
     */
    public function check(FileAccessorInterface $fileAccessor)
    {
        $fileAccessor->changeDir($this->path);

        $content = $fileAccessor->showFile($this->fileName);

        return preg_match($this->regex, $content);
    }
}
