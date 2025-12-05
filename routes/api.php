use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

// Gunakan middleware 'auth:sanctum' untuk melindungi endpoint API
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('tasks', TaskController::class);
});