# iyzico BIN Checker 1.0.2 PHP

easy BIN info for out customers

## Version
16.09.2014 - 1.0.2

##1. Introduction 

We as iyzico know that BIN information is a valueable part of the checkout page and payment procedure. With this information the user experience on the checkout page can be enchanced greatly. This data requires careful investigation and upto date data which may be burden to handle for our customers. For this we created the BIN List Checker API for our customers.

1)	Request

To get the BIN info you need to make request a POST request to ;
https://api.iyzico.com/bin-check
with your api_id, secret and BIN number.

2)	Response

On the response you will get the following info ;
Card Type (DEBIT CARD / CREDIT CARD),
Issuer (Visa, Master , ...etc)
Brand (Maximum, World, Bonus, ...etc)

##2.	Field Explanations

In this part you will find more detailed information about the fields that you are gonna send with the request and the fields you will get on the response.

1) Request Fields

|Field 		| Type/Length 		| Description                             |
|---------|-----------------|-----------------------------------------|
|api_id|AlphaNumeric/32|Api id from iyzico account|
|secret|AlphaNumeric/32|Secret from iyzico account|
|bin|Numeric/6|BIN number you want to get info about|

2) Response Fields

|Field 		| Type/Length 		| Description                              |
|---------|-----------------|------------------------------------------|
|code|Numeric/4|Numeric code representing the status of response (200 for success)|
|status|AlphaNumeric/16|Explanation for status|
|details|object|Object containing the details|
|BIN|Numeric/6|The BIN number from the request|
|CARD_TYPE|AlphaNumeric/20|Card type (DEBIT CARD / CREDIT CARD)|
|ISSUER|AlphaNumeric/10|Issuer institute (Master, Visa, ...)|
|BRAND|AlphaNumeric/10|The card brand (Maximum, World, ...)|
|BANK_CODE|Numeric/3|Bank's code (70,100 , ...)|

##3.	Error Codes

|Error Code 		| Message														| Reason
|---------------|-----------------------------------|----------------------------------------------------------------------------------------|
|888.777.901 	| Method Not Allowed											| Rather than POST request|
|888.777.902 	| Currently Service Not Available. Try again after some time.	| Service not available|
|888.777.903 	| Bad POST Request.												| api_id, secret, bin parameters not founded in POST request|
|888.777.904 	| Bad POST Requested Params.									| api_id / secret / bin values = null|
|888.777.905 	| Invalid BIN Value.											| BIN value length < 6|
|888.777.906 	| Invalid Merchant.												| api_id & secret not founded/matched|
|888.777.907 	| Unauthorized Merchant											| Merchant Blocked/terminated/rejected|
|888.777.908 	| BIN check is disabled.										| Bin check is disabled for merchant|
|888.777.909 	| Can not find Issuer for given BIN Number						| bin value not matching any issuer|
|000.000.000 	| Successful detailed response									| success|
