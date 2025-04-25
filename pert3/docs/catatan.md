# Setup

1. **Buat Dan build Docker Composenya**  
   ```yml
   services:
     pemweb:
       build: ./php
       image: pemweb_php:latest
       container_name: pemweb
       hostname: "pemweb"
       volumes:
         - ./src:/var/www/html
         - ./php/www.conf:/usr/local/etc/php-fpm.d/www.conf
       working_dir: /var/www/html
       depends_on:
         - db_pemweb
     db_pemweb:
       image: mariadb:10.2
       container_name: db_pemweb
       restart: unless-stopped
       tty: true
       ports:
         - "13306:3306"
       volumes:
         - ./db/data:/var/lib/mysql
         - ./db/conf.d:/etc/mysql/conf.d:ro
       environment:
         MYSQL_USER: djambred
         MYSQL_PASSWORD: p455w0rd1!.
         MYSQL_ROOT_PASSWORD: p455w0rd
         TZ: Asia/Jakarta
         SERVICE_TAGS: dev
         SERVICE_NAME: mysql_pemweb
     nginx_pemweb:
       build: ./nginx
       image: nginx_pemweb:latest
       container_name: nginx_pemweb
       hostname: "nginx_pemweb"
       ports:
         - "80:80"
       volumes:
         - ./src:/var/www/html
         - ./nginx/nginx.conf:/etc/nginx/conf.d/default.conf
       depends_on:
         - pemweb
   ```

   setelah bikin compose nya build dengan command
   ```bash
   docker compose up -d --build
   ```

2. **Exec container Pemweb**
    ```bash
    docker exec -it pemweb bash
    ```

3. **Buat Proyek Laravel**
   Gunakan Composer untuk membuat proyek  baru:
   ```bash
   composer create-project --prefer-dist raugadh/fila-starter .
   ```

6. **Selanjutnya Buka .env dan lakukan configurasi berikut**
    - ubah bagian APP_NAME, APP_URL,dan ASSET_URL menjadi sperti berikut
    ```bash
    APP_NAME="PemWeb"
    APP_URL=http://localhost
    ASSET_URL=http://localhost
    ```

7. **Lalu set DB connection nya seperti ini**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=db_pemweb
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=p455w0rd
    ```

8. **Lalu generate key dengan command ini**
    ```bash
    php artisan key:generate
    ```

9. **Lalu lakukan command storage:link**
    ```bash
    php artisan storage:link
    ```

10. **Setelah itu migrate dan migrate fresh**
    ```bash
    php artisan migrate
    php artisan migrate:fresh
    ```

11. **Lakukan Generate shield sebelum seed**
    ```bash
    php artisan shield:generate --all
    ```

12. **Lalu lakukan db seed**
    ```bash
    php artisan db:Seed --force
    ```

    jika error biarin aja, `--force` optional.

13. **lalu setelah itu lakukan init**
    ```bash
    php artisan project:init
    ```

14. **Terakhir itu chmod storage dan bootstrap**
    ```bash 
    chmod 777 -R storage/* && chmod 777 -R bootstrap/*
    ```

# Configurasi Livewire/laravelnya

1. **Pergi ke folder Public lalu buat folder baru bernama front dan copy folder `css`,`images`,`js`,dan `plugin` ke folder yang baru dibuat tadi, contohnya seperti ini.

```bash
public/
├── front
│     └──css/
│        images/
│          └──Phone-theme.jpg -contoh isi folder
├─────── js/
├─────── plugins/
```

2. lalu di folder recources dan di dalam folder view buat struktur seperti ini

```bash
resources/
├── css/ -bawaan
├── js/  -bawaan
├── views/
│   ├── components/ -di dalam views
│   │   └── layouts/ -di dalam components
│   │     └──app.blade.php
│   ├── livewire/ -di dalam view
│            └──show-home-page.blade.php
├─ welcome.blade.php
```
3. di bagian app.blade.php Buat agar jadi seperti inibagian bagian ini

```html
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>{{ $title ?? 'PemWeb' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link rel="shortcut icon" href="{{ asset ('front/images/favicon.png') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset ('front/images/favicon.png') }}" type="image/x-icon">

	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- # CSS Plugins -->
	<link rel="stylesheet" href="{{ asset ('front/plugins/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset ('front/plugins/font-awesome/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('front/plugins/font-awesome/brands.css') }}">
	<link rel="stylesheet" href="{{ asset ('front/plugins/font-awesome/solid.css') }}">

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="{{ asset ('front/css/style.css') }}">
    @livewireStyles
</head>

<body>

<!-- navigation -->
<header class="navigation bg-tertiary">
	<nav class="navbar navbar-expand-xl navbar-light text-center py-3">
		<div class="container">
			<a class="navbar-brand" href="{{ route ('home') }}">
				<img loading="prelaod" decoding="async" class="img-fluid" width="160" src="{{ asset ('front/images/logo.png') }}" alt="Wallet">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav m-auto mb-2 mb-lg-0">
					<li class="nav-item"> <a wire:navigate class="nav-link" href="{{ route ('home') }}">Home</a></li>
					<li class="nav-item"> <a wire:navigate class="nav-link" href="{{ route ('profile') }}">Profile</a></li>
				</ul>			
			</div>
		</div>
	</nav>
</header>
<!-- /navigation -->

{{ $slot }}

<footer class="section-sm bg-tertiary">
	<div class="container">
		<div class="container d-flex justify-content-center">
            <a wire:navigate href="{{ route ('home') }}"> Copyright 2025</a>
        </div>
	</div>
</footer>

<!-- # JS Plugins -->
<script src="{{ asset ('front/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset ('front/plugins/bootstrap/bootstrap.min.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset ('front/js/script.js') }}"></script>
@livewireScripts
</body>
</html>
```

4. lalu di welcome.blade.php ubah di bagian menjadi

```php
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
```

5. lalu buat 1 file show home-page.blade.php isinya seperti ini

```php
<main>
<section class="banner bg-tertiary position-relative overflow-hidden">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="block text-center text-lg-start pe-0 pe-xl-5">
          <h1 class="text-capitalize mb-4">Innovate. Excel. Succeed!</h1>
          <p class="mb-4">Unlocking Potential, Igniting Excellence</p> <a type="button"
            class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#applyLoan">See More<span style="font-size: 14px;" class="ms-2 fas fa-arrow-right"></span></a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="ps-lg-5 text-center">
          <img loading="lazy" decoding="async"
            src="{{ asset ('front/images/about-us.png') }}"
            alt="banner image" class="w-100">
        </div>
      </div>
    </div>
  </div>
  <div class="has-shapes">
    <svg class="shape shape-left text-light" viewBox="0 0 192 752" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M-30.883 0C-41.3436 36.4248 -22.7145 75.8085 4.29154 102.398C31.2976 128.987 65.8677 146.199 97.6457 166.87C129.424 187.542 160.139 213.902 172.162 249.847C193.542 313.799 149.886 378.897 129.069 443.036C97.5623 540.079 122.109 653.229 191 728.495"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M-55.5959 7.52271C-66.0565 43.9475 -47.4274 83.3312 -20.4214 109.92C6.58466 136.51 41.1549 153.722 72.9328 174.393C104.711 195.064 135.426 221.425 147.449 257.37C168.829 321.322 125.174 386.42 104.356 450.559C72.8494 547.601 97.3965 660.752 166.287 736.018"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M-80.3302 15.0449C-90.7909 51.4697 -72.1617 90.8535 -45.1557 117.443C-18.1497 144.032 16.4205 161.244 48.1984 181.915C79.9763 202.587 110.691 228.947 122.715 264.892C144.095 328.844 100.439 393.942 79.622 458.081C48.115 555.123 72.6622 668.274 141.552 743.54"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M-105.045 22.5676C-115.506 58.9924 -96.8766 98.3762 -69.8706 124.965C-42.8646 151.555 -8.29436 168.767 23.4835 189.438C55.2615 210.109 85.9766 236.469 98.0001 272.415C119.38 336.367 75.7243 401.464 54.9072 465.604C23.4002 562.646 47.9473 675.796 116.838 751.063"
        stroke="currentColor" stroke-miterlimit="10" />
    </svg>
    <svg class="shape shape-right text-light" viewBox="0 0 731 746" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M12.1794 745.14C1.80036 707.275 -5.75764 666.015 8.73984 629.537C27.748 581.745 80.4729 554.968 131.538 548.843C182.604 542.703 234.032 552.841 285.323 556.748C336.615 560.64 391.543 557.276 433.828 527.964C492.452 487.323 511.701 408.123 564.607 360.255C608.718 320.353 675.307 307.183 731.29 327.323"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M51.0253 745.14C41.2045 709.326 34.0538 670.284 47.7668 635.783C65.7491 590.571 115.623 565.242 163.928 559.449C212.248 553.641 260.884 563.235 309.4 566.931C357.916 570.627 409.887 567.429 449.879 539.701C505.35 501.247 523.543 426.331 573.598 381.059C615.326 343.314 678.324 330.853 731.275 349.906"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M89.8715 745.14C80.6239 711.363 73.8654 674.568 86.8091 642.028C103.766 599.396 150.788 575.515 196.347 570.054C241.906 564.578 287.767 573.629 333.523 577.099C379.278 580.584 428.277 577.567 465.976 551.423C518.279 515.172 535.431 444.525 582.62 401.832C621.964 366.229 681.356 354.493 731.291 372.46"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M128.718 745.14C120.029 713.414 113.678 678.838 125.837 648.274C141.768 608.221 185.939 585.788 228.737 580.659C271.536 575.515 314.621 584.008 357.6 587.282C400.58 590.556 446.607 587.719 482.028 563.16C531.163 529.111 547.275 462.733 591.612 422.635C628.572 389.19 684.375 378.162 731.276 395.043"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M167.564 745.14C159.432 715.451 153.504 683.107 164.863 654.519C179.753 617.046 221.088 596.062 261.126 591.265C301.164 586.452 341.473 594.402 381.677 597.465C421.88 600.527 464.95 597.872 498.094 574.896C544.061 543.035 559.146 480.942 600.617 443.423C635.194 412.135 687.406 401.817 731.276 417.612"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M817.266 289.466C813.108 259.989 787.151 237.697 759.261 227.271C731.372 216.846 701.077 215.553 671.666 210.904C642.254 206.24 611.795 197.156 591.664 175.224C555.853 136.189 566.345 75.5336 560.763 22.8649C552.302 -56.8256 498.487 -130.133 425 -162.081"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M832.584 276.159C828.427 246.683 802.469 224.391 774.58 213.965C746.69 203.539 716.395 202.246 686.984 197.598C657.573 192.934 627.114 183.85 606.982 161.918C571.172 122.883 581.663 62.2275 576.082 9.55873C567.62 -70.1318 513.806 -143.439 440.318 -175.387"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M847.904 262.853C843.747 233.376 817.789 211.084 789.9 200.659C762.011 190.233 731.716 188.94 702.304 184.292C672.893 179.627 642.434 170.544 622.303 148.612C586.492 109.577 596.983 48.9211 591.402 -3.74766C582.94 -83.4382 529.126 -156.746 455.638 -188.694"
        stroke="currentColor" stroke-miterlimit="10" />
      <path
        d="M863.24 249.547C859.083 220.07 833.125 197.778 805.236 187.353C777.347 176.927 747.051 175.634 717.64 170.986C688.229 166.321 657.77 157.237 637.639 135.306C601.828 96.2707 612.319 35.6149 606.738 -17.0538C598.276 -96.7443 544.462 -170.052 470.974 -202"
        stroke="currentColor" stroke-miterlimit="10" />
    </svg>
  </div>
</section>

</main>
```
dan jangan lupa pada bagian src image ubah menjadi asset seperti ini
```html
<div class="col-lg-6">
        <div class="ps-lg-5 text-center">
          <img loading="lazy" decoding="async"
            src="{{ asset ('front/images/about-us.png') }}"
            alt="banner image" class="w-100">
        </div>
      </div>
```
6. setelah semuanya kita pindah ke folder `App`, dan buat folder baruu dengan nama `Livewire`, sperti ini

```php
app/
├── Livewire/
│   └── isi
```
7. lalu buat file php ShowHomePage.php dan isinya seperti ini
```php
<?php

namespace App\Livewire;

use Livewire\Component;

class ShowHomePage extends Component{

    public function render()
    {
        return view('livewire.show-home-page');
    }
}
```

8. setelah itu pergi ke routes dan buka file web.php, lalu tambahkan code yang dibawah ini

```php
<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Livewire\ShowHomePage;

Route::get('/',ShowHomePage::class)->name('home');

```

9. lalu di app.blade.php tambahkan ini
```html
<li class="nav-item"> <a wire:navigate class="nav-link" href="{{ route ('home') }}">Home</a></li>
```
