<?php
/**
 * @author: aibayanyu
 * Time: 2020/6/19 13:31
 */


namespace aibayanyu\rsa;


use aibayanyu\rsa\command\RSACommand;

class Service extends \think\Service
{
    public function boot()
    {
        $this->commands(RSACommand::class);
    }
}