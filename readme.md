# Caesar Cipher in PHP

A basic Caesar Cipher class in PHP. For fun and learning.

## Download

Clone or fork the repo to play around with the code. Add it to your project wherever appropriate and either configure your autoloader or require the class in your code.

## Usage

1. Create a new `CaesarCipher` instance. Make sure to import the class.

    ```
    $cipher = new KKiernan\CaesarCipher;
    ```

2. Pass the `CaesarCipher` instance a plaintext and a key. In a Caesar Cipher, the key is just the number of places to shift each letter in the plaintext.

    ```
    $ciphertext = $cipher->encrypt('This is a plain text message that will be encrypted!', 8);
    ```

3. To decrypt your ciphertext, use the `decrypt` method on the `CaesarCipher` instance. Pass in the ciphertext and the key that was used for encryption.

    ```
    $plaintext = $cipher->decrypt($ciphertext, 8);
    ```

4. You can attempt to crack an encrypted message by using the `crack` method, which will return a best guess for the key's value. Use the key to retrieve the plaintext.

    ```
    $key = $cipher->crack('Max wtrl tkx zxmmbgz lahkm tztbg.');

    $plaintext = $this->decrypt($ciphertext, $key);
    ```
