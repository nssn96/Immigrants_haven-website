<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginhtml', function () {
    return view('loginhtml');
});
Route::get('/signuphtml', function () {
    return view('signuphtml');
});


Route::get('/services', function () {
    return view('services');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/contactus', function () {
    return view('contactus');
});
/**Route::get('/temples', function () {
    return view('temples');
});
Route::get('/restaurants', function () {
    return view('restaurants');
});**/
Route::get('/payment', function () {
    return view('payment');
});

Route::get('superadmindashboard',[App\Http\Controllers\registercontroller::class, 'superadmindashboard']);
Route::get('adminpercountrydashboard',[App\Http\Controllers\registercontroller::class, 'adminpercountrydashboard']);

Route::GET('barchart',[App\Http\Controllers\registercontroller::class, 'barchart']);

Route::GET('piechart',[App\Http\Controllers\registercontroller::class, 'piechart']);

Route::POST('submit',[App\Http\Controllers\registercontroller::class, 'registerdetails']);
Route::POST('check',[App\Http\Controllers\registercontroller::class, 'validaterequest']);
Route::POST('tipssubmit',[App\Http\Controllers\registercontroller::class, 'addtip']);
Route::POST('tipssearch',[App\Http\Controllers\registercontroller::class, 'searchtips']);
Route::GET('Immigranttipshtml',[App\Http\Controllers\registercontroller::class, 'gettips']);
Route::GET('contributionshtml',[App\Http\Controllers\registercontroller::class, 'getcontributions']);
Route::POST('addcontributions',[App\Http\Controllers\registercontroller::class, 'addcontribution']);
Route::POST('contributionsearch',[App\Http\Controllers\registercontroller::class, 'searchcontributions']);
Route::GET('schoolshtml',[App\Http\Controllers\registercontroller::class, 'getschools']);
Route::POST('searchschool',[App\Http\Controllers\registercontroller::class, 'searchschool']);
Route::GET('hospitalshtml',[App\Http\Controllers\registercontroller::class, 'gethospitals']);
Route::POST('searchhospital',[App\Http\Controllers\registercontroller::class, 'searchhospital']);
Route::GET('uploadimageshtml',[App\Http\Controllers\registercontroller::class, 'getimages']);
Route::POST('uploadimages',[App\Http\Controllers\registercontroller::class, 'uploadimages']);
Route::GET('museums',[App\Http\Controllers\registercontroller::class, 'getmuseums']);
Route::POST('searchmuseum',[App\Http\Controllers\registercontroller::class, 'searchmuseum']);
Route::GET('temples',[App\Http\Controllers\registercontroller::class, 'gettemples']);
Route::POST('searchtemple',[App\Http\Controllers\registercontroller::class, 'searchtemple']);
Route::GET('restaurants',[App\Http\Controllers\registercontroller::class, 'getrestaurants']);
Route::POST('searchrestaurant',[App\Http\Controllers\registercontroller::class, 'searchrestaurant']);
Route::GET('places',[App\Http\Controllers\registercontroller::class, 'getplaces']);
Route::POST('searchplace',[App\Http\Controllers\registercontroller::class, 'searchplace']);
Route::GET('email',[App\Http\Controllers\email::class, 'basic_email']);
//manage continent
Route::GET('managecontinent/{id}',[App\Http\Controllers\registercontroller::class, 'manageupdate']);
Route::POST('addcontinent',[App\Http\Controllers\registercontroller::class, 'addcontinents']);
Route::GET('managecontinentshtml',[App\Http\Controllers\registercontroller::class, 'getcontinents']);
Route::GET('manage',[App\Http\Controllers\registercontroller::class, 'managetable']);
Route::get('edit/{id}',[App\Http\Controllers\registercontroller::class, 'updatecontinent']);
Route::POST('searchcontinent',[App\Http\Controllers\registercontroller::class, 'searchcontinent']);

//manage country
Route::GET('managecountry/{id}',[App\Http\Controllers\registercontroller::class, 'managecountry']);
Route::POST('addcountry',[App\Http\Controllers\registercontroller::class, 'addcountries']);
Route::GET('managecountrieshtml',[App\Http\Controllers\registercontroller::class, 'getcountries']);
Route::GET('deletecountry',[App\Http\Controllers\registercontroller::class, 'deletecountry']);
Route::get('editcountry/{id}',[App\Http\Controllers\registercontroller::class, 'updatecountry']);
Route::POST('searchcountry',[App\Http\Controllers\registercontroller::class, 'searchcountry']);


//manage admin per country
Route::GET('manageadminpercountry/{id}',[App\Http\Controllers\registercontroller::class, 'manageadminpercountry']);
Route::POST('addadminpercountry',[App\Http\Controllers\registercontroller::class, 'addadminpercountry']);
Route::GET('manageadminpercountry',[App\Http\Controllers\registercontroller::class, 'getadmins']);
Route::GET('deleteadminpercountry',[App\Http\Controllers\registercontroller::class, 'deleteadminpercountry']);
Route::get('editadminpercountry/{id}',[App\Http\Controllers\registercontroller::class, 'updateadminpercountry']);
Route::POST('searchadminpercountry',[App\Http\Controllers\registercontroller::class, 'searchadminpercountry']);


//manage tips

Route::GET('managetips/{id}',[App\Http\Controllers\registercontroller::class, 'managetips']);
Route::POST('addtip',[App\Http\Controllers\registercontroller::class, 'addtipbyadmin']);
Route::GET('managetips',[App\Http\Controllers\registercontroller::class, 'retrievetips']);
Route::GET('deletetip',[App\Http\Controllers\registercontroller::class, 'deletetip']);
Route::get('edittip/{id}',[App\Http\Controllers\registercontroller::class, 'updatetip']);
Route::POST('searchtip',[App\Http\Controllers\registercontroller::class, 'searchtip']);

//manage schools
Route::GET('manageschools/{id}',[App\Http\Controllers\registercontroller::class, 'manageschools']);
Route::GET('schoolshtml',[App\Http\Controllers\registercontroller::class, 'getschools']);
Route::POST('searchschool',[App\Http\Controllers\registercontroller::class, 'searchschool']);
Route::GET('manageschools',[App\Http\Controllers\registercontroller::class, 'getschools']);
Route::POST('addschool',[App\Http\Controllers\registercontroller::class, 'addschool']);
Route::GET('deleteschool',[App\Http\Controllers\registercontroller::class, 'deleteschool']);
Route::get('editschool/{id}',[App\Http\Controllers\registercontroller::class, 'updateschool']);

//manage hospitals
Route::GET('managehospitals/{id}',[App\Http\Controllers\registercontroller::class, 'managehospitals']);
Route::GET('hospitalshtml',[App\Http\Controllers\registercontroller::class, 'gethospitals']);
Route::POST('searchhospital',[App\Http\Controllers\registercontroller::class, 'searchhospital']);
Route::GET('managehospitals',[App\Http\Controllers\registercontroller::class, 'gethospitals']);
Route::POST('addhospital',[App\Http\Controllers\registercontroller::class, 'addhospital']);
Route::GET('deletehospital',[App\Http\Controllers\registercontroller::class, 'deletehospital']);
Route::get('edithospital/{id}',[App\Http\Controllers\registercontroller::class, 'updatehospital']);

//manage contributions
Route::GET('managecontributions/{id}',[App\Http\Controllers\registercontroller::class, 'managecontributions']);
Route::POST('addcontribution',[App\Http\Controllers\registercontroller::class, 'addcontributionbyadmin']);
Route::GET('managecontributions',[App\Http\Controllers\registercontroller::class, 'retrievecontributions']);
Route::GET('deletecontribution',[App\Http\Controllers\registercontroller::class, 'deletecontribution']);
Route::get('editcontribution/{id}',[App\Http\Controllers\registercontroller::class, 'updatecontribution']);
Route::POST('searchcontribution',[App\Http\Controllers\registercontroller::class, 'searchcontribution']);
Route::POST('makepayment',[App\Http\Controllers\registercontroller::class, 'makepayment']);
//manage categories
Route::GET('managecategoriesofleaving/{id}',[App\Http\Controllers\registercontroller::class, 'managecategoriesofleaving']);
Route::POST('searchcategory',[App\Http\Controllers\registercontroller::class, 'searchcategory']);
Route::GET('managecategoriesofleaving',[App\Http\Controllers\registercontroller::class, 'getcategories']);
Route::POST('addcategory',[App\Http\Controllers\registercontroller::class, 'addcategory']);
Route::GET('deletecategory',[App\Http\Controllers\registercontroller::class, 'deletecategory']);
Route::get('editcategory/{id}',[App\Http\Controllers\registercontroller::class, 'updatecategory']);

//manage places to visit
Route::POST('addplacestovisit',[App\Http\Controllers\registercontroller::class, 'addplacestovisit']);
Route::GET('searchplace',[App\Http\Controllers\registercontroller::class, 'searchplacetovisit']);
Route::GET('deleteplacestovisit',[App\Http\Controllers\registercontroller::class, 'deleteplacestovisit']);
Route::get('manageplacestovisit',[App\Http\Controllers\registercontroller::class, 'manageplacestovisit']);
Route::GET('updateplacesform/{id}',[App\Http\Controllers\registercontroller::class, 'updateplacesform']);
Route::GET('editplaces/{id}',[App\Http\Controllers\registercontroller::class, 'updateplacestovisit']);

Route::GET('Immigranthtml',[App\Http\Controllers\registercontroller::class, 'Immigranthtml']);

Route::POST('contactusmail',[App\Http\Controllers\email::class, 'contactus']);


Route::view('payment','payment');
Route::view('chat','chat');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
