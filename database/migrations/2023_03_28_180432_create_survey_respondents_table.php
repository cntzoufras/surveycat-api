<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('survey_respondents', function (Blueprint $table) {
                $table->uuid('id')->primary()->index();
                $table->string('email')->nullable();
                $table->jsonb('details');
                $table->string('ip_address');
                $table->string('device');
                $table->timestamps();
            });
        }
        
        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::dropIfExists('survey_respondents');
        }
    };
