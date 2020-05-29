<?php

namespace JsEnv\Actions\StartHttpServer;

use BimRunner\Actions\Base\AbstractAction;
use BimRunner\Tools\IO\IOHelper;
use BimRunner\Tools\IO\PropertiesHelperInterface;
use BimRunner\Tools\Tools\ProjectTools;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use BimRunner\Actions\Manager\Annotation\Action;

/**
 * @Action(
 *     name = "Lancer le serveur",
 *     weight = 10
 * )
 */
class StartHttpServerAction extends AbstractAction {

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
          [$this, 'startHttpServer'],
        ];
    }

    /**
     * Lance le serveur
     *
     * @param \BimRunner\Tools\IO\PropertiesHelperInterface $propertiesHelper
     *
     * @throws \Exception
     */
    protected function startHttpServer(PropertiesHelperInterface $propertiesHelper) {
        $this->command('chmod 775 launch.sh', ProjectTools::me()
          ->getProjectDir());
        $this->command('./launch.sh', ProjectTools::me()->getProjectDir());
    }

}
