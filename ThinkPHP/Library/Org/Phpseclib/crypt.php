<?php  
header("Content-Type:text/html;charset=UTF-8");
include('./phpseclib/Crypt/RSA.php');

$rsa = new Crypt_RSA();

// extract($rsa->createKey(512));

// echo "$privatekey<br />$publickey";

$result=$rsa->createKey(1024);

echo "----------------生成公钥密钥-----------------------\n"."<p>";
echo $result['privatekey'];
echo "<br />";
echo $result['publickey'];
echo "<br />";

$privatekey=$result['privatekey'];
$publickey=$result['publickey'];

 
 echo "----------------判断公钥私钥是否是可用的-----------------------\n"."<p>";
 
print_r($privatekey);echo "<p>";  
print_r($publickey);echo "<p>";  
//echo $private_key;  
$pi_key =  openssl_pkey_get_private($privatekey);//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id  
$pu_key = openssl_pkey_get_public($publickey);//这个函数可用来判断公钥是否是可用的  
print_r($pi_key);echo "<p>";  
print_r($pu_key);echo "<p>";   
  
  
$data = "20160410221400";//原始数据  
$encrypted = "";   
$decrypted = "";   
  
echo "----------------加密-----------------------\n"."<p>";
echo "source data:".$data."<p>";   
  
echo "private key encrypt:\n";  
openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密  
$encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的  
echo $encrypted."<p>";   


echo "public key decrypt:";
openssl_public_decrypt(base64_decode($encrypted),$decrypted,$pu_key);//私钥加密的内容通过公钥可用解密出来  
echo $decrypted."<p>";  
  
  
  
  
echo "---------------------------------------\n"."<p>";    
echo "public key encrypt:\n";  
openssl_public_encrypt($data,$encrypted,$pu_key);//公钥加密  
$encrypted = base64_encode($encrypted);  
echo $encrypted."<p>";   

 
echo "private key decrypt:";  
openssl_private_decrypt(base64_decode($encrypted),$decrypted,$pi_key);//私钥解密  
echo $decrypted."<p>";  


echo "-----------------签名认证----------------------\n"."<p>";
//******************************签名认证********************************////
//$rsa->setPassword('password');
$rsa->loadKey($privatekey); // private key
$plaintext = 'WP12344';
//$rsa->setSignatureMode(CRYPT_RSA_SIGNATURE_PSS);
$signature = $rsa->sign($plaintext);
// echo 'si:'.base64_decode($signature)."<p>";
// utf8_encode($signature)
$rsa->loadKey($publickey); // public key
// $rsa->loadKey('23234234234');
echo $rsa->verify($plaintext, $signature) ? 'verified' : 'unverified';


?>
