<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->enum('roles', ['user', 'admin']);
            $table->string('email');
            $table->string('password');
            $table->foreignId('logo')->constrained('file');
            $table->string('status')->nullable();
            $table->string('catchphrase');
            $table->string('description');
            $table->foreignId('video')->nullable()->constrained('files');
            $table->string('profile_type')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitch')->nullable();
            $table->string('discord')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('others')->nullable();
            $table->string('form')->nullable();
            $table->text('projects');
            $table->foreignId('thumbnail')->nullable()->constrained('files');
            $table->boolean('validated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associations');
    }
};
