<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            background-color: black;
            font-family: Helvetica, sans-serif;
        }
        .payment-container{
            margin: auto;
            width:600px;
            height: 350px;
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -175px;
            margin-left: -300px;
            border-radius: 10px;
        }
        .payment-details{
            background-color: blue;
            color: white;
            padding: 30px 20px;
            border-radius: 10px 10px 0 0;
        }
        .left-float{
            float: left;
        }
        .w50p{
            width: 50%;
        }
        .w33p{
            width: 33.33%;
        }
        .right-float{
            float: right;
        }
        .center-float{
            float: center;
        }
        .first-line::after,.second-line::after{
            content: " ";
            display: block; 
            height: 0; 
            clear: both;
        }
        .second-line{
            padding-top: 20px;
        }
        .inner-container{
            padding: 20px 20px 30px 20px
        }
        .payment-info{
            background-color: white;
            border-radius: 0 0 10px 10px;
        }
        .title{
            font-size: 12px;
            color:gray;
            padding-bottom: 10px;
            text-transform: uppercase;
        }
        input[type=text]{
            width: 90%;
            padding: 10px 5px;
            outline: none;
            border: 1px solid gray;
            border-radius: 5px;
        }
        input[type=submit]{
            width: 80%;
            padding: 10px 5px;
            color:gray;
            outline: none;
            border: 1px solid gray;
            border-radius: 5px;
        }
        input[type=password]{
            width: 90%;
            padding: 10px 5px;
            outline: none;
            border: 1px solid gray;
            border-radius: 5px;
        }
    </style>
</head>
<body>
  
    <form action="contributionshtml" method="GET">
        <?php echo csrf_field(); ?>  
    <div class="payment-container">
        <div class="payment-details">
            <div>PAYMENT<br/> DETAILS</div>
        </div>
        <div class="payment-info">
            <div class="inner-container">
                <div class="first-line">
                    <div class="left-float w50p">
                        <div class="title">CARDHOLDER'S NAME</div>
                        <div>
                            <input type="text" id="name" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="right-float w50p">
                        <div class="title">CARD NUMBER</div>
                        <div>
                            <input type="text" id="credit-card" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="second-line">
                    <div class="left-float w33p">
                        <div class="title">EXPIRY DATE</div>
                        <div>
                            <input type="text" id="expiry" autocomplete="off" maxlength="5" onkeyup = "checkDate()" placeholder="MM/YY"/>
                        </div>
                    </div>
                    <div class="left-float w33p">
                        <div class="title">SECURITY CODE</div>
                        <div>
                            <input type="password" id="cvv" autocomplete="off" maxlength="4" onkeypress="return isNumber(event)"/>
                        </div>
                    </div>
                    <div class="left-float w33p">
                        <div class="title">zip CODE</div>
                        <div>
                            <input type="text" id="zipcode" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="third-line">
                    <div class="center-float w33p">
                        
                        <div>
                            <input type="submit" id="submit" name="submit" value="Submit"  autocomplete="off"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </form>
    <script>
       function checkDate(){
            var inputChar = String.fromCharCode(event.keyCode);
            var code = event.keyCode;
            var allowedKeys = [8];
            if (allowedKeys.indexOf(code) !== -1) {
                return;
            }

            event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
            ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
            ).replace(
                /^1([3-9])$/g, '01/$1' // 13 > 01/3 
            // ).replace(
            //   /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
            ).replace(
                /^0\/|0+$/g, '0' // 0/ > 0 and 00 > 0 
            ).replace(
                /[^\d|^\/]*/g, '' // To allow only digits and `/` 
            ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
            );
        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        // credit card

    input_credit_card = function(input) {
        var format_and_pos = function(char, backspace) {
        var start = 0;
        var end = 0;
        var pos = 0;
        var separator = " ";
        var value = input.value;

        if (char !== false) {
        start = input.selectionStart;
        end = input.selectionEnd;

        if (backspace && start > 0) // handle backspace onkeydown
        {
            start--;

            if (value[start] == separator) {
            start--;
            }
        }
        // To be able to replace the selection if there is one
        value = value.substring(0, start) + char + value.substring(end);

        pos = start + char.length; // caret position
        }

        var d = 0; // digit count
        var dd = 0; // total
        var gi = 0; // group index
        var newV = "";
        var groups = /^\D*3[47]/.test(value) ? // check for American Express
        [4, 6, 5] : [4, 4, 4, 4];

        for (var i = 0; i < value.length; i++) {
        if (/\D/.test(value[i])) {
            if (start > i) {
            pos--;
            }
        } else {
            if (d === groups[gi]) {
            newV += separator;
            d = 0;
            gi++;

            if (start >= i) {
                pos++;
            }
            }
            newV += value[i];
            d++;
            dd++;
        }
        if (d === groups[gi] && groups.length === gi + 1) // max length
        {
            break;
        }
        }
        input.value = newV;

        if (char !== false) {
        input.setSelectionRange(pos, pos);
        }
    };

    input.addEventListener('keypress', function(e) {
        var code = e.charCode || e.keyCode || e.which;

        // Check for tab and arrow keys (needed in Firefox)
        if (code !== 9 && (code < 37 || code > 40) &&
        // and CTRL+C / CTRL+V
        !(e.ctrlKey && (code === 99 || code === 118))) {
        e.preventDefault();

        var char = String.fromCharCode(code);

        // if the character is non-digit
        // OR
        // if the value already contains 15/16 digits and there is no selection
        // -> return false (the character is not inserted)

        if (/\D/.test(char) || (this.selectionStart === this.selectionEnd &&
            this.value.replace(/\D/g, '').length >=
            (/^\D*3[47]/.test(this.value) ? 15 : 16))) // 15 digits if Amex
        {
            return false;
        }
        format_and_pos(char);
        }
    });

  // backspace doesn't fire the keypress event
    input.addEventListener('keydown', function(e) {
        if (e.keyCode === 8 || e.keyCode === 46) // backspace or delete
        {
        e.preventDefault();
        format_and_pos('', this.selectionStart === this.selectionEnd);
        }
    });

    input.addEventListener('paste', function() {
        // A timeout is needed to get the new value pasted
        setTimeout(function() {
        format_and_pos('');
        }, 50);
    });

    input.addEventListener('blur', function() {
        // reformat onblur just in case (optional)
        format_and_pos(this, false);
    });
    };
    input_credit_card(document.getElementById('credit-card'));
    </script>
</body>
</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/payment.blade.php ENDPATH**/ ?>