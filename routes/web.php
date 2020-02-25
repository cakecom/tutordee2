<?php

use App\Mail\Newjob;
use App\Mail\NewjobsMail;
use App\Mail\WelcomeMail;
use App\Models\Subject;
use App\Models\Group;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

Route::get('/password',function (){
    $hashed_random_password = Hash::make(str_random(8));
    echo $hashed_random_password;

});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/sendmail',function (){
    Artisan::call('queue:listen');
//    $details['email'] = 'cakecpe@gmail.com';
//    $dataMail=[
//        'name'=>'cake',
//        'subject'=>'thai',
//        'province'=>'แพร่',
//        'survey_id'=>3
//    ];
//    dispatch(new App\Jobs\SendEmailJob($details,$dataMail));
//
//    dd('done');
//    $dataMail=[
//        'name'=>'cake',
//        'subject'=>'thai',
//        'province'=>'แพร่',
//        'survey_id'=>3
//    ];
//    $when = now()->addSeconds(5);
//    Mail::to('cakecpe@gmail.com')
//        ->later($when,new NewjobsMail($dataMail));
//    return "wait 5 seconds";

});
Route::get('/wallets',function (){
//    return view('pages.user.wallet.omise');
   $user = User::first();
   dd($user);
    $user->deposit(10);
    $a= $user->balance; // int(0)
    echo $a;

});
Route::get('/tran',function (){
    $user = User::find(1)->transaction;

    dd($user);

});
Route::get('/test_insert',function (){
   $group=\App\Models\Group::findOrFail(2);
   $subject=new \App\Models\Subject(['subject_name'=>'php']);
   $group->subject()->save($subject);
});
// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/termsService',function (){
        return view('pages.guest.TermsService');
    });
    Route::get('/privacy',function (){
        return view('pages.guest.privacyPolicy');
    });
    Route::get('/refund',function (){
        return view('pages.guest.refundPolicy');
    });
    Route::get('/cancel',function (){
        return view('pages.guest.cancelationPolicy');
    });
    Route::resource('/user', 'WelcomeController');
    Route::resource('/service', 'ServiceController');
    Route::resource('/help', 'ReportProblemController');
    Route::resource('/tutor-profile','TutorController');
    Route::get('/', 'WelcomeController@welcome')->name('welcome');
    Route::get('/survey', 'WelcomeController@survey')->name('survey');
    Route::post('/survey/fetch', 'WelcomeController@fetch')->name('fetch');
    Route::post('/fetch', 'WelcomeController@fetch2')->name('fetch2');

});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'UserController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource('/customer', 'CustomerController');
    Route::resource('/auth-document', 'AuthDocumentController');
    Route::resource('/wallet', 'WalletController');
    Route::resource('/review','ReviewController');
    Route::resource('gallery','GalleryController');
    Route::resource('/promptpay', 'PromptpayController');
    Route::get('/type-wallets','WalletController@type_wallets')->name('type_wallets');
    Route::get('/payments','WalletController@pay_card')->name('pay_card');
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);
    Route::resource('/tutor', 'Tutor_managementController', [
        'only' => [
            'index',
        ],
    ]);

    Route::resource('/group', 'GroupController');
    Route::resource('/checkwallet', 'CheckWalletController');
    Route::resource('/check-doc', 'CheckDocumentController');
    Route::resource('/subject', 'SubjectController');
    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::get('active-users', 'AdminDetailsController@activeUsers');
});

Route::redirect('/php', '/phpinfo', 301);
