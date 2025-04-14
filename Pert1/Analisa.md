Analisa pada pembelajaran hari ini meliputi :

*Docker*
Mengetahui apa itu docker ? Docker adalah platform untuk membuat, menjalankan, dan mengelola aplikasi dalam wadah (container) yang ringan, portabel, dan terisolasi.

Kenapa harus menggunakan docker ? Docker digunakan karena mempermudah deploy aplikasi dengan konsisten di berbagai lingkungan, meningkatkan portabilitas, efisiensi sumber daya, dan mempercepat pengembangan.

Memakai docker di saat situasi dan kondisi seperti apa ? Saat membutuhkan deploy aplikasi yang cepat dan konsisten di berbagai lingkungan.

Swot (5w1h)
1. What (Apa): Docker adalah platform untuk membuat, mengemas, dan menjalankan aplikasi dalam container yang terisolasi.
2. Why (Mengapa): Docker digunakan untuk meningkatkan portabilitas, efisiensi, dan kemudahan dalam proses deploy aplikasi.
3. Who (Siapa): Docker digunakan oleh developer, sysadmin, DevOps, dan tim IT yang mengelola aplikasi.
4. When (Kapan): Docker digunakan saat mengembangkan, menguji, dan menerapkan aplikasi di berbagai lingkungan.
5. Where (Di mana): Docker digunakan di server lokal, cloud, atau lingkungan pengembangan lokal.
6. How (Bagaimana): Docker bekerja dengan membuat container yang menjalankan aplikasi beserta dependensinya secara terisolasi.

*Website*
Apa itu website ? Website adalah kumpulan halaman web yang saling terhubung dan dapat diakses melalui internet menggunakan browser.

Fungsi website tuh apa ? fungsi webiste adalah untuk memudahkan akes informasi ke pada masyrakat yang di tuju dengan user interface yang mudah di gunakan.

Contoh contoh website : 
  Website E-Commerce: Tokopedia, Amazon.
  Website Media Sosial: Facebook, Instagram.
  Website Berita: BBC, Kompas.
  Website Edukasi: Coursera, Khan Academy.
  Website Pemerintah: Indonesia.go.id, IRS.gov.

*Html*
Apa itu html ? HTML (HyperText Markup Language) adalah bahasa markup yang digunakan untuk membuat struktur dan konten halaman web, seperti teks, gambar, dan tautan.

Fungsi HTML (HyperText Markup Language) meliputi:
Membuat Struktur Halaman Web:
HTML berfungsi untuk menentukan elemen-elemen dasar seperti heading, paragraf, daftar, tabel, gambar, dan lainnya.
Menampilkan Konten di Browser:
HTML memungkinkan teks, gambar, video, audio, dan elemen multimedia lainnya untuk ditampilkan pada halaman web.
Membuat Link atau Hyperlink:
HTML digunakan untuk menghubungkan halaman satu dengan halaman lainnya melalui tag <a> (hyperlink).
Mendukung Formulir Input:
HTML menyediakan elemen formulir seperti kotak teks, tombol, checkbox, dan radio button untuk pengumpulan data dari pengguna.
Menghubungkan dengan CSS dan JavaScript:
HTML bertindak sebagai struktur dasar yang dapat diatur tampilannya menggunakan CSS dan diberikan fungsionalitas tambahan melalui JavaScript.
Mengatur Atribut dan Metadata:
HTML memungkinkan pengaturan metadata, seperti judul halaman (<title>).

Tag Html ? Tag HTML adalah elemen markup yang digunakan untuk membuat struktur halaman web.
  - Macam macam tag html :
    Tag Struktur Dasar:
    <html>: Menentukan dokumen HTML.
    <head>: Berisi informasi (seperti judul, link CSS, dll.).
<   <body>: Berisi konten utama yang akan terlihat di halaman web.
    Tag Heading dan Paragraf:
    <h1> hingga <h6>: Membuat heading (judul) dari ukuran besar ke kecil.
    <p>: Membuat paragraf.
    Tag Teks dan Format:
    <b>: Menebalkan teks.
    <i>: Memiringkan teks.
    <u>: Menggarisbawahi teks.
    <br>: Membuat baris baru.
    Tag Tabel:
    <table>: Membuat tabel.
    <tr>: Membuat baris dalam tabel.
    <td>: Membuat sel data dalam tabel.
    <th>: Membuat sel header.
    Tag Daftar:
    <ul>: Membuat daftar tidak berurutan (bulleted list).
    <ol>: Membuat daftar berurutan (numbered list).
    <li>: Item dalam daftar.
    Tag Link dan Gambar:
    <a>: Membuat hyperlink.
    <img>: Menambahkan gambar.
    Tag Formulir:
    <form>: Membuat formulir input.
    <input>: Membuat berbagai elemen input (teks, tombol, dll.).
    <button>: Membuat tombol.
    <label>: Menyediakan label untuk input.

*nginx.conf*
server {
    listen 80; //Server mendengarkan permintaan HTTP pada port 80.
    server_name localhost; //Menetapkan nama server sebagai localhost.

    root /usr/share/nginx/html; //Menentukan direktori root tempat file web disimpan.
        index index.html index.htm; //Menentukan file yang dijadikan halaman utama (default).

    location / {
        try_files $uri $uri/ =404;
    }

    location /latihan { //Mengatur rute /latihan dengan ke direktori /usr/share/nginx/html/latihan
        alias /usr/share/nginx/html/latihan;
        index index.html index.htm home.html;
        try_files $uri $uri.html $uri/ =404;
    }
}

*env*
COMPOSE_PROJECT_NAME= fauzi //nama project docker saya setelah di build
REPOSITORY_NAME= pemweb
IMAGE_TAG=lates

*docker-compose.yml*
version: '3'

services:

  web:
    image: nginx:latest
    ports:
      - 80:80 //memisahkan antara ports di locall host dan di docker
    volumes: //tempat di mana folder yang di gunakan bisa di tampilkan
      - ./nginx/nginx.conf:/etc/nginx/conf.d/default.conf
      - ./src:/usr/share/nginx/html
      - ./latihan:/usr/share/nginx/html/latihan 

      