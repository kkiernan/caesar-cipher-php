# Caesar Cipher

A basic Caesar Cipher class in PHP for fun and learning.

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Installation](#installation)
- [Instantiation](#instantiation)
- [Available Methods](#available-methods)
  - [Encrypt](#encrypt)
  - [Decrypt](#decrypt)
  - [Crack](#crack)
- [Security](#security)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Installation

Install the package using Composer.

```
composer require kkiernan/caesar-cipher
```

## Instantiation

Create a new `CaesarCipher` instance. Make sure to import the class or use the fully qualified class name.

```php
$cipher = new KKiernan\CaesarCipher();
```

## Available Methods

### Encrypt

To encrypt a message, pass the `CaesarCipher` instance some plaintext and a key. In a Caesar Cipher, the key is just the number of places to shift each letter in the plaintext.

```php
$ciphertext = $cipher->encrypt('This is a plain text message that will be encrypted!', 8);
```

### Decrypt

To decrypt a ciphertext, use the `decrypt` method on the `CaesarCipher` instance. Pass in the ciphertext and the key that was used to encrypt the message.

```php
$plaintext = $cipher->decrypt($ciphertext, 8);
```

### Crack

You can attempt to crack an encrypted message by using the `crack` method, which will return a best guess for the key's value. Use the key to retrieve the plaintext.

```php
$key = $cipher->crack('Max wtrl tkx zxmmbgz lahkm tztbg.');

$plaintext = $this->decrypt($ciphertext, $key);
```

## Security

This was written for fun and learning very basic encryption techniques (like substitution in this case). Obviously Caesar Cipher is not a secure encryption algorithm (only 25 possible keys), so don't use this for anything sensitive. It's really a toy meant for fun.
