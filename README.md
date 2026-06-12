Nama: Setyo Pratama Putra Wibowo
NIM: 240605110090

Tentang Aplikasi
Bosan scroll media sosial tapi nggak dapat konten yang bermutu? Aplikasi ini hadir sebagai ruang baca dan tulis yang lebih bermakna. Blog berbasis Laravel ini memungkinkan kamu untuk membaca artikel dari berbagai penulis maupun mempublikasikan tulisanmu sendiri — simpel, ringan, dan langsung ke intinya.

Cara Menjalankan di Lokal
Prasyarat: Pastikan sudah install PHP, Composer, Node.js, MySQL/XAMPP, dan Git.
1. Clone & masuk ke folder project
bashgit clone https://github.com/SPPW001/UASWebProgramming.git
cd UASWebProgramming
2. Install dependency
bashcomposer install
npm install && npm run dev
3. Generate app key
bashphp artisan key:generate
4. Setup database

Buat database baru db_blog, lalu sesuaikan file .env:
envDB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=

5. Migrasi & seeding
bashphp artisan migrate:fresh --seed

7. Jalankan server
bashphp artisan serve
Buka browser dan akses: http://127.0.0.1:8000

Demonstrasi Video
[🎬 Tautan YouTube.](https://youtu.be/Qgp5q5EGq-s)
