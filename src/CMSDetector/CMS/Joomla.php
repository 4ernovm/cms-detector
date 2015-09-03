<?php

namespace Chernoff\CMSDetector\CMS;

use Chernoff\CMSDetector\Interfaces\CMSRulesSetInterface;
use Chernoff\CMSDetector\Rules\ContainsDir;
use Chernoff\CMSDetector\Rules\ContainsFile;
use Chernoff\CMSDetector\Rules\FileContains;

/**
 * Class Joomla
 * @package Chernoff\CMSDetector\CMS\WordPress
 */
class Joomla implements CMSRulesSetInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Joomla';
    }

    /**
     * {@inheritdoc}
     */
    public function getRules()
    {
        return array(
            new ContainsDir("./", "administrator"),
            new ContainsDir("./", "components"),
            new ContainsDir("./", "templates"),
            new ContainsDir("./", "plugins"),
            new ContainsDir("./", "modules"),
            new ContainsDir("./", "libraries"),
            new ContainsFile("./", "configuration.php"),
            new FileContains("./", "configuration.php", "/_JEXEC/"),
            new ContainsDir("./administrator", "cache"),
            new ContainsDir("./administrator", "components"),
            new ContainsDir("./administrator", "includes"),
            new ContainsDir("./administrator", "manifests"),
            new ContainsDir("./administrator", "modules"),
            new ContainsDir("./administrator", "templates"),
            new ContainsFile("./administrator", "index.php"),
            new FileContains("./administrator", "index.php", "/JOOMLA_MINIMUM_PHP/"),
        );
    }
}
