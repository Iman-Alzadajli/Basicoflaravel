<!DOCTYPE html>
<html>
<head><title>CSRF Test</title></head>
<body>
    <h1>Test CSRF Protection</h1>

    <form method="POST" action="/submit-form">
        @csrf <!--for protection--> 
        <input type="text" name="name" placeholder="Your Name">
        <button type="submit">Send</button>
    </form>
</body>
</html>
