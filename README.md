# XDC3PHP
A PHP library that connects to interact with the xdc blockchain. It connects to an XDC node to send transactions, interact with smart contracts and much more!

## What is an XRC20 token?

·An XRC20 token is a blockchain-based asset with similar functionality to ether, it can hold value and be sent and received.

· XRC20 tokens are stored and sent using Xinfin addresses and transactions, and use gas to cover transaction fees.

# XRC721 Token Standard

## What is an XRC721 token?

·The XRC-721 introduces a standard for NFT, in other words, this type of Token is unique and can have different value than another Token from the same Smart Contract, maybe due to its age, rarity or even something else like its visual. Wait, visual?

Yes! All NFTs have a uint256 variable called tokenId, so for any XRC-721 Contract, the pair contract address, uint256 tokenId must be globally unique.

Every XRC-721 compliant contract must implement the XRC721 and XRC165 interfaces.

## XRC20 Token: Read methods                XRC721 Token: Read methods

name()                                          name()
symbol()                                        symbol()
decimal()                                       totalSupply()
totalSupply()                                   balanceOf(owner address)
balanceOf(account)                              ownerOf(tokenId)
allowance(owner, spender)                       tokenURI(tokenId)
                                                tokenByIndex(index)
                                                tokenOfOwnerByIndex(ownerAddress,index)
                                                supportInterface(interfaceId)
                                                getApproved(tokenId)
                                                isApprovedForAll(ownerAddress, operatorAddress) 

## XRC20 Token: Write methods                           ##  XRC721 Token: Write methods

approve(receiverAddress , amount)                           setApprovalForAll(operatorAddress, booleanValue)
transfer(recipient, amount)                                 approve(receiverAddress , tokenId)
transferFrom(sender, recipient, amount)                     transferFrom(recipient, amount)
increaseAllowance(spender, addedValue)                      safeTransferFrom(spender, amount)
decreaseAllowance(spender, subtractedValue)                
                                                             
##  Usage
```
When the user wants to use the SDKPHP library he/ she need to follow the below steps
Step1 :- create a folder User convient (eg : sdk)
Step2 :- inside the folder open the command prompt and type composer require xdc3/php
Step3 :- create a file according to  User convient (eg : index.php)
Step4 :- After creating user need to add the path , import the classes and create the object
Step5 :- (optional) If user wants to change the URL of (Apothem testnet Network)  Goto vendor -> XDC3 folder -> PHP folder -> .env file
```

## Installation

```
This library provides simple way to interact with XDC XRC20 & XRC721 tokens.


Before Installing This Library

1.Install php version 7.4.25 in the System.



2.go to PHP Folder in the system, open php.ini file Then enable gmp and curl extensions.

ex: before it has ;extension=gmp just remove ";" to enable this Extension.

    before it has ;extension=curl just remove ";" to enable this Extension.



3.after that enable this one(;curl.cainfo =) and add ssl certificatepath here.

  for download this certificate

  go to this url https://curl.se/docs/caextract.html then click on cacert.pem on the top.

  then copy the path of the certificate and paste in php .ini file.

  ex: curl.cainfo = "C:\Users\HP\Downloads\cacert.pem"



4.Install openssl in the system by chocolately.

  Run below command in admin powershell to install openssl.

  ex: choco install openssl
  
  
 5. -In XDC library inside the vendor folder -> xdc3base -> php  we can find the all called functions of the XRC20 methods . (including  contract file , address calling from apothem file etc)

    In PHPS library inside the vendor folder -> xdc3 -> php  we can find the all calling functions from the XDC libarary. (ex : in modules xrc20 folder contains every calling methods )
    
```

## Folder Info 
-In XDC library inside the vendor folder -> xdc3base -> php  we can find the all called functions of the XRC20 methods . (including  contract file , address calling from apothem file etc)

In PHPS library inside the vendor folder -> xdc3 -> php  we can find the all calling functions from the XDC libarary. (ex : in modules xrc20 folder contains every calling methods )

If user wants to change the URL  Goto vendor -> XDC3 folder -> PHP folder -> .env file   .

ex :-//path configurationinclude "vendor/xdc3/php/library.php";//Import classes of XDC20 use XRC721\SDK\XRC20SDK;

//Creating a Objects to call the functions of XRC20 and Create a wallet for the User$obj1 = new XRC20SDK();$obj3 = new createXDCWallet();

## Example
```php
Test.php
<?php

//path configuration
include "vendor/xdc3/php/library.php";

//Import classes of XDC20
use XRC20\SDK\XRC20SDK;

//Creating a Objects to call the functions of XRC20 and Create a wallet for the User
$obj1 = new XRC20SDK();

# Name func :-
$obj1->getName($contractAddress);
var_dump($obj1);
#Symbol func :- 
$obj1->getSymbol($contractAddress);
var_dump($obj1);
Decimal func :-
$obj1->getDecimal($contractAddress);
var_dump($obj1);
TotalSupply func :-
$obj1->getTotalSupply($contractAddress);
var_dump($obj1);
BalanceOf func :-
$obj1->getBalanceOf($contractAddress,$ownerAddress);
var_dump($obj1);
Allowance func:-
$obj1->getAllowance($contractAddress,$ownerAddress,$spenderAddress);
var_dump($obj1);
GetApprove func:-
$obj1->getApprove($contractAddress,$ownerAddress,$ownerPrivateKey,$spenderAddress,$tokenAmount);;
var_dump($obj1);
IncreaseAllowance func :-
 $obj1->increaseAllowance($contractAddress,$ownerAddress,$ownerPrivateKey,$spenderAddress,$tokenAmount);
var_dump($obj1);
DecreaseAllowance func :- 
$obj1->decreaseAllowance($contractAddress,$ownerAddress,$ownerPrivateKey,$spenderAddress,$tokenAmount);
var_dump($obj1);
TransferFrom func :-
$obj1->transferFrom($contractAddress,$ownerAddress,$spenderAddress,$spenderPrivateKey,$recieverAddress,$tokenAmount);
var_dump($obj1);
TransferToken func :-
$obj1->transferToken($contractAddress,$senderAddress,$senderPrivateKey,$recieverAddress,$tokenAmount);
var_dump($obj1);
TransferXdc func :-
$obj1->transferXdc($contractAddress,$senderAddress,$senderPrivateKey,$recieverAddress,$xdcAmount);
var_dump($obj1);

CreateWallet func:-
$obj3 = new createXDCWallet();
$obj3->createWallet();?>
```

## Example for XRC721
Text.php
```php 
<?php

ex :-//path configuration
include "vendor/xdc3/php/library.php";

//Import classes of XDC721
use XRC721\SDK\XRC721;

//Create a Object
$obj2-> new XRC721();

#Name func :-
$obj2->getName($contractAddress);
var_dump($obj2);
#Symbol func :-
$obj2->getSymbol($contractAddress);
var_dump($obj2);
#TotalSupply func :-4
$obj2->getTotalSupply($contractAddress);
var_dump($obj2);
#BalanceOf func :-
$obj2->getBalanceOf($contractAddress,$ownerAddress);
var_dump($obj2);
#SupportsInterface func :-
var_dump($obj2);
$obj2->getSupportInterface($contractAddress,$interfaceId);
var_dump($obj2);
#OwnerOf func :-
$obj2->getOwnerOf($contractAddress,$tokenId);
var_dump($obj2);
#TokenURI func:-
$obj2->getTokenURI($contractAddress,$tokenId);
var_dump($obj2);
#TokenByIndex func :-
$obj2->getTokenByIndex($contractAddress,$index);
var_dump($obj2);
#TokenOfOwnerByIndex func :-
$obj2->getTokenOfOwnerByIndex($contractAddress,$ownerAddress,$index);
var_dump($obj2);
#GetApprove func:-
$obj2->getApproved($contractAddress,$tokenId);
var_dump($obj2);
#Approve func:-
$obj2->approve($contractAddress,$recieverAddress,$tokenId,$privateKey);
var_dump($obj2);
#SetApprovedForAll func :-
$obj2->setApprovalForAll($contractAddress,$operatorAddress,$approvedStatus,$ownerPrivateKey,$tokenId);
var_dump($obj2);
#IsApprovedForAll func :-
$obj2->isApprovedForAll($contractAddress,$ownerAddress,$operatorAddr
var_dump($obj2);
#SafeTransferFrom func:-
$obj2->safeTransferFrom($contractAddress,$ownerAddress,$recieverAddress,$tokenId,$approvedPrivateKey);
var_dump($obj2);
#TransferFrom func:-
$obj2->transferFrom($contractAddress,$ownerAddress,$recieverAddress,$tokenId,$approvedPrivateKey);
var_dump($obj2);
#TransferOwnership
$obj2->transfer($contractAddress,$ownerAddress,$recieverAddress,$tokenId,$approvedPrivateKey);
?>
```