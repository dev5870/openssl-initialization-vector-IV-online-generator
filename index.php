<!DOCTYPE html>
<html lang="en">
<head>
    <title>Openssl initialization vector (IV) online generator</title>
    <style>
        code {
            font-family: Consolas, "courier new", monospace;
            color: crimson;
            background-color: #f1f1f1;
            padding: 2px;
            font-size: 105%;
        }
    </style>
</head>
<body>

<h2>Openssl initialization vector (IV) online generator</h2>

<form method="post">
    <label for="algorithm">Algorithm:</label><br>
    <input type="text" id="algorithm" name="algorithm" placeholder="AES-256-CBC" required><br>
    <input type="submit" value="Generate">
</form>

<?php
if ($_POST['algorithm']) {
    $algorithm = $_POST['algorithm'];

    $result = bin2hex(
        openssl_random_pseudo_bytes(
            openssl_cipher_iv_length($algorithm)
        )
    );
    echo $result;
}
?>
<p><b>How create openssl initialization vector (IV) with PHP:</b></p>

<code>
    bin2hex(
    openssl_random_pseudo_bytes(
    openssl_cipher_iv_length(your_algorithm)
    )
    );
</code>

<p><b>What is initialization vector (IV) ?</b></p>

<p>An IV is generally a random number that guarantees the encrypted text is unique.

    To explain why it's needed, let's pretend we have a database of people's names encrypted with the key 'secret' and no IV.

<ol>
    <li>John dsfa9p8y098hasdf</li>
    <li>Paul po43pokdfgpo3k4y</li>
    <li>John dsfa9p8y098hasdf</li>
</ol>

If John 1 knows his cipher text (dsfa9p8y098hasdf) and has access to the other cipher texts, he can easily find other people named John.

Now in actuality, an encryption mode that requires an IV will always use one. If you don't specify an IV, it's automatically set to a bunch of null bytes. Imagine the first example but with a constant IV (00000000).

<ol>
    <li>John dsfa9p8y098hasdf 00000000</li>
    <li>Paul po43pokdfgpo3k4y 00000000</li>
    <li>John dsfa9p8y098hasdf 00000000</li>
</ol>

To prevent repeated cipher texts, we can encrypt the names using the same 'secret' key and random IV's:

<ol>
    <li>John sdf875n90mh28458 86714561</li>
    <li>Paul fg9087n5b60987nf 13541814</li>
    <li>John gjhn0m89456vnler 44189122</li>
</ol>

As you can see, the two 'John' cipher texts are now different. Each IV is unique and has influenced the encryption process making the end result unique as well. John 1 now has no idea what user 3's name is.</p>

<p><a href="https://stackoverflow.com/questions/11821195/use-of-initialization-vector-in-openssl-encrypt" target="_blanck">Discussion on Stackoverflow</a></p>

</body>
</html>

