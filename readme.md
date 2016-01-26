# Caesar Cipher in PHP

A basic Caesar Cipher class in PHP. For fun.

## Download

Just clone or fork the repo to play around with the code. Add it to your project wherever appropriate and configure your autoloader if needed.

## Usage

1. Create a new Caesar Cipher instance. Make sure to import the class.
    ```
    use KKiernan\CaesarCipher;
    ```

    ```
    $cipher = new CaesarCipher;
    ```

2. Pass it a message to encrypt and a key to use. In a Caesar Cipher, the key is just the number of letters to shift.

    ```
    $encryptedMessage = $cipher->encrypt('Hello Cipher', 8);
    ```

3. To decrypt your message, use the `decrypt` method. Pass it the encrypted message and the key that was used for encryption. Or brute-force it. It's terribly easy since there's only 25 possible keys.

    ```
    $decryptedMessage = $cipher->decrypt($encryptedMessage, 8);
```

## TODO

- [X] Add support for uppercase letters
- [X] Write test for large key numbers (26+)
