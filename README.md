# XDC3PHP

XDC3_PHP API with support for smart contracts, XRC20 and XRC721.

```
    XRC20 Token: Read methods                           XRC721 Token: Read methods

        name()                                               name()
        symbol()                                             symbol()
        decimal()                                            totalSupply()
        totalSupply()                                        balanceOf(owner address)
        balanceOf(account)                                   ownerOf(tokenId)
        allowance(owner, spender)                            tokenURI(tokenId)
                                                             tokenByIndex(index)
                                                             tokenOfOwnerByIndex(ownerAddress,index)
                                                             supportInterface(interfaceId)
                                                             getApproved(tokenId)
                                                             isApprovedForAll(ownerAddress, operatorAddress) 

    XRC20 Token: Write methods                           XRC721 Token: Write methods

        approve(receiverAddress , amount)                    setApprovalForAll(operatorAddress, booleanValue)
        transfer(recipient, amount)                          approve(receiverAddress , tokenId)    
        transferFrom(sender, recipient, amount)              transferFrom(recipient, amount)   
        increaseAllowance(spender, addedValue)               safeTransferFrom(spender, amount)
        decreaseAllowance(spender, subtractedValue)   
             
```
                                                          
#  Usage
```
User need to follow the following steps for using the XDCPHP Library
Step1 :- Create a folder (eg : sdk)
Step2 :- Inside the folder open the command prompt and type composer require xdc3/php
Step3 :- Create a file (eg : index.php)
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



3.After that enable this one(;curl.cainfo =) and add ssl certificatepath here.

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

Name func :-
var_dump($obj1->getName($contractAddress));

GetApprove func:-
var_dump($obj1->getApprove($contractAddress,$ownerAddress,$ownerPrivateKey,$spenderAddress,$tokenAmount));

TransferFrom func :-
var_dump($obj1->transferFrom($contractAddress,$ownerAddress,$spenderAddress,$spenderPrivateKey,$recieverAddress,$tokenAmount));

TransferXdc func :-
$obj1->transferXdc($contractAddress,$senderAddress,$senderPrivateKey,$recieverAddress,$xdcAmount);
var_dump($obj1);

CreateWallet func:-

$obj3 = new createXDCWallet();
$obj3->createWallet();
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
var_dump($obj2->getName($contractAddress));

#Symbol func :-
var_dump($obj2->getSymbol($contractAddress));

#TransferOwnership
var_dump($obj2->transfer($contractAddress,$ownerAddress,$recieverAddress,$tokenId,$approvedPrivateKey));

?>
```
