<?php
/**
 * Created by IntelliJ IDEA.
 * User: piyusht
 * Date: 18/07/17
 * Time: 5:19 PM
 */
include_once 'user-data.php';

$randomData = isset($_GET['randomData']) ? $_GET['randomData']: "";

$data = getUserData();
$data->randomData = $randomData;

//echo "<pre>";
//print_r($data);
//die(json_encode($data));

$plaintext_data = json_encode($data);

// $data = "{\"guid\":\"{BA2B9813-7FE4-4A87-ABFF-33026DD43545}\",\"userid\":\"mark\",\"company\":\"Tradeweb\",\"email\":\"mark@tradeweb.com\",\"randomData\":\"0.16760659\"}";

// fetch private key from file and ready it\
$private_key = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEA13Oq1GtUGiMBJ8ijLUH/4zamySCKFowvUSFU8CmakrUB/J3b
nnyrIRkhXmdM/VoGT7b2BjfUvjEq/kfKeeCDGlN527L9rD8TZf2wWJWTGOORMAAR
86D7brTeEza0ydDUQq1O1PCMhZJcKPqjcKvqSPoWeXHjcV5PeO0oitVLOg6i8xlt
eC1S9qFl9Ng0AJYUQpjU0P6hgI2SHw0/KS6xanUpH0jSqiC3Lg8oIEePv9hCd3dJ
h7Nec6zhNK0qWZYzCXj37M+QHVm0ZOWd05c77n+qHmF08/N3B+wLEC+wXsZaqd4f
5GYvgCPk7eOxWXtcbS3wD33qjqvbzCJHIEphDQIDAQABAoIBAECdkQNJ+RwpmWQc
GUwuehbjwhuZ5bAjdOFpFLc+Uvxiyui/UylyDETN66MLahyljjUEEz8EKYqs5k8C
qufofIk9tdM9GDU7aY7yCZxXp5kUTuvNaZTel+m41s1+X7QTLEWfAoB8cDhzD66+
lJvrA0XFs03S6TqL5VvIDJuuonQTeMLiJkhTw/CzkF/96BZ65SAg8Q1M50KuVos4
qGgn9ZPZ7mo7LuiWAVfcpdxSbgDDvThk2Zy97Xo7gyKdpZcrClSgO2GqquWeMNBQ
BW0tF3pP4RoDciZjAbnptbAbGKYG+cEnMV/MtGrMZckErPamz/nZpErRlPjcX2JW
4JbhosECgYEA8O9jmif2365xFShan5iBxEhMRjoUQgmm90FH/x+r08T9rGHfSj63
RyPqooo+CDPF7WDIf08rix4IgwlMx0Z6Zf1Tt85K60woqmbTc5r1Wm9a0m0URAeN
x6N3X/R1T8uHuDSTE7ODBq54tis+CWsltbdbESyTja44LjCVjN+XY7ECgYEA5Oxf
Bt8vFoBK3zdktu4QfQD0K0/x1Churw9uVAukeRKAsTbVYBki2Ecf0tKjI2XcTmRm
bLwp94PXOXOCj6JshXsvwuNmA/Vs0RFtgqf8kCpSlG8/C09ypKk/E7mTryNuxtJG
6XRJ/IdQL0aiFmOV63jO3sa0ptnlXgsq88XY9h0CgYEAtNh7QrLMs4kUiHUJ0NGA
VfyOhAgEPK1SDjWJ/Q2gxAwQ/NtZ5zi8CUIEVIy/kxiJcGw9EpIydPHOIc1RPCLC
rNtBg63svkEkJQOZpCSkFYWP/nKxy36ABWHFsNilVYfID5Qm8ZrEtrcvFE3Q+vDa
FVPTn0h+WNJ0iPceyebqk4ECgYAOSj8IU8hBtFJ4KqIL1UKMOxIC3iOvZbK7FNCD
SJLEyAXmihC5xffp3k67P1DVtdcRwayvHvPTspQtzusYgkAZ+P2bQcytdJWNW3Ql
kszuRuYOw/8Aer4iTzpTxeLVLPYOTTQGAK9Zpyy3NsaJdT/3ifwH5gmC3Nk3jKTq
wK/xdQKBgQDBEIuVuaiV7/uEeMFBP3bo4qv9/2tnKgIR/FtiEBa3xRNr/5Gm3JCy
NZEtWgWtGdyYD7yQYsiKHzgkv1chMyTX1il6WGKLJWU8mgZbF8DUUOxzvO+0Gflx
XjOD+qB6mJWqYb1jFWY4/AXaaQe9Zp9gjWeQSNV+h5x224yo/uV0mw==
-----END RSA PRIVATE KEY-----
EOD;

$private_key = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQC++9B+DOsstJA/f4uLSD18q8mi9WBdzYMmA5uYA63MGUHd0MtA
Xia5jWMkEmQBzfp94KeOG+MAtCurDVVEyrCfI22le/D0ubroLv75FUZedMe8WT72
7qirHbQkH/GVWYDBI0rVPxPUFP/Jt97sfbHQnqOppRBYpxnqwA7UOYecMQIDAQAB
AoGAVksZjZrwuCZt9wL+XlSp06cbWJJelIPDem2u5CTlZo8S/9LTw6XHAZgs76OP
pHEZeb8EdmWLUEoYYRWJLagX3UaSGLKyY+GpA2GZWVmCVK89rQPquHRs5IBkHdA0
pZF5O7SNC4uw5yycNERcOS1z35rrg21DKjUylpBVWcqbZDECQQD6v/GX9+ngO7hW
aSBJzuKUuDkfoERgxfaXd29f5yr4Sr6AkfPzkDNNDJnGdbcI4x17nW4JdY8FL/kE
IPFiReAHAkEAwvuD6599sPXtdpy8y12iG5aDUKchxdNGM4PalBoiZjNw7qeWxHkg
F/mK4pJYrezp/fYqy4LLFOwFa3YC7pakBwJAFJ1rM19Cbxj50sDZ0rebkTaEG8GF
XZ9o4pMDKRNMSRV8C/3z3HZigVcj3VkYLzbc2ajbvxNXKsoC4wACWF3+SQJAGOGV
nPy2Ql2vlsI7iUwCgri7OxCIy8DBJZO+0cVf/GC2GY5DPAEk6kpKwczhChjAZ0sB
fQTMu3e+3U6q4x1QAwJBAMlXx8EZ46M2QSlPN1DlSe9ilqX0NcIBHjX4x8ROoZ5a
ZCEOc5wm6WD+l35o8gKA/zr3khdodQfQGqOYJwhDaQg=
-----END RSA PRIVATE KEY-----
EOD;



// compute signature
openssl_sign($plaintext_data, $binary_signature, $private_key);

$encoded_signature = base64_encode($binary_signature);

$msgObj = new \stdClass;
$msgObj->type = "IDENTITY_RESPONSE";
$msgObj->signature = $encoded_signature;
$msgObj->plaintext = $plaintext_data;

//$message = '{
//                "type":"IDENTITY_RESPONSE",
//                "signature":"'. $encoded_signature .'",
//                "plaintext": '.$data.'
//            }';

//echo "<pre>";
//print_r($msgObj);
die(json_encode($msgObj));