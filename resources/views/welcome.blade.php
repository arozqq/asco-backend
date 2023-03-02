{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> --}}


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">  
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">  
  <title>Welcome To Cleopatra</title>
</head>
<body class="bg-gray-100">


<!-- start navbar -->
<div class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">
    
    <!-- logo -->
    <div class="flex-none w-56 flex flex-row items-center">
      <img src="img/logo.png" class="w-10 flex-none">
      <strong class="capitalize ml-1 flex-1">cleopatra</strong>

      <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
        <i class="fad fa-list-ul"></i>
      </button>
    </div>
    <!-- end logo -->   
    
    <!-- navbar content toggle -->
    <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
      <i class="fad fa-chevron-double-down"></i>
    </button>
    <!-- end navbar content toggle -->

    <!-- navbar content -->
    <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
      <!-- left -->
      <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-envelope-open-text"></i></a>        
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-comments-alt"></i></a>        
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-check-circle"></i></a>        
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-calendar-exclamation"></i></a>        
      </div>
      <!-- end left -->      

      <!-- right -->
      <div class="flex flex-row-reverse items-center"> 

        <!-- user -->
        <div class="dropdown relative md:static">

          <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
            <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="w-full h-full object-cover" src="img/user.svg" >
            </div> 

            <div class="ml-2 capitalize flex ">
              <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">moeSaid</h1>
              <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
            </div>                        
          </button>

          <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

          <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-user-edit text-xs mr-1"></i> 
              edit my profile
            </a>     
            <!-- end item -->

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-inbox-in text-xs mr-1"></i> 
              my inbox
            </a>     
            <!-- end item -->

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-badge-check text-xs mr-1"></i> 
              tasks
            </a>     
            <!-- end item -->

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-comment-alt-dots text-xs mr-1"></i> 
              chats
            </a>     
            <!-- end item -->

            <hr>

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-user-times text-xs mr-1"></i> 
              log out
            </a>     
            <!-- end item -->

          </div>
        </div>
        <!-- end user -->

        <!-- notifcation -->
        <div class="dropdown relative mr-5 md:static">

          <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
            <i class="fad fa-bells"></i>               
          </button>

          <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

          <div class="menu hidden rounded bg-white md:right-0 md:w-full shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
            <!-- top -->
            <div class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
              <h1>notifications</h1>
              <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
                <strong>5</strong>
              </div>
            </div>
            <hr>
            <!-- end top -->

            <!-- body -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

              <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                <i class="fad fa-birthday-cake text-sm"></i>
              </div>

              <div class="flex-1 flex flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">poll..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-right text-xs text-gray-500">
                  <p>4 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

              <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                <i class="fad fa-user-circle text-sm"></i>
              </div>

              <div class="flex-1 flex flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">mohamed..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-right text-xs text-gray-500">
                  <p>78 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

              <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                <i class="fad fa-images text-sm"></i>
              </div>

              <div class="flex-1 flex flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">new imag..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-right text-xs text-gray-500">
                  <p>65 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

              <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                <i class="fad fa-alarm-exclamation text-sm"></i>
              </div>

              <div class="flex-1 flex flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">time is up..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-right text-xs text-gray-500">
                  <p>1 min ago</p>
                </div>
              </div>

            </a>
            <!-- end item -->


            <!-- end body -->

            <!-- bottom -->
            <hr>
            <div class="px-4 py-2 mt-2">
              <a href="#" class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
                view all
              </a>
            </div>
            <!-- end bottom -->            
          </div>
        </div>
        <!-- end notifcation -->

        <!-- messages -->
        <div class="dropdown relative mr-5 md:static">

          <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
            <i class="fad fa-comments"></i>               
          </button>

          <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

          <div class="menu hidden md:w-full md:right-0 rounded bg-white shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
            <!-- top -->
            <div class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
              <h1>messages</h1>
              <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
                <strong>3</strong>
              </div>
            </div>
            <hr>
            <!-- end top -->

            <!-- body -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

              <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
                <img class="w-full h-full object-cover" src="img/user1.jpg" alt="">
              </div>

              <div class="flex-1 flex flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">mohamed said</h1>
                  <p class="text-xs text-gray-500">yeah i know</p>
                </div>
                <div class="text-right text-xs text-gray-500">
                  <p>4 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item --> 

            <!-- item -->
            <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

              <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
                <img class="w-full h-full object-cover" src="img/user2.jpg" alt="">
              </div>

              <div class="flex-1 flex flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">sull goldmen</h1>
                  <p class="text-xs text-gray-500">for sure</p>
                </div>
                <div class="text-right text-xs text-gray-500">
                  <p>1 day ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

              <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
                <img class="w-full h-full object-cover" src="img/user3.jpg" alt="">
              </div>

              <div class="flex-1 flex flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">mick</h1>
                  <p class="text-xs text-gray-500">is typing ....</p>
                </div>
                <div class="text-right text-xs text-gray-500">
                  <p>31 feb</p>
                </div>
              </div>

            </a>
            <!-- end item -->


            <!-- end body -->

            <!-- bottom -->
            <hr>
            <div class="px-4 py-2 mt-2">
              <a href="#" class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
                view all
              </a>
            </div>
            <!-- end bottom -->            
          </div>
        </div>
        <!-- end messages -->               


      </div>
      <!-- end right -->
    </div>
    <!-- end navbar content -->

  </div>
<!-- end navbar -->


<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">
  
    <!-- start sidebar -->
  <div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
    

    <!-- sidebar content -->
    <div class="flex flex-col">

      <!-- sidebar toggle -->
      <div class="text-right hidden md:block mb-4">
        <button id="sideBarHideBtn">
          <i class="fad fa-times-circle"></i>
        </button>
      </div>
      <!-- end sidebar toggle -->

      <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

      <!-- link -->
      <a href="./index.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-chart-pie text-xs mr-2"></i>                
        Analytics dashboard
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="./index-1.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-shopping-cart text-xs mr-2"></i>
        ecommerce dashboard
      </a>
      <!-- end link -->

      <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">apps</p>

      <!-- link -->
      <a href="./email.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-envelope-open-text text-xs mr-2"></i>
        email
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-comments text-xs mr-2"></i>
        chat
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-shield-check text-xs mr-2"></i>
        todo
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-calendar-edit text-xs mr-2"></i>
        calendar
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-file-invoice-dollar text-xs mr-2"></i>
        invoice
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-folder-open text-xs mr-2"></i>
        file manager
      </a>
      <!-- end link -->   
      
      
      <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">UI Elements</p>

      <!-- link -->
      <a href="./typography.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-text text-xs mr-2"></i>
        typography
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="./alert.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-whistle text-xs mr-2"></i>
        alerts
      </a>
      <!-- end link -->
      

      <!-- link -->
      <a href="./buttons.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-cricket text-xs mr-2"></i>
        buttons
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-box-open text-xs mr-2"></i>
        Content
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-swatchbook text-xs mr-2"></i>
        colors
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-atom-alt text-xs mr-2"></i>
        icons
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-club text-xs mr-2"></i>
        card
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-cheese-swiss text-xs mr-2"></i>
        Widgets
      </a>
      <!-- end link -->

      <!-- link -->
      <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-computer-classic text-xs mr-2"></i>
        Components
      </a>
      <!-- end link -->
      
      

    </div>
    <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->

  <!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 

    <!-- congrats & summary -->
    <div class="grid grid-cols-3 lg:grid-cols-1 gap-5">
      <!-- congrats -->
<div class="card col-span-1">

    <div class="card-body h-full flex flex-col justify-between">

        <div>
            <h1 class="text-lg font-bold tracking-wide">Congratulations Moe!</h1>
            <p class="text-gray-600 mt-2">Best seller of the month</p>
        </div>
    
        <div class="flex flex-row mt-10 items-end">
    
            <div class="flex-1">
                <h1 class="font-extrabold text-4xl text-teal-400">$89k</h1>
                <p class="mt-3 mb-4 text-xs text-gray-500">You have done 57.6% more sales today.</p>
                <a href="#" class="btn-shadow py-3">
                    view sales
                </a>
            </div>
    
            <div class="flex-1 ml-10 w-32 h-32 lg:w-auto lg:h-auto overflow-hidden">
                <img class="object-cover" src="img/congrats.svg">
            </div>
    
        </div>

    </div>
    
</div>
<!-- end congrats -->
      <div class="card p-0 overflow-hidden col-span-2 lg:col-span-1 flex flex-row lg:flex-col">
     
    <!-- right -->
    <div class="border-r border-gray-200 w-2/3 lg:w-full lg:mb-5">
        
        <!-- top -->
        <div class="p-5 flex flex-row flex-wrap justify-between items-center">
            <h2 class="font-bold text-lg">Order Summary</h2>
            <div class="flex flex-row justify-center items-center">
                <a href="#" class="btn mr-4 text-sm py-2 block">month</a>
                <a href="#" class="btn-shadow text-sm py-2 block">week</a>
            </div>
        </div>
        <!-- end top -->

        <!-- chart -->                
        <div id="SummaryChart"></div>
        <!-- end chart -->

    </div>
    <!-- end right -->

    <!-- left -->
    <div class="w-1/3 lg:w-full">
        
        <!-- top -->
        <div class="p-5 border-b border-gray-200">
            <h2 class="font-bold text-lg mb-6">Sales History</h2>

            <div class="flex flex-row justify-between mb-3">
                <div class="">
                    <h4 class="text-gray-600 font-thin">Puma Shoes</h4>
                    <p class="text-gray-400 text-xs font-hairline">30 min ago</p>
                </div>
                <div class="text-sm font-medium">
                    <span class="text-green-400">+</span> $250
                </div>
            </div>

            <div class="flex flex-row justify-between mb-3">
                <div class="">
                    <h4 class="text-gray-600 font-thin">Google Pixel 4 xl</h4>
                    <p class="text-gray-400 text-xs font-hairline">1 day ago</p>
                </div>
                <div class="text-sm font-medium">
                    <span class="text-red-400">-</span> $10
                </div>
            </div>
            
            <div class="flex flex-row justify-between">
                <div class="">
                    <h4 class="text-gray-600 font-thin">Nike Air Jordan</h4>
                    <p class="text-gray-400 text-xs font-hairline">2 hour ago</p>
                </div>
                <div class="text-sm font-medium">
                    <span class="text-red-400">-</span> $98
                </div>
            </div>

            

        </div>
        <!-- end top -->

        <!-- bottom -->
        <div class="p-5">
            <h2 class="font-bold text-lg mb-2">Sales History</h2>
            <strong class="text-teal-400 font-extrabold text-xl">$82,950.96</strong>

            <div class="bg-gray-300 h-2 rounded-full mt-2 relative">
                <div class="rounded-full bg-teal-400 h-full w-3/4 shadow-md"></div>
            </div>
        </div>
        <!-- end bottom -->

    </div>
    <!-- end left -->

</div>


      
    </div>
    <!-- end congrats & summary -->

    <!-- status -->
    <div class="grid grid-cols-5 gap-5 mt-5 lg:grid-cols-2">

    <!-- status -->
    <div class="card col-span-1">
        <div class="card-body">
            <h5 class="uppercase text-xs tracking-wider font-extrabold">today</h5>
            <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3"></span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2"></span> orders</span></h1>
            <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )</p>
        </div>
    </div>
    <!-- status -->

    <!-- status -->
    <div class="card col-span-1">
        <div class="card-body">
            <h5 class="uppercase text-xs tracking-wider font-extrabold">yesterday</h5>
            <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3"></span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2"></span> orders</span></h1>
            <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )</p>
        </div>
    </div>
    <!-- status -->

    <!-- status -->
    <div class="card col-span-1">
        <div class="card-body">
            <h5 class="uppercase text-xs tracking-wider font-extrabold">last week</h5>
            <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3"></span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2"></span> orders</span></h1>
            <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )</p>
        </div>
    </div>
    <!-- status -->

    <!-- status -->
    <div class="card col-span-1">
        <div class="card-body">
            <h5 class="uppercase text-xs tracking-wider font-extrabold">last month</h5>
            <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3"></span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2"></span> orders</span></h1>
            <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )</p>
        </div>
    </div>
    <!-- status -->

    <!-- status -->
    <div class="card col-span-1 lg:col-span-2">
        <div class="card-body">
            <h5 class="uppercase text-xs tracking-wider font-extrabold">last 90-days</h5>
            <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3"></span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2"></span> orders</span></h1>
            <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )</p>
        </div>
    </div>
    <!-- status -->
    
 
</div>
    <!-- end status -->

    <!-- best seller & traffic -->
    <div class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-5">
      <div class="card">

    <div class="card-body">
        <div class="flex flex-row justify-between items-center">
            <h1 class="font-extrabold text-lg">best sellers</h1>
            <a href="#" class="btn-gray text-sm">view all</a>
        </div>
    
        <table class="table-auto w-full mt-5 text-right">
    
            <thead>
                <tr>
                    <td class="py-4 font-extrabold text-sm text-left">product</td>
                    <td class="py-4 font-extrabold text-sm">price</td>
                    <td class="py-4 font-extrabold text-sm">sold</td>
                    <td class="py-4 font-extrabold text-sm">profit</td>
                </tr>
            </thead>
    
            <tbody>
    
                <!-- item -->
                <tr class="">
                    <td class="py-4 text-sm text-gray-600 flex flex-row items-center text-left">
                        <div class="w-8 h-8 overflow-hidden mr-3">
                            <img src="img/sneakers.svg" class="object-cover">
                        </div>
                        Sneakers and Tennis 
                    </td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-2"></span></td>
                    <td class="py-4 text-xs text-gray-600"><span class="num-3"></span></td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-4"></span></td>
                </tr>
                <!-- end item -->
    
                <!-- item -->
                <tr class="">
                    <td class="py-4 text-sm text-gray-600 flex flex-row items-center">
                        <div class="w-8 h-8 overflow-hidden mr-3">
                            <img src="img/socks.svg" class="object-cover">
                        </div>
                        Crazy Socks & Graphic Socks for Men
                    </td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-2"></span></td>
                    <td class="py-4 text-xs text-gray-600"><span class="num-3"></span></td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-4"></span></td>
                </tr>
                <!-- end item -->
    
                <!-- item -->
                <tr class="">
                    <td class="py-4 text-sm text-gray-600 flex flex-row items-center">
                        <div class="w-8 h-8 overflow-hidden mr-3">
                            <img src="img/soccer.svg" class="object-cover">
                        </div>
                        Adidas Soccer Ball
                    </td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-2"></span></td>
                    <td class="py-4 text-xs text-gray-600"><span class="num-3"></span></td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-4"></span></td>
                </tr>
                <!-- end item -->
    
                <!-- item -->
                <tr class="">
                    <td class="py-4 text-sm text-gray-600 flex flex-row items-center">
                        <div class="w-8 h-8 overflow-hidden mr-3">
                            <img src="img/food.svg" class="object-cover">
                        </div>
                        Best Chocolate Chip Cookies
                    </td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-2"></span></td>
                    <td class="py-4 text-xs text-gray-600"><span class="num-3"></span></td>
                    <td class="py-4 text-xs text-gray-600">$ <span class="num-4"></span></td>
                </tr>
                <!-- end item -->
    
            </tbody>
    
        </table>
    
    </div>
</div>
      <div class="card">    

    <div class="card-body">
        <h2 class="font-bold text-lg mb-10">Recent Orders</h2>
    
    <!-- start a table -->
    <table class="table-fixed w-full">
        
        <!-- table head -->
        <thead class="text-left">
            <tr>
                <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">customer</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Product</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Invoice</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">price</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">status</th>
            </tr>
        </thead>
        <!-- end table head -->

        <!-- table body -->
        <tbody class="text-left text-gray-600">

            <!-- item -->
            <tr>
                <!-- name -->
                <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                        <img src="img/user2.jpg" class="object-cover">
                    </div>
                    <p class="ml-3 name-1">user name</p>                    
                </th>
                <!-- name -->
                
                <!-- product -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                <!-- product -->

                <!-- invoice -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                <!-- invoice -->

                <!-- price -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                <!-- price -->

                <!-- status -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                <!-- status -->

            </tr>
            <!-- item -->


            <!-- item -->
            <tr>
                <!-- name -->
                <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                        <img src="img/user3.jpg" class="object-cover">
                    </div>
                    <p class="ml-3 name-1">user name</p>                    
                </th>
                <!-- name -->
                
                <!-- product -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                <!-- product -->

                <!-- invoice -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                <!-- invoice -->

                <!-- price -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                <!-- price -->

                <!-- status -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                <!-- status -->

            </tr>
            <!-- item -->


            <!-- item -->
            <tr>
                <!-- name -->
                <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                        <img src="img/user2.jpg" class="object-cover">
                    </div>
                    <p class="ml-3 name-1">user name</p>                    
                </th>
                <!-- name -->
                
                <!-- product -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                <!-- product -->

                <!-- invoice -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                <!-- invoice -->

                <!-- price -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                <!-- price -->

                <!-- status -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                <!-- status -->

            </tr>
            <!-- item -->

            <!-- item -->
            <tr>
                <!-- name -->
                <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                        <img src="img/user1.jpg" class="object-cover">
                    </div>
                    <p class="ml-3 name-1">user name</p>                    
                </th>
                <!-- name -->
                
                <!-- product -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                <!-- product -->

                <!-- invoice -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                <!-- invoice -->

                <!-- price -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                <!-- price -->

                <!-- status -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                <!-- status -->

            </tr>
            <!-- item -->

            <!-- item -->
            <tr>
                <!-- name -->
                <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                        <img src="img/user3.jpg" class="object-cover">
                    </div>
                    <p class="ml-3 name-1">user name</p>                    
                </th>
                <!-- name -->
                
                <!-- product -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                <!-- product -->

                <!-- invoice -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                <!-- invoice -->

                <!-- price -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                <!-- price -->

                <!-- status -->
                <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                <!-- status -->

            </tr>
            <!-- item -->            

            


        </tbody>
        <!-- end table body -->

    </table>
    <!-- end a table -->
    </div>

</div> 
          
    </div>
    <!-- end best seller & traffic -->
        

  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/scripts.js"></script>
<!-- end script -->

</body>
</html>
