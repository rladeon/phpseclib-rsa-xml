<?php
namespace App;
include "C:\\vendor\autoload.php";
use phpseclib\Crypt\RSA;

$pub = '<RSAKeyValue>
  <Modulus>yEQs2LxSHBZgZCH0rRQQy9kmry8g2tNhQL1B9f5azNz9Ce9pXPgSRjVUo1B9Ggb/FK3jy41wWd2IfS6rse3vBzRsabMj29CVODM/19yZPmwEmjJHCgYd+AA2qweKZanDp4FLsSw/kyV5WoPN16GHEMLmLGkJFNIWtzzH5jV+S80=</Modulus>
  <Exponent>AQAB</Exponent>
</RSAKeyValue>';
$private = '<RSAKeyValue>
<Modulus>yEQs2LxSHBZgZCH0rRQQy9kmry8g2tNhQL1B9f5azNz9Ce9pXPgSRjVUo1B9Ggb/FK3jy41wWd2IfS6rse3vBzRsabMj29CVODM/19yZPmwEmjJHCgYd+AA2qweKZanDp4FLsSw/kyV5WoPN16GHEMLmLGkJFNIWtzzH5jV+S80=</Modulus>
  <Exponent>AQAB</Exponent>
<D>p6lD7nPDPlaRfmNbJ6e75B25oEKRfAIp0nxgA6VduVNt2OqByF67VeICKPQSuD6RQWvPYTPZkrLAOSVggwcS6/Vf1TlqGPD71rDH2V8lAt99glhOxnTrUJ8S948HNwM6vdayciUkGWuFMxp3M7teiHweqihImUPXF7TZySu0VpU=</D>
  <DP>VUVk1xp4GWcd29PnFWXIaXOuz49T33t0ivUaDSIgQkgvtNv2USvrtGVob5qwui1OFHpQbCLOV76TGlh1cpyGXQ==</DP>
  <DQ>KWBWLaMdldo5PuYS5L8k3nnn4t4H1Z5fFRDkfBZyr0DMBBWhrA9sAxGm/CgQT+Egk3UUFrSQzYIq5WOL/3iKjQ==</DQ>
  <InverseQ>shBnbX+byy+9zxQ0q2oipP0fP+b422vmRzzsspOkfzbvYCx6zANAHFgmJkZZdxmrHUQzZRWWBcRT4TscEy3EAg==</InverseQ>
  <P>+SYfJCBnleSlNOjF4CTc3HXJwWNnOyLPkRTl1+snA+iOljHvZSuKT0/s4gTMIAarFSorw4AzEb8ozTS0Rg3vcw==</P>
  <Q>zcXyDShGa3ZxtGEqmTJYdccCnj7CuPs8GBaQjQOqylWd8/zZJDFsBRVK05Ktg8b5ImquNgSTNs0SckYx3iGHvw==</Q>
</RSAKeyValue>';

$plaintext = 'West world';
$rsa = new RSA();
$rsa->loadKey($pub,RSA::PUBLIC_FORMAT_XML);
$rsa->setEncryptionMode(RSA::ENCRYPTION_PKCS1);
$ciphertext = base64_encode($rsa->encrypt($plaintext));
echo '<pre>' . $ciphertext . '</pre>';
$rsa->loadKey($private, RSA::PRIVATE_FORMAT_XML);

$plaintext = $rsa->decrypt(base64_decode($ciphertext));
echo '<pre>' . $plaintext . '</pre>';

?>
