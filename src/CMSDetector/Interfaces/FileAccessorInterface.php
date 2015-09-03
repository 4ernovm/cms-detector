<?php

namespace Chernoff\CMSDetector\Interfaces;

use Chernoff\CMSDetector\Exceptions\FileNotFoundException;
use Chernoff\CMSDetector\Exceptions\UnableChangeDirectoryException;

/**
 * Interface FileAccessorInterface
 * @package Chernoff\CMSDetector\Interfaces
 */
interface FileAccessorInterface
{
    /**
     * Should return list of files in current directory.
     *
     * @return array
     */
    public function listFiles();

    /**
     * Should return list of directories in current folder.
     *
     * @return mixed
     */
    public function listDirs();

    /**
     * Switch directory. Path may be absolute (with / at the beginning) or
     * relative. Also take into consideration path that starts with ~/ (current
     * user home dir).
     *
     * ./  - current dir
     * ../ - one level up
     *
     * @param string $path
     * @return mixed
     * @throws UnableChangeDirectoryException
     */
    public function changeDir($path);

    /**
     * Returns contents of the file or throws exception if file is unavailable
     * or doesn't exists
     *
     * @param string $fileName
     * @return string
     * @throws FileNotFoundException
     */
    public function showFile($fileName);
}
