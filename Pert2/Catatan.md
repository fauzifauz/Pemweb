Pemweb pertemuan 1

(09.00 - 12.00)

Materi hari ini :

* Docker
  - Apa itu docker ? Docker adalah platform untuk membuat, menjalankan, dan mengelola aplikasi dalam wadah (container) yang ringan, portabel, dan terisolasi.
  - Kenapa harus menggunakan docker ? Docker digunakan karena mempermudah deploy aplikasi dengan konsisten di berbagai lingkungan, meningkatkan portabilitas, efisiensi sumber daya, dan mempercepat pengembangan.
  - Buat analisis swot (5w 1h) !
    1. What (Apa): Docker adalah platform untuk membuat, mengemas, dan menjalankan aplikasi dalam container yang terisolasi.
    2. Why (Mengapa): Docker digunakan untuk meningkatkan portabilitas, efisiensi, dan kemudahan dalam proses deploy aplikasi.
    3. Who (Siapa): Docker digunakan oleh developer, sysadmin, DevOps, dan tim IT yang mengelola aplikasi.
    4. When (Kapan): Docker digunakan saat mengembangkan, menguji, dan menerapkan aplikasi di berbagai lingkungan.
    5. Where (Di mana): Docker digunakan di server lokal, cloud, atau lingkungan pengembangan lokal.
    6. How (Bagaimana): Docker bekerja dengan membuat container yang menjalankan aplikasi beserta dependensinya secara terisolasi.
  - Memakai docker di saat situasi dan kondisi seperti apa ? Saat membutuhkan deploy aplikasi yang cepat dan konsisten di berbagai lingkungan.

* Website
  - Apa itu website ? Website adalah kumpulan halaman web yang saling terhubung dan dapat diakses melalui internet menggunakan browser.
  - Contoh contoh website : 
  Website E-Commerce: Tokopedia, Amazon.
  Website Media Sosial: Facebook, Instagram.
  Website Berita: BBC, Kompas.
  Website Edukasi: Coursera, Khan Academy.
  Website Pemerintah: Indonesia.go.id, IRS.gov.
  - Fungsi website tuh apa ? fungsi webiste adalah untuk memudahkan akes informasi ke pada masyrakat yang di tuju dengan user interface yang mudah di gunakan.

* Project Pra Uts
  Membuat website per orang sesuai tema yang di kasih

* Porject akhir
  - Membuat website company profile, fitur/website harus sesuai dengan analisis dan harus sama dengan workflow, flowchart, dan usecase.
  - Tidak boleh copas isi code nya dengan orang lain
  
* Belajar Html
  - Apa itu html ? HTML (HyperText Markup Language) adalah bahasa markup yang digunakan untuk membuat struktur dan konten halaman web, seperti teks, gambar, dan tautan.

* nginx.conf

  server {
    listen 80; 
    server_name localhost; 
    
    location / { 
        root /usr/share/nginx/html;
        index index.html;
    }
  }

   - server : Bagian ini mendefinisikan satu virtual server di dalam Nginx. Virtual server memungkinkan Nginx melayani beberapa situs atau aplikasi dari satu server fisik.
   - listen 80; Ini memberitahu Nginx untuk mendengarkan koneksi HTTP pada port 80
   - server_name localhost; Baris ini menentukan nama domain atau alamat IP yang akan digunakan untuk mengakses server.
   - location /: Bagian ini menentukan bagaimana Nginx harus menangani permintaan ke URL yang diawali dengan /. Karena hanya tanda / yang ada di sini, maka semua permintaan ke root server (misalnya, http://localhost/) akan dicocokkan dengan blok ini.

  * docker-compose.yml 
    
    version: '3'

    services:

    web:
    image: nginx:latest
    ports: 
      - "80:80"
    volumes:
      - ./nginx/nginx.conf:/etc/nginx/conf.d/default.conf
      - ./src/:/usr/share/nginx/html 

   - Konfigurasi Docker Compose ini membuat service bernama web yang menjalankan container berbasis image nginx:latest.
   - Port 80 di host dihubungkan ke port 80 di container.
   - Volume pertama memetakan file konfigurasi lokal nginx.conf ke dalam container, dan volume kedua memetakan folder ./src/ ke direktori web server Nginx (/usr/share/nginx/html).

  (13.00 - 15.30)

  - Tag Html ? Tag HTML adalah elemen markup yang digunakan untuk membuat struktur halaman web.
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

  - Tugas : Membuat home dan profile
