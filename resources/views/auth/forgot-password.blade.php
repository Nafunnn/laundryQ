<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-gray-50">
        <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
            <div class="max-w-[480px] w-full">
                <img src="{{ asset('images/laundryq.png') }}" alt="logo" class="w-90 mb-2 mx-auto block" />
                <div class="p-6 sm:p-8 rounded-2xl bg-white border border-gray-200 shadow-sm">
                    <h1 class="text-slate-900 text-center text-3xl font-semibold">Forgot Password</h1>
                    <br>
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p>Kami akan mengirimkan link untuk reset kata sandi kamu melalui email</p>
                    </div>
                    <form class="mt-5 space-y-6" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <label class="text-slate-900 text-sm font-medium mb-2 block">Email</label>
                            <div class="relative flex items-center">
                                <input name="email" type="email" required
                                    class="w-full text-slate-900 text-sm border border-slate-300 px-4 py-3 pr-8 rounded-md outline-blue-600"
                                    value="{{ old('email') }}" placeholder="Masukan email anda" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                            @include('layout.error', ['field' => 'email'])
                            @if (session('status'))
                                <div class="alert-success">{{ session('status') }}</div>
                            @endif
                        </div>
                        <div class="!mt-12">
                            <button type="submit"
                                class="w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer">
                                Send Reset Link
                            </button>
                        </div>
                        <a href = "{{ route('login') }}">
                            <h1 class="text-center text-red-500">Back to Login</h1>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
