<?php

namespace JsEnv\Actions\StartHttpServer;

use BimRunner\Actions\Base\AbstractAction;
use BimRunner\Tools\IO\FileHelper;
use BimRunner\Tools\IO\IOHelper;
use BimRunner\Tools\IO\PropertiesHelperInterface;
use BimRunner\Tools\Tools\ProjectTools;
use BimRunner\Tools\Traits\OSTrait;
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
    use OSTrait;

    /**
     * {@inheritdoc}
     */
    public function initOptions(Command $command) {
    }

    /**
     * {@inheritdoc}
     */
    public function initQuestions() {
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
        $this->command('./start', FileHelper::me()->getExecutionDir());
    }

}
