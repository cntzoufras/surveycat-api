<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('survey_question_options', function (Blueprint $table) {
                $table->id();
                $table->jsonb('settings'); // e.g. type like dropdown, or radio, or text
                $table->timestamps();
                $table->foreignUuId('survey_question_id')->references('id')->on('survey_questions')->onDelete('cascade');
            });
        }
        
        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::dropIfExists('survey_question_options');
        }
    };
