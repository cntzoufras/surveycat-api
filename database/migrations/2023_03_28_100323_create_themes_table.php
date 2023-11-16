<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('themes', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('name');
                $table->string('description');
                $table->string('created_by');
                $table->timestamps();
                $table->foreignUuid('user_id')->constrained('users');
                $table->foreignUuid('theme_setting_id')->constrained('theme_settings');
            });
        }
        
        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::table('themes', function (Blueprint $table) {
                $table->dropForeign(['theme_setting_id']);
                $table->dropForeign(['user_id']);
            });
            Schema::dropIfExists('themes');
        }
    };
