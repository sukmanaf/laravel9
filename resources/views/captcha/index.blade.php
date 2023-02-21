<script src="https://www.google.com/recaptcha/api.js"></script>
<form action="{{ route('captcha.store') }}" id ="login-form" method="POST" enctype="multipart/form-data">
    <div style="width:500px">

    <button class="g-recaptcha" 
            data-sitekey="6LeAhpkkAAAAAJbzKSlhYzMWkviTWgnQcntFcynC" 
            data-callback='onSubmit' 
            data-action='submit'>Submit</button>
    </div>
</form>
<script>
   function onSubmit(token) {
    //  document.getElementById("login-form").submit();
    console.log('ok')
   }
 </script>