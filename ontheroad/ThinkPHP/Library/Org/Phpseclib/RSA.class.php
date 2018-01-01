<?php
namespace Org\Phpseclib;

// +----------------------------------------------------------------------
//RSA加密解密类
// +----------------------------------------------------------------------
include('Crypt/RSA.php');
class RSA
{
    var $rsa;

    function __construct()
    {
        $this->rsa = new \Crypt_RSA();
    }

    /**
     * 生成RSA类实例
     * @access	public
     * @return	array RSA实例
     */
    public function  createRSA()
    {
        $rsa=new \Crypt_RSA();
        return $rsa;
    }

	 /**
     * 生成公钥密钥
	 * @access	public
     * @param	int	$bits 密钥长度
     * @return	array privatekey 密钥 publickey 公钥
     */
	public function createKey($bits = 1024)
	{
		$result=$this->rsa->createKey($bits);
		return $result;
	}


    /**
     * 加密
     * @access	public
     * @param	string	$key    密钥|公钥
     * @param	string	$data   明文
     * @return	string  加密结果
     */
    public function  myEncrypt($key,$data)
    {
        $this->rsa->loadKey($key);
        $ciphertext = $this->rsa->encrypt($data);
        return base64_encode($ciphertext);
    }


    /**
     * 解密
     * @access	public
     * @param	string	$key    密钥|公钥
     * @param	string	$data   密文
     * @return	string  解密结果
     */
    public function  myDecrypt($key,$data)
    {
        $this->rsa->loadKey($key);
        $plaintext = $this->rsa->decrypt($data);
        return  $plaintext;
    }

}
