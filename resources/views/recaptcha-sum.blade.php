{{--
    Recaptcha google v2 - https://github.com/anhskohbo/no-captcha
    
    PARAMETERS:
        $random_number1
        $random_number2
        $total_sum

        http://html-tuts.com/simple-php-captcha/
--}}

<div class="recaptcha-sum">
    
	<p>Resolve the simple php captcha below: </p>
	<p>	{{ $random_number1 }} + {{$random_number2 }} </p>
		
		<input name="captchaResult" type="text" size="2" />

		<input name="firstNumber" type="hidden" value="{{ $random_number1 }}" />
		<input name="secondNumber" type="hidden" value="{{ $random_number2 }}" />
	</p>

</div>
