# LaundryQ — Auth Documentation (Blade / Session-Based)

Auth uses **Laravel sessions** (cookie-based). All routes are in `routes/web.php`.
No tokens are needed — the browser session cookie handles authentication automatically.

---

## Route Map

| Method | URL | Controller | Middleware | Description |
|--------|-----|------------|------------|-------------|
| `GET`  | `/login` | `LoginController@showLoginForm` | `guest` | Show login page |
| `POST` | `/login` | `LoginController@login` | `guest` | Process login |
| `POST` | `/logout` | `LoginController@logout` | `auth` | Logout |
| `GET`  | `/register` | `RegisterController@showRegisterForm` | `guest` | Show register page |
| `POST` | `/register` | `RegisterController@register` | `guest` | Process registration |
| `GET`  | `/forgot-password` | `ForgotPasswordController@showForgotForm` | `guest` | Show forgot password page |
| `POST` | `/forgot-password` | `ForgotPasswordController@sendResetLink` | `guest` | Send reset email |
| `GET`  | `/reset-password/{token}` | `ForgotPasswordController@showResetForm` | `guest` | Show reset password form |
| `POST` | `/reset-password` | `ForgotPasswordController@resetPassword` | `guest` | Process password reset |
| `GET`  | `/auth/google/redirect` | `OAuthController@redirectToGoogle` | `guest` | Redirect to Google |
| `GET`  | `/auth/google/callback` | `OAuthController@handleGoogleCallback` | `guest` | Google OAuth callback |

---

## Blade Views Required

You must create the following Blade views under `resources/views/auth/`:

```
resources/views/
├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
│   ├── forgot-password.blade.php
│   └── reset-password.blade.php
└── dashboard.blade.php
```

---

## 1. Login — `auth/login.blade.php`

```blade
@if (session('status'))
    <div class="alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
    @error('email') <span>{{ $message }}</span> @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password') <span>{{ $message }}</span> @enderror

    <label>
        <input type="checkbox" name="remember"> Remember me
    </label>

    <button type="submit">Login</button>

    <a href="{{ route('password.request') }}">Forgot your password?</a>
    <a href="{{ route('auth.google.redirect') }}">Login with Google</a>
</form>
```

**Redirect after success:** → `route('dashboard')`
**On failure:** → back to login with `$errors->get('email')`

---

## 2. Register — `auth/register.blade.php`

```blade
<form method="POST" action="{{ route('register') }}">
    @csrf

    <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
    @error('name') <span>{{ $message }}</span> @enderror

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
    @error('email') <span>{{ $message }}</span> @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password') <span>{{ $message }}</span> @enderror

    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <button type="submit">Create Account</button>

    <a href="{{ route('login') }}">Already have an account?</a>
</form>
```

**Password rules:** min 8 characters, upper + lowercase + numbers  
**Redirect after success:** → `route('dashboard')`

---

## 3. Forgot Password — `auth/forgot-password.blade.php`

```blade
@if (session('status'))
    <div class="alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
    @error('email') <span>{{ $message }}</span> @enderror

    <button type="submit">Send Reset Link</button>

    <a href="{{ route('login') }}">Back to Login</a>
</form>
```

**On success:** → back with `session('status')` = `"We have emailed your password reset link."`  
**On failure:** → back with `$errors->get('email')`

> **Local dev tip:** Set `MAIL_MAILER=log` in `.env` and find the reset link inside `storage/logs/laravel.log`.

---

## 4. Reset Password — `auth/reset-password.blade.php`

```blade
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    {{-- Token and email are passed from the reset link --}}
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">

    <input type="password" name="password" placeholder="New Password" required>
    @error('password') <span>{{ $message }}</span> @enderror

    <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>

    <button type="submit">Reset Password</button>
</form>
```

**Redirect after success:** → `route('login')` with `session('status')` = `"Your password has been reset."`

---

## 5. Logout Button

Place this in your layout / navbar:

```blade
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
```

---

## 6. Google OAuth

### In your login view:

```blade
<a href="{{ route('auth.google.redirect') }}">Login with Google</a>
```

### Flow:
1. User clicks the link → browser goes to `/auth/google/redirect`
2. Backend redirects to Google's consent screen
3. Google redirects back to `/auth/google/callback`
4. Backend finds or creates the user → logs them in with `Auth::login()`
5. User is redirected to `route('dashboard')`

### Authorised redirect URI to add in Google Cloud Console:
```
http://localhost:8000/auth/google/callback
```
(Change the domain to your production URL when deploying)

---

## 7. Protecting Routes

Use the `auth` middleware on any route that requires login:

```php
// Single route
Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');

// Group
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', ...);
    Route::get('/profile', ...);
    Route::resource('/orders', OrderController::class);
});
```

Unauthenticated users are automatically redirected to `route('login')`.

---

## 8. Accessing the Authenticated User in Blade

```blade
{{-- Check if logged in --}}
@auth
    <p>Welcome, {{ auth()->user()->name }}</p>
    <img src="{{ auth()->user()->avatar }}" alt="Avatar">
@endauth

@guest
    <a href="{{ route('login') }}">Login</a>
@endguest
```

---

## 9. Flash Messages in Layout

Add this once to your main layout file (`layouts/app.blade.php`):

```blade
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('status'))
    <div class="alert alert-info">{{ session('status') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

---

## 10. Environment Variables

```env
# Google OAuth (get from https://console.cloud.google.com/)
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

# Mail (for password reset emails)
MAIL_MAILER=log           # use 'log' for local dev, 'smtp' for production
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-user
MAIL_PASSWORD=your-mailtrap-pass
MAIL_FROM_ADDRESS="noreply@laundryq.com"
MAIL_FROM_NAME="LaundryQ"
```

---

## Setup Checklist

- [ ] Run `php artisan migrate`
- [ ] Create Blade views: `auth/login`, `auth/register`, `auth/forgot-password`, `auth/reset-password`
- [ ] Create `dashboard.blade.php`
- [ ] Set `GOOGLE_CLIENT_ID` and `GOOGLE_CLIENT_SECRET` in `.env`
- [ ] Add `http://localhost:8000/auth/google/callback` to **Authorised redirect URIs** in Google Cloud Console
- [ ] Configure `MAIL_*` for password reset emails
