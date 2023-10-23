<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class SurveyQuestionAnswer extends Model {
        
        use HasFactory;
        
        protected $guarded = ['uuid'];
        
        protected $fillable = [''];
    }
