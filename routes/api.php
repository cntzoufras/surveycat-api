<?php
    
    use App\Http\Controllers\Auth\AuthenticationController;
    use App\Http\Controllers\SurveyPageController;
    use App\Http\Resources\PostCollection;
    use App\Http\Controllers\SurveyTemplateController;
    use App\Http\Controllers\QuestionController;
    use App\Http\Resources\PostResource;
    use App\Models\Post;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    
    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */
    
    Route::controller(AuthenticationController::class)->group(function () {
        
        Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('logout', [AuthenticationController::class, 'logout']);
        Route::post('register', [AuthenticationController::class, 'register']);
        Route::post('refresh', [AuthenticationController::class, 'refresh']);
        Route::post('forgot-password', [AuthenticationController::class, 'forgot-password']);
        Route::post('reset-password', [AuthenticationController::class, 'reset-password']);
    });

//    Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts/{id}', function ($id) {
        return new PostResource(Post::findOrFail($id));
    });
    Route::get('/posts', function () {
        return PostResource::collection(Post::all());
    });
    Route::get('/posts-less-than-id-ten', function () {
        return new PostResource(Post::query()->where('id', '<', 10));
    });
    Route::prefix('SurveyTemplates')->group(function () {
        Route::get('/', [SurveyTemplateController::class, 'index']);
        Route::post('/', [SurveyTemplateController::class, 'store']);
        Route::get('/{id}', [SurveyTemplateController::class, 'show']);
    });
    Route::prefix('questions')->group(function () {
        Route::get('/', [QuestionController::class, 'index']);
        Route::post('/', [QuestionController::class, 'store']);
        Route::get('/{id}', [QuestionController::class, 'show']);
    });
    Route::prefix('survey-pages')->group(function () {
        Route::get('/', [SurveyPageController::class, 'index']);
        Route::post('/', [SurveyPageController::class, 'store']);
        Route::get('/{id}', [SurveyPageController::class, 'show']);
    });
    Route::get('/posts-collection', function () {
        return new PostCollection(Post::paginate());
    });
    
    Route::post('/posts', 'App\Http\Controllers\PostController@store');
    
    // Functionality
    
    // Products
    Route::get('/products/{product}', function ($id) {
        return response()->json(['productId' => "{$id}"], 201);
    });
    
    Route::get('/products', function () {
        return response()->json([
            'message' => 'msg: Products',
        ], 201);
    });
    
    Route::put('/products/{product}', function () {
        return response()->json([
            'message' => 'Update success',
        ], 200);
    });
    
    Route::delete('/products/{product}', function () {
        return response()->json(null, 204);
    });
    //    });
    
    //    Route::middleware('auth:api')->get('/user', function (Request $request) {
    //        return $request->user();
    //    });
    

