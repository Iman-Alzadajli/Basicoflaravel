<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 📍 Laravel Routing – Getting Started Guide

This README explains what we did in the `routes/web.php` file of our Laravel project. Routing is the first and most important step in building a Laravel app.

---

## 🚦 What is Routing?

Routing in Laravel is how you tell the app:  
> "When someone visits this URL, show them this content."

Routes are defined in this file:

```
routes/web.php
```

---

## 🔧 What We Did

### ✅ 1. Created the default homepage route

```php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
```

- This means: When someone opens `http://localhost:8000/`, Laravel will return the view called `welcome`.
- This view should exist at:  
  `resources/views/welcome.blade.php`

> 🔴 We had an error before because the view name was typed incorrectly as `'welcome to Larvel'`.  
> ✅ We fixed it by changing it to `'welcome'`.

---

### ✅ 2. Created a second route for `/hello`

```php
Route::get('/hello', function () {
    return view('hello');
});
```

So we created a file at:

```
resources/views/hello.blade.php
```

With the following content:

```html
<!DOCTYPE html>
<html>
<head>
    <title>Hello Page</title>
</head>
<body>
    <h1>Hello from Laravel!</h1>
</body>
</html>
```

Now when we visit `http://localhost:8000/hello`, we see this custom view.

---

## 🔍 Summary of Important Concepts

| Concept           | Description                                                           |
|-------------------|-----------------------------------------------------------------------|
| `Route::get()`    | Creates a route that responds to GET requests                         |
| `'/'`             | The root URL of your Laravel app                                      |
| `view('name')`    | Returns a Blade view from `resources/views/name.blade.php`            |
| `web.php`         | File where all web (browser) routes are defined                       |

---

## 🧠 Best Practices

- ✅ Always make sure view names match the actual file names in `resources/views`
- ❌ Don’t include spaces in view names like `view('my page')`
- ✅ Use lowercase and underscore naming (example: `about_us`)
- ✅ Keep route logic simple — for complex logic, use controllers

---

## ▶️ How to Run the Project

Start Laravel’s development server using:

```bash
php artisan serve
```

Then open your browser and visit:

- [http://localhost:8000/](http://localhost:8000/) – to see the welcome page  
- [http://localhost:8000/hello](http://localhost:8000/hello) – to see your custom hello page  

---

## ✅ Final Result

You now understand how to:

- Create basic routes using `Route::get()`
- Return both text and views from routes
- Fix errors related to missing views
- Structure basic pages in a Laravel app

---

Happy coding with Laravel! 🚀
