<!DOCTYPE html>
<html>
  <head>
    <title>The Vigenere Cipher | The Code Book Companion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
     <!-- Bootstrap -->
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
     
      <!-- custom -->
     <link rel="stylesheet" href="css/style.css">
      
      <!-- JavaScript plugins (requires jQuery) -->
      <script src="http://code.jquery.com/jquery.js"></script>
     
     <!-- Latest compiled and minified JavaScript -->
     <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
     <style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  } 
  </style>
  <style type="text/css">
    body{
      background-image: url(img/flow.jpg);
    }
  </style>
  </head>
  <body>
    <div class="container">
       <div class="row">
           <div class="col-lg-8">
           <h1>The Vigenere Ciper</h1>
        <p class="lead">TUGAS UTS PRAKTIKUM SISTEM KEMANAN DATA (DWI AYUNI)</p>
              <fieldset>
                <legend>Encrypt</legend>
                <div class="form-group">
                  <label for="plaintext">Plaintext</label>
                  <input type="text" class="form-control" id="plaintext" placeholder="Enter text to encrypt">
                </div>
                <div class="form-group">
                  <label for="key">Key</label>
                  <input type="text" class="form-control" id="key" placeholder="Enter an alphabetic key">
                    <br/><button class="btn btn-default" onClick="vigenere()">Encrypt</button>
                </div>
                <div class="form-group">
                    <label for="output">Ciphertext Output</label>
                    <textarea class="form-control" id="output" rows="3"></textarea>
                </div>
                
              </fieldset>
              <br/>
              <fieldset>
                <legend>Decrypt</legend>
                <div class="form-group">
                  <label for="ciphertext">Ciphertext</label>
                  <input type="text" class="form-control" id="ciphertext" placeholder="Enter text to decrypt">
                </div>
                <div class="form-group">
                  <label for="key">Key</label>
                  <input type="text" class="form-control" id="keycipher" placeholder="Enter an alphabetic key">
                  <br/><button class="btn btn-default" onClick="devigenere()">Decrypt</button>
                </div>
                <div class="form-group">
                    <label for="deoutput">Plaintext Output</label>
                    <textarea class="form-control" id="deoutput" rows="3"></textarea>
                </div>
                
              </fieldset>
              <h2><a href="index.html">Back</a></h2>
            </div>

        </div>
    </div><!-- /.container -->
    </body>
    <script type="text/javascript">
        var alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        function cipher(shiftn){
            var i = 0;
            var cipher = new Array(26);
            for (i; i < 26; i++){
                var index = 0;
                if ((i + shiftn) > 25){
                    index = (i + shiftn) % 26;
                }
                else {
                    index = i + shiftn;
                }
                cipher[i] = alphabet[index];
            }
            return cipher;
        }
        
        function encipherChar(k, p){
            keyIndex = alphabet.indexOf(k)
            cipherAlpha = cipher(keyIndex)
            cipherChar = cipherAlpha[alphabet.indexOf(p)]
            return cipherChar
        }
        
        function decipherChar(k, c){
            keyIndex = alphabet.indexOf(k)
            cipherAlpha = cipher(keyIndex)
            decipheredChar = alphabet[cipherAlpha.indexOf(c)]
            return decipheredChar
        }
        
        function encipherMessage(plaintext, key){
            keyIdx = 0
            var ciphertext = ""
            for (var i = 0; i < plaintext.length; i++){
                if(keyIdx > key.length-1)
                    keyIdx = 0;
                keyChar = key[keyIdx]
                cipherChar = encipherChar(keyChar, plaintext[i])
                ciphertext = ciphertext + cipherChar
                keyIdx++
            }
            return ciphertext
        }
        
        function decipherMessage(ciphertext, key){
            keyIdx = 0
            var plaintext = ""
            for(var i = 0; i < ciphertext.length; i++){
                if(keyIdx > key.length-1)
                    keyIdx = 0;
                keyChar = key[keyIdx]
                plainChar = decipherChar(keyChar, ciphertext[i])
                plaintext = plaintext + plainChar
                keyIdx++
            }
            return plaintext
        }

        function vigenere(){
            plaintext = $("#plaintext").val().toLowerCase().replace(/\W/g, '').replace(/[0-9]/g, '')
            key = $("#key").val().toLowerCase().replace(/\W/g, '').replace(/[0-9]/g, '')
            ciphertext = encipherMessage(plaintext, key)
            $("#output").val(ciphertext)
        }
        function devigenere(){
            ciphertext = $("#ciphertext").val().toLowerCase().replace(/\W/g, '').replace(/[0-9]/g, '')
            key = $("#keycipher").val().toLowerCase().replace(/\W/g, '').replace(/[0-9]/g, '')
            plaintext = decipherMessage(ciphertext, key)
            $("#deoutput").val(plaintext)
        }
    </script>

</html>
