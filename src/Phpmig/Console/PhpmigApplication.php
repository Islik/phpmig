<?php
/**
 * @package    Phpmig
 * @subpackage Console
 */
namespace Phpmig\Console;

use Phpmig\Console\Command;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Yaml\Yaml;

/**
 * This file is part of phpmig
 *
 * Copyright (c) 2011 Dave Marshall <dave.marshall@atstsolutuions.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * The main phpmig application
 *
 * @author      Dave Marshall <david.marshall@bskyb.com>
 */
class PhpmigApplication extends Application
{
    /**
     * @param string $version
     */
    public function __construct($version = 'dev', \ArrayAccess $di = [])
    {
        parent::__construct('phpmig', $version);

        $initCommand     = isset($di['phpmig.initCmd']) ? $di['phpmig.initCmd'] : new Command\InitCommand();
        $statusCommand   = isset($di['phpmig.statusCmd']) ? $di['phpmig.statusCmd'] : new Command\StatusCommand();
        $checkCommand    = isset($di['phpmig.checkCmd']) ? $di['phpmig.checkCmd'] : new Command\CheckCommand();
        $generateCommand = isset($di['phpmig.generateCmd']) ? $di['phpmig.generateCmd'] : new Command\GenerateCommand();
        $upCommand       = isset($di['phpmig.upCmd']) ? $di['phpmig.upCmd'] : new Command\UpCommand();
        $downCommand     = isset($di['phpmig.downCmd']) ? $di['phpmig.downCmd'] : new Command\DownCommand();
        $migrateCommand  = isset($di['phpmig.migrateCmd']) ? $di['phpmig.migrateCmd'] : new Command\MigrateCommand();
        $rollbackCommand = isset($di['phpmig.rollbackCmd']) ? $di['phpmig.rollbackCmd'] : new Command\RollbackCommand();
        $redoCommand     = isset($di['phpmig.redoCmd']) ? $di['phpmig.redoCmd'] : new Command\RedoCommand();

        $this->addCommands(array(
            $initCommand,
            $statusCommand,
            $checkCommand,
            $generateCommand,
            $upCommand,
            $downCommand,
            $migrateCommand,
            $rollbackCommand,
            $redoCommand
        ));
    }
}

