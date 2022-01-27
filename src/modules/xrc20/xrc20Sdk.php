<?php

/**
 *  Declare class with nameSpace 
 *  for importing in another file
 */
namespace XRC20\SDK;


//Importing Library
use XDC\PHP\TOKEN20\token20;


/* THIS IS A CLASS WHICH CONSISTS ALL THE METHODS 
 * AS PER XRC20 STANDARDS.
 */
class XRC20 {

    /**
     * @dev Gets the Connection from XDC.
     * @param tokenAddress The address of the token.
     */
    public function xdcConnection($contractAddress){
        $apothemAddress = getenv('URL');
        $xdcConnection = new token20($contractAddress,$apothemAddress);
        return $xdcConnection ;
    }
    
//-------------------------------------READ OPERATIONS-----------------------------------------//

    /**
     * @dev Gets the Name of the specified address.
     * @param tokenAddress The address of the token.
     * @return an String representing the Name owned by the passed address.
     */
    public function getName($contractAddress){
        $xdc = $this->xdcConnection($contractAddress);
        $name = $xdc->name();
        return  $name ;
    }

     /**
     * @dev Gets the Decimal of the specified address.
     * @param tokenAddress The address of the token.
     * @return an String representing the Decimal owned by the passed address.
     */
    public function getDecimal($contractAddress){
        $xdc = $this->xdcConnection($contractAddress);
        $decimal = $xdc->decimals();
        return  $decimal;
    }

    /**
    *  @dev Gets the Symbol of the specified address.
    * @param tokenAddress The address of the token.
    * @return an String representing  the symbol of the token.
    */
    public function getSymbol($contractAddress){
        $xdc = $this->xdcConnection($contractAddress);
        $symbol = $xdc->symbol();
        return  $symbol ;
    }

    /**
     * @dev Gets the Totalsupply of the specified address.
     * @param tokenAddress The address of the token.
     * @return an String representing the Totalsupply owned by the passed address.
     */
    public function getTotalSupply($contractAddress){
        $xdc = $this->xdcConnection($contractAddress);
        $totalSupply = $xdc->totalSupply();
        return  $totalSupply;
    }

    /**
     * @dev Gets how much allowance spender have from owner
     * @param tokenAddress The address of the token.
	 * @param ownerAddress The address of the Token's owner.
	 * @param spenderAddress The address of the Spender.
     * @return an String representing the Allowance .
     */
    public function getAllowance($contractAddress,$ownerAddress,$spenderAddress){
        $xdc = $this->xdcConnection($contractAddress);
        $allowance = $xdc->allowance($ownerAddress,$spenderAddress);
        return  $allowance;
    }

    /**
     * @dev Gets the balance of the specified address.
     * @param tokenAddress The address of the token.
     * @param ownerAddress The address to query the balance of.
     * @return an String representing the amount owned by the passed address.
     */
    public function getBalanceOf($contractAddress,$ownerAddress){
        $xdc = $this->xdcConnection($contractAddress);
        $balanceOf = $xdc->balanceOf($ownerAddress);
        return  $balanceOf ;
    }


//-------------------------------------WRITE OPERATIONS---------------------------------------//

    /**
	 * @dev Approve the passed address to spend the specified amount of tokens on behalf of owner.
     * Beware that changing an allowance with this method brings the risk that someone may use both the old
     * and the new allowance by unfortunate transaction ordering. One possible solution to mitigate this
     * race condition is to first reduce the spender's allowance to 0 and set the desired value afterwards:
     * @param tokenAddress ContractAddress.
     * @param ownerAddress Token Owner Address.
     * @param ownerPrivateKey Owner Private key.
	 * @param spenderAddress The address which will spend the funds.
	 * @param tokenValue The amount of tokens to be spent.
     */
    public function getApprove(string $contractAddress,string $ownerAddress, $ownerPrivateKey,string $spenderAddress,float $tokenAmount){
        $xdc = $this->xdcConnection($contractAddress);
        $balance = $xdc->balanceOf($ownerAddress);
        if ($tokenAmount <= $balance){
            $approveTransaction = $xdc->approve($ownerAddress,$spenderAddress, $tokenAmount);
            $approveTransactionId = $approveTransaction->sign($ownerPrivateKey)->send();
            return $approveTransactionId ;
        }else{
            return "Insufficient balance in this token. Your current token balance is: $balance \n";
        }
    }

      /**
     * @dev decrease the amount of tokens that an owner allowed to a spender.
     * approve should be called when allowed_[_spender] == 0. 
	 * @param tokenAddress Token Address for which , allownce need to to decrease.
     * @param ownerAddress Owner Address
     * @param ownerPrivateKey Owner Private key
     * @param spenderAddress The address which will spend the funds.
     * @param tokenValue The amount of tokens to increase the allowance by.
     */
    public function decreaseAllowance(string $contractAddress,string $ownerAddress,string $ownerPrivateKey,string $spenderAddress,float $tokenAmount){
        $xdc = $this->xdcConnection($contractAddress);
        $allowance = $xdc->allowance($ownerAddress,$spenderAddress);
        if ($tokenAmount <= $allowance){
            $decreaseTransaction = $xdc->decreaseAllowance($ownerAddress,$spenderAddress,$tokenAmount);
            $decreaseTransactionId = $decreaseTransaction->sign($ownerPrivateKey)->send();
            return  $decreaseTransactionId ;
        }else{
            return "Enter sufficient amount to decrease. your current allowance is: $allowance \n";
        }
    }

    /**
     * @dev increase the amount of tokens that an owner allowed to a spender.
     * approve should be called when allowed_[_spender] == 0. 
	 * @param tokenAddress Token Address for which , allownce need to to increase.
     * @param ownerAddress Owner Address
     * @param ownerPrivateKey Owner Private key
     * @param spenderAddress The address which will spend the funds.
     * @param tokenValue The amount of tokens to decrease the allowance by.
     */
    public function increaseAllowance(string $contractAddress,string $ownerAddress,string $ownerPrivateKey,string $spenderAddress,float $tokenAmount){
        $xdc = $this->xdcConnection($contractAddress);
        $balance = $xdc->balanceOf($ownerAddress);
        $allowance = $xdc->allowance($ownerAddress,$spenderAddress);
        if ($tokenAmount <= ($balance-$allowance)){
            $increaseTransaction = $xdc->increaseAllowance($ownerAddress , $spenderAddress , $tokenAmount);
            $increaseTransactionId = $increaseTransaction->sign($ownerPrivateKey)->send();
            return  $increaseTransactionId ;
        }else{
            return "Insufficient funds in a token to increase allowance. Your Current balance is: $balance-$allowance \n";
        }
    }

     /**
     * @dev Transfer tokens from one address to another
     * @param tokenAddress Token Address.
     * @param ownerAddress Token Owner Address.
	 * @param spenderAddress Spender Address is The address which you want to send tokens from.
	 * @param spenderPrivateKey Spender's Private key.
     * @param recieverAddress Reciever Address is The address which you want to transfer to.
     * @param tokenValue the amount of tokens to be transferred
     */
    public function transferFrom(string $contractAddress,string $ownerAddress,string $spenderAddress,string $spenderPrivateKey,string $recieverAddress,float $tokenAmount){
        $xdc = $this->xdcConnection($contractAddress);
        $allowance = $xdc->allowance($ownerAddress,$spenderAddress);
        if ($tokenAmount <= $allowance){
            $transferTransaction = $xdc->transferFrom($spenderAddress,$ownerAddress,$recieverAddress, $tokenAmount);
            $transferTransactionId = $transferTransaction->sign($spenderPrivateKey)->send();
            return $transferTransactionId ;
        }else{
            return "Insufficient allowance try again with different amount. Your current allowance is: $allowance \n";
        }
    }

     /**
     * @dev Transfer token for a specified address
	 * @param tokenAddress The address of the token.
     * @param senderAddress Sender's Address.
     * @param senderPrivateKey Sender's private key.
     * @param recieverAddress The address to transfer to.
     * @param tokenValue The amount to be transferred.
     */
    public function transferToken(string $contractAddress,string $senderAddress,string $senderPrivateKey,string $recieverAddress,float $tokenAmount){
        $xdc = $this->xdcConnection($contractAddress);
        $balance = $xdc->balanceOf($senderAddress);
        if ($tokenAmount <= $balance){
            $transferTransaction = $xdc->transfer($senderAddress,$recieverAddress,$tokenAmount);
            $transferTransactionId= $transferTransaction->sign($senderPrivateKey)->send();
           return  $transferTransactionId ;
        }else{
            return "Insufficient funds in a token try again with different amount. Your current balance is: $balance \n";
        }
    }

    /**
     * @dev Transfer XDC for a specified address.
	 * @param tokenAddress The address of the token.
     * @param senderAddress Sender's Address.
     * @param senderPrivateKey sender's private key.
	 * @param recieverAddress The address to transfer to.
     * @param xdcValue The amount to be transferred.
     */
    public function transferXdc(string $contractAddress,string $senderAddress,string $senderPrivateKey,string $recieverAddress,float $xdcAmount){
        $xdc = $this->xdcConnection($contractAddress);
        $transferTransaction = $xdc->transferxdc($senderAddress,$recieverAddress ,$xdcAmount);
        $transferTransactionId = $transferTransaction->sign($senderPrivateKey)->send();
        return $transferTransactionId ;
    }

}
?>
