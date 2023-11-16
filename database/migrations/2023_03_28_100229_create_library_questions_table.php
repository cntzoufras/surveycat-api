<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('library_questions', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->foreignId('question_type_id')->constrained('question_types');
            });
        }
        
        /**
         * Reverse the migrations.
         */
        public function down(): void {
            
            Schema::table('library_questions', function (Blueprint $table) {
                $table->dropForeign(['question_type_id']);
            });
            Schema::dropIfExists('library_questions');
        }
    };
