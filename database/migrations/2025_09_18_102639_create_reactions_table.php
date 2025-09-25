// PASTE THIS INTO THE create_reactions_table.php FILE
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('type')->default('like');
            $table->timestamps();
            $table->unique(['user_id', 'post_id']); // Prevent duplicate reactions
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};