<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 🔐 Laravel Custom Middleware – `CheckSecret` Guide

This README explains how we created a custom middleware in Laravel called `CheckSecret`, what it does, how to use it securely with `.env`, and how to test it.

---

## 📌 What is `CheckSecret` Middleware?

`CheckSecret` is a **custom middleware** we created to protect a specific route using a secret query parameter.

The logic checks if a `secret` value is passed in the request, and only allows access if it matches a predefined value.

---

## ⚙️ Steps We Followed

### ✅ 1. Created the Middleware

We generated the middleware using:

```bash
php artisan make:middleware CheckSecret
```

This created the file:

```
app/Http/Middleware/CheckSecret.php
```

---

### ✅ 2. Added Logic to the Middleware

Instead of hardcoding the secret (like `12345`), we made it dynamic using `.env`:

```php
public function handle($request, Closure $next)
{
    if ($request->input('secret') !== env('ACCESS_SECRET')) {
        return redirect('/no-access');
    }

    return $next($request);
}
```

This compares the `secret` parameter with an environment variable called `ACCESS_SECRET`.

---

### ✅ 3. Updated the `.env` File

We added this line in `.env`:

```env
ACCESS_SECRET=12345
```

You can replace `12345` with any secret string you prefer.

---

### ✅ 4. Registered Middleware in Kernel

In `app/Http/Kernel.php`, we registered it in the `$routeMiddleware` array:

```php
'check.secret' => \App\Http\Middleware\CheckSecret::class,
```

---

### ✅ 5. Used Middleware in a Route

We protected a route using our middleware:

```php
Route::get('/secret-page', function () {
    return 'This is a secret page!';
})->middleware('check.secret');
```

---

### ✅ 6. Added a No Access Fallback Page

```php
Route::get('/no-access', function () {
    return 'Access Denied!';
});
```

---

## 🔍 Summary of Key Concepts

| Concept            | Description                                                  |
|--------------------|--------------------------------------------------------------|
| Custom Middleware  | A user-defined filter before the route executes              |
| `.env` usage       | Keeps secret values secure and configurable                  |
| Middleware logic   | Checks if request includes the correct query parameter       |
| Redirect fallback  | Redirects to a "no access" page if validation fails          |

---

## ▶️ How to Test

Start Laravel:

```bash
php artisan serve
```

### 🟢 Correct access:

```
http://localhost:8000/secret-page?secret=12345
```

### 🔴 Incorrect or missing secret:

```
http://localhost:8000/secret-page
→ Redirects to /no-access
```

---

## ✅ Why This Is Better Than Hardcoding

- Keeps secrets out of the code
- Makes it easy to update values
- More secure and scalable
- Follows Laravel's best practices

---

## 🚀 You're Ready!

Now you can:
- Create your own middleware
- Use `.env` for dynamic configuration
- Protect routes based on custom rules

Happy coding! 🎉
