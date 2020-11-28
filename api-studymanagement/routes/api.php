  <?php

  use App\User;
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


Route::prefix('v1')->group(function () {
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/register', 'Auth\RegisterController@register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::post('/time', 'TimeController@store');
        Route::get('/time', 'TimeController@index');

        Route::post('/subject', 'SubjectController@store');

        Route::post('/schedule', 'ScheduleController@store');

        Route::post('/plan', 'PlanController@store');
    });
});
