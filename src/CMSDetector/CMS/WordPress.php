<?php

namespace Chernoff\CMSDetector\CMS;

use Chernoff\CMSDetector\Interfaces\CMSRulesSetInterface;
use Chernoff\CMSDetector\Rules\ContainsDir;
use Chernoff\CMSDetector\Rules\ContainsFile;

/**
 * Class WordPress
 * @package Chernoff\CMSDetector\CMS\WordPress
 */
class WordPress implements CMSRulesSetInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'WordPress';
    }

    /**
     * {@inheritdoc}
     */
    public function getRules()
    {
        // @TODO FileContains takes too much time
        return array(
            new ContainsDir("./", "wp-admin"),
            new ContainsDir("./", "wp-content"),
            new ContainsDir("./", "wp-includes"),
            new ContainsFile("./", "wp-activate.php"),
//            new FileContains("./", "wp-activate.php", "/WP_INSTALLING/"),
            new ContainsFile("./", "wp-blog-header.php"),
            new ContainsFile("./", "wp-cron.php"),
//            new FileContains("./", "wp-cron.php", "/DOING_CRON/"),
            new ContainsFile("./", "wp-load.php"),
//            new FileContains("./", "wp-load.php", "/WPINC/"),
            new ContainsFile("./", "wp-login.php"),
            new ContainsFile("./", "wp-settings.php"),
            new ContainsFile("./wp-admin", "admin.php"),
//            new FileContains("./wp-admin", "admin.php", "/WP_ADMIN/"),
        );
    }
}
