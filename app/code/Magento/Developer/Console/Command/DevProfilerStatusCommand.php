<?php
namespace Magento\Developer\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Config\Model\Config\Factory as ConfigFactory;
use Magento\Framework\App\DeploymentConfig\Reader as DeploymentConfigReader;
use Magento\Framework\Config\File\ConfigFilePool;

use Magento\Framework\Profiler;

class DevProfilerStatusCommand extends Command
{

   private $profiler;
    protected $configFactory;
    protected $deploymentConfigReader;
   
   public function __construct(
       Profiler $profiler,
       ConfigFactory $configFactory,
       DeploymentConfigReader $deploymentConfigReader,
       $name = null
   ) {
       parent::__construct($name);
       $this->profiler = $profiler;
       $this->configFactory = $configFactory;
       $this->deploymentConfigReader = $deploymentConfigReader;
   }

  protected function configure()
  {
      $this->setName('dev:profiler:status');
      $this->setDescription('Dev Profiler Status');
  }
  protected function execute(InputInterface $input, OutputInterface $output)
  { 


      // $config = $this->configFactory->create();
      //   $config->setDataByPath('profiler/general/enable', true);
      //   $config->save();
         // $this->enableDbProfiler();
        // return true;


     // $this->profiler->start();
    // \Magento\Framework\Profiler::enable();
    \Magento\Framework\Profiler::start('TEST: ' . __METHOD__, ['group' => 'TEST', 'method' => __METHOD__]);
      $isEnabled = \Magento\Framework\Profiler::isEnabled();      
      $status = "Enabled";  
      if (!$isEnabled)
       $status = "Disabled";  

      $output->writeln("Profiler Status is : $status");
  }

   public function enableDbProfiler()
    {
        $env = $this->deploymentConfigReader->load(ConfigFilePool::APP_ENV);
        $env['db']['connection']['default']['profiler'] = [
            'class'   => '\\Magento\\Framework\\DB\\Profiler',
            'enabled' => true,
        ];
        $this->deploymentConfigWriter->saveConfig([ConfigFilePool::APP_ENV => $env], true);
        return true;
    }

}