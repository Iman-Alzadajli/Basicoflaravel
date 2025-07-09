
<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# 🛡️ Laravel CSRF Protection – Lesson Summary

This README summarizes what we learned about CSRF protection in Laravel, how it works, and how to create a test page to understand it practically.

---

## 📌 What is CSRF?

CSRF (Cross-Site Request Forgery) is a type of attack where a malicious site tricks a logged-in user into making unwanted actions on another site without their consent.

---

## 🔒 How Laravel Protects You

- Laravel uses a unique **CSRF token** per user session.
- This token is automatically added to all forms using the `@csrf` Blade directive.
- For POST, PUT, PATCH, DELETE requests, Laravel checks if the CSRF token is present and valid.
- If the token is missing or invalid, Laravel returns a **419 Page Expired** error.

---

## ⚙️ Where is CSRF Protection Enabled?

The middleware responsible is:

```php
\App\Http\Middleware\VerifyCsrfToken::class
```

It is included by default in the `'web'` middleware group in `app/Http/Kernel.php`.

---

## 📝 How to Use CSRF Token in Forms

Inside your Blade view form, always include:

```blade
<form method="POST" action="/submit-form">
    @csrf
    <!-- form inputs -->
    <button type="submit">Submit</button>
</form>
```

`@csrf` inserts a hidden input with the token.

---

## 🛠️ Creating a CSRF Test Page (Step-by-Step)

1. Create a Blade view file `resources/views/test-csrf.blade.php`:

```blade
<!DOCTYPE html>
<html>
<head><title>CSRF Test</title></head>
<body>
    <h1>Test CSRF Protection</h1>

    <form method="POST" action="/submit-form">
        @csrf
        <input type="text" name="name" placeholder="Your Name">
        <button type="submit">Send</button>
    </form>
</body>
</html>
```

2. Add routes to `routes/web.php`:

```php
Route::view('/test-csrf', 'test-csrf');

Route::post('/submit-form', function (Illuminate\Http\Request $request) {
    return 'Form submitted! Hello, ' . $request->input('name');
});
```

3. Run the development server:

```bash
php artisan serve
```

4. Visit `http://localhost:8000/test-csrf` in your browser.

5. Fill the form and submit. You should see a success message.

6. Try removing `@csrf` from the form and submit again; you will get a **419 Page Expired** error.

---

## 🔄 Difference Between Route::view() and Route::get()

| Method                   | Use Case                                     | Description                          |
|--------------------------|----------------------------------------------|--------------------------------------|
| `Route::view()`          | When you want to return a view without logic | Simple static page rendering         |
| `Route::get()` + Closure | When you need to run code before returning view | Dynamic pages with data preparation |
| `Route::post()` + Closure| Handling POST form submissions               | Processing form data                 |

---

## ✅ Summary

- CSRF protection is **enabled by default** in Laravel’s web middleware.
- Always include `@csrf` in your forms.
- Requests without a valid CSRF token are rejected.
- You can easily test it by creating a form with and without `@csrf`.

---

Happy and secure coding! 🔐
