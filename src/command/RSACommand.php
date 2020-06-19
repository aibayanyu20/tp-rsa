<?php
/**
 * @author: 朱正健
 * Time: 2020/6/19 13:32
 */


namespace aibayanyu\rsa\command;


use aibayanyu\rsa\RSA;
use think\console\Command;
use think\console\Input;
use think\console\Output;

class RSACommand extends Command
{
    protected function configure()
    {
        $this->setName("rsa:create")
            ->setDescription("create rsa private_key and public_key");
    }

    protected function execute(Input $input, Output $output)
    {
        $path = app()->getAppPath()."..".DIRECTORY_SEPARATOR.'.env';
        if (file_exists($path)&& strpos(file_get_contents($path),'[RSA]')){
            $output->writeln('RSA config is exit');
        }else{
            $rsa = new RSA();
            file_put_contents($path,
                PHP_EOL."[RSA]".PHP_EOL."PUBLIC_KEY={$rsa['public_key']}".PHP_EOL.
                "PRIVATE_KEY={$rsa['private_key']}".PHP_EOL,
                FILE_APPEND);
            $output->writeln('RSA config create finish');
        }
    }
}