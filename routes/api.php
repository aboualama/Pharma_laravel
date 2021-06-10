<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PharmaController;
use LdapRecord\Models\ActiveDirectory\User;
use App\Http\Controllers\Auth\UserController;



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


Route::group(['middleware' => ['api']], function () {


    Route::post('login', [UserController::class,'login']);

    Route::get('/pharmacies', [PharmaController::class,'getall']);
    Route::post('/pharmacies', [PharmaController::class,'index']);
    Route::post('/pharmacy', [PharmaController::class,'store']);
    Route::get('/pharmacy/{id}', [PharmaController::class,'show']);
    Route::post('/pharmacy/{id}', [PharmaController::class,'update']);
    Route::delete('/pharmacy/{id}', [PharmaController::class,'destroy']);

    Route::get('/medicines', [MedicineController::class,'index']);
    Route::post('/medicine', [MedicineController::class,'store']);
    Route::get('/medicine/{id}', [MedicineController::class,'show']);
    Route::put('/medicine/{id}', [MedicineController::class,'update']);
    Route::delete('/medicine/{id}', [MedicineController::class,'destroy']);

    Route::get('/payment_requests', [PaymentRequestController::class,'index']);
    Route::post('/payment_request', [PaymentRequestController::class,'store']);
    Route::get('/payment_request/{id}', [PaymentRequestController::class,'show']);
    Route::put('/payment_request/{id}', [PaymentRequestController::class,'update']);
    Route::delete('/payment_request/{id}', [PaymentRequestController::class,'destroy']);
    Route::post('/newPaymentRdr', [PaymentRequestController::class,'newPaymentRdr']);
});




Route::group(['middleware' => ['auth', 'verified']], function () {


    // Route::get('/', function () {
    //     return Route::app->version();
    // });

    Route::get('/test', function () {

        $ldapDomain = "@ccm.local"; 			// set here your ldap domain
        $ldapHost = "ldap://ldap.ieo.it"; 	// set here your ldap host
        $ldapPort = "389"; 						// ldap Port (default 389)
        $ldapUser  = "f.castiglioni"; 						// ldap User (rdn or dn)
        $ldapPassword = 'Ot732$ccm'; 					// ldap associated Password

        $successMessage = "";
        $errorMessage = "";

       // connect to ldap server
        $ldapConnection = ldap_connect($ldapHost, $ldapPort)
        or die("Could not connect to Ldap server.");
        if ($ldapConnection)
        {
            // binding to ldap server
            $ldapbind = @ldap_bind($ldapConnection, $ldapUser.$ldapDomain, $ldapPassword);

            // verify binding
            if ($ldapbind)
            {
                return "LDAP bind successful...";
            }
            else
            {
                return "LDAP bind failed...";
            }
        }else {
            return "errore connection";
        }
        ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
        ldap_set_option($ldapConnection, LDAP_OPT_REFERRALS, 0);
        $ldapbind = @ldap_bind($ldapConnection, $ldapUser.$ldapDomain , $ldapPassword);
        if ($ldapbind){
            ldap_close($ldapConnection);	// close ldap connection
            return "Login done correctly!!";
        }
        else
            return "Invalid credentials!";



        /*try {
            $ldapUsers =  User::get();
            return $ldapUsers;

        } catch (Exception $e) {

            return '<pre>'.$e.'</pre>';
        }*/
    });








});
