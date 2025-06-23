   <?php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       /**
        * Jalankan migrasi.
        */
       public function up(): void
       {
           Schema::create('user_models', function (Blueprint $table) {
               $table->id(); // Kunci utama
               $table->string('nama'); // Kolom untuk nama mahasiswa
               $table->string('npm')->unique(); // Kolom untuk NPM, harus unik
               $table->foreignId('kelas_id')->constrained('kelas'); // Kolom untuk kelas, mengacu pada tabel kelas
               $table->string('foto')->nullable(); // Kolom untuk foto, bisa null
               $table->timestamps(); // Kolom untuk created_at dan updated_at
           });
       }

       /**
        * Balikkan migrasi.
        */
       public function down(): void
       {
           Schema::dropIfExists('user_models');
       }
   };
   