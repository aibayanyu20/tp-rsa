<?php
/**
 * @author: aibayanyu
 * Time: 2020/6/19 13:40
 */


namespace aibayanyu\rsa;



use Exception;

class Auth
{
    private $rsa;

    /**
     * Auth constructor.
     * @throws Exception
     */
    public function __construct()
    {
        // 开始进行操作
        $config = config("rsa");
        // 拿到数据开始进行操作数据
        if (empty($config['public_key'])) throw new Exception("请先配置好加密公钥");
        if (empty($config['private_key'])) throw new Exception("请先配置好加密私钥");
        $this->rsa = (new Crypto($config['public_key'],$config['private_key']));
    }

    /**
     * 公钥加密
     * @param $data
     * @return string
     * @throws Exception
     * @author: aibayanyu
     * Time: 2020/6/19 13:47
     */
    public function puEncrypt($data){
        return $this->rsa->puEncrypt($data);
    }

    /**
     * 公钥解密
     * @param $data
     * @return string
     * @throws Exception
     * @author: aibayanyu
     * Time: 2020/6/19 13:48
     */
    public function puDecrypt($data){
       return $this->rsa->puDecrypt($data);
    }

    /**
     * 私钥加密
     * @param $data
     * @return string
     * @throws Exception
     * @author: aibayanyu
     * Time: 2020/6/19 13:48
     */
    public function pkEncrypt($data){
       return $this->rsa->pkEncrypt($data);
    }

    /**
     * 私钥解密
     * @param $data
     * @return string
     * @throws Exception
     * @author: aibayanyu
     * Time: 2020/6/19 13:49
     */
    public function pkDecrypt($data){
       return $this->rsa->pkDecrypt($data);
    }

}