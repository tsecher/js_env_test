<?php

namespace JsEnv\Actions\CreateJsTestRep;

use BimRunner\Actions\Base\AbstractAction;
use BimRunner\Tools\IO\IOHelper;
use BimRunner\Tools\IO\PropertiesHelperInterface;
use BimRunner\Tools\Tools\ProjectTools;
use BimRunner\Tools\Traits\ReplaceTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use BimRunner\Actions\Manager\Annotation\Action;
use Symfony\Component\Process\Process;

/**
 * @Action(
 *     name = "Créer un répertoire de test js",
 *     weight = 1
 * )
 */
class CreateJsTestRepAction extends AbstractAction {
    use ReplaceTrait;

    /**
     * Watch process
     * @var \Symfony\Component\Process\Process
     */
    protected $watchProcess;

    /**
     * {@inheritdoc}
     */
    public function initOptions(Command $command) {
        // Ajout de l'option sur le nom du projet si besoin.
        ProjectTools::me()->addProjectOption($command);
    }

    /**
     * {@inheritdoc}
     */
    public function initQuestions() {
        // Question sur le nom du projet.
        ProjectTools::me()->askName($this);
    }

    /**
     * {@inheritdoc}
     */
    public function getTasksQueue() {
        return [
          [$this, 'createDirStructure'],
          [$this, 'npmInit'],
          [$this, 'launch'],
        ];
    }

    /**
     * Crée la structure de répertoire.
     *
     * @param \BimRunner\Tools\IO\PropertiesHelperInterface $propertiesHelper
     */
    protected function createDirStructure(PropertiesHelperInterface $propertiesHelper) {
        $this->copyDirTemplate(__DIR__ . '/templates', ProjectTools::me()
          ->getProjectDir(), $propertiesHelper->getParams(), ['{{' . $this->str_content_id . '}}']);
    }

    /**
     * Lance npm
     */
    protected function npmInit() {
        $dir = ProjectTools::me()->getProjectDir() . '/src';
        $this->command('npm init -y', $dir);
        $this->command('npm i bim-mix http-server browser-sync browser-sync-webpack-plugin@2.0.1', $dir);
        $this->command('npm run dev', $dir);
        $this->command('chmod 775 start', ProjectTools::me()
          ->getProjectDir());
    }

}
