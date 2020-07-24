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
use think\Exception;

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
            $a = new RSA();
            if (!$a->checkOs()){
                if (! file_exists("..\.\ssl\openssl.cnf")){
                    throw new Exception("请先将openssl.cnf文件不存在");
                }
                $rsa = $a->create("..\.\ssl\openssl.cnf");
            }else{
                $rsa = $a->create();
            }
            file_put_contents($path,
                PHP_EOL."[RSA]".PHP_EOL."PUBLIC_KEY=\"{$rsa['public_key']}\"".PHP_EOL.
                "PRIVATE_KEY=\"{$rsa['private_key']}\"".PHP_EOL,
                FILE_APPEND);
            $output->writeln('RSA config create finish');
        }
    }
}