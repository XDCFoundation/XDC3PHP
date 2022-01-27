<?php

/**
 *  Declare class with nameSpace 
 *  for importing in another file
 */
namespace createXDCWallet;

//Importing Library
use Sop\CryptoTypes\Asymmetric\EC\ECPrivateKey;
use Sop\CryptoEncoding\PEM;
use kornrunner\Keccak;


/* THIS IS A CLASS WHICH CONSISTS CREATEWALLET METHOD 
 * FOR GENERATING NEW XDC WALLET.
 */
class createXDCWallet {

    /**
     * @return Address & PrivateKey Of The Wallet
     */
    public function createWallet(){
        $config = [
            'private_key_type' => OPENSSL_KEYTYPE_EC,
            'curve_name' => 'secp256k1'
            ];
        $res = openssl_pkey_new($config);
        if (!$res) {
            echo 'ERROR: Fail to generate private key. -> ' . openssl_error_string();
            exit;
        }
        openssl_pkey_export($res, $priv_key);
        $priv_pem = PEM::fromString($priv_key);
        $ec_priv_key = ECPrivateKey::fromPEM($priv_pem);
        $ec_priv_seq = $ec_priv_key->toASN1();
        $priv_key_hex = bin2hex($ec_priv_seq->at(1)->asOctetString()->string());
        $pub_key_hex = bin2hex($ec_priv_seq->at(3)->asTagged()->asExplicit()->asBitString()->string());
        $pub_key_hex_2 = substr($pub_key_hex, 2);
        $hash = Keccak::hash(hex2bin($pub_key_hex_2), 256);
        $wallet_address = 'xdc' . substr($hash, -40);
        $wallet_private_key = '0x' . $priv_key_hex;
        echo " XDC Wallet Generated SuccessFully. \n";
        echo "Address of This Wallet: " . $wallet_address . " \n";
        echo "Private Key of This Wallet: " . $wallet_private_key. "\n";
    }
}

?>