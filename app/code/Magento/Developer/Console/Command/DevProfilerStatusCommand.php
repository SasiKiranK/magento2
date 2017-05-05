<?php
namespace Magento\Developer\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Magento\Framework\Profiler;

class DevProfilerStatusCommand extends Command
{

   private $profiler;
   
   public function __construct(
       Profiler $profiler,
       $name = null
   ) {
       parent::__construct($name);
       $this->profiler = $profiler;
   }

  protected function configure()
  {
      $this->setName('dev:profiler:status');
      $this->setDescription('Dev Profiler Status');
  }
  protected function execute(InputInterface $input, OutputInterface $output)
  { 
      $isEnabled = $this->profiler->isEnabled();      
      $status = "Enabled";  
      if (!$isEnabled)
       $status = "Disabled";  

      $output->writeln("Profiler Status is : $status");
  }
}