<?php

namespace Chernoff\CMSDetector\CMS;

use Chernoff\CMSDetector\Interfaces\CMSRulesSetInterface;
use Chernoff\CMSDetector\Rules\ContainsFile;

/**
 * Class NotSupportedCMS
 * @package Chernoff\CMSDetector\CMS\WordPress
 */
class NotSupportedCMS implements CMSRulesSetInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'NotSupportedCMS';
    }

    /**
     * {@inheritdoc}
     */
    public function getRules()
    {
        return array(
            new ContainsFile("./", "index.php"),
            new ContainsFile("./", ".htaccess"),
        );
    }
}
