<?php

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

//LOGOUT Y REDIRECT
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', 'HomeController@Index')->middleware('auth');
Auth::routes();




Route::group(['middleware' => 'auth'], function () {

//INICO
Route::get('/home', 'HomeController@index')->name('home');


//ASISTENCIA DIARIA
Route::get('/get_ct_x_alcaldia/{id}', 'HomeController@getCtAlcaldia');
Route::post('/guardar_asistencia', 'HomeController@guardarAsistencia');
Route::get('/getlistadoasistencias', 'HomeController@view_listado_asistencias');
Route::get('/getexcel', 'HomeController@excel_asistencias');

//INSERTAR ASITENCIA DIARIA ADMIN
Route::get('/asistencia_admin', 'HomeController@registro_admin');
Route::post('/guardar_asistencia_admin', 'HomeController@guardarAsistenciaAdmin');

//INSERTAR ASITENCIA DIARIA ADMIN MIERCOLES
Route::get('/asistencia_admin_miercoles', 'HomeMiercolesController@registro_admin_miercoles');
Route::post('/guardar_asistencia_admin_miercoles', 'HomeMiercolesController@guardarAsistenciaAdmin_miercoles');

//RUTAS USUARIO
Route::get('/nuevoUsuario', 'UserController@nuevo_usuario');
Route::get('/listadosUsuarios', 'UserController@listadoUsuario');
Route::get('/edicionUsuario/{id}', 'UserController@editar_usuario');
Route::post('/guardarEdicionUsuario/{id}', 'UserController@save_edicion__usuario');
Route::post('/guardarUsuario', 'UserController@save_usuario');

//REPORTES DIARIOS
Route::get('/reporte_fecha', 'HomeController@excel_asistencias_por_fecha');
Route::get('/reporte_fecha_al', 'HomeController@excel_asistencias_por_fecha_al');
Route::get('/fecha_real', 'HomeController@fecha_real_captura');
Route::get('/reportesExcel', 'HomeController@reportes');
Route::post('/obtenerexcel', 'HomeController@obtener_excel');

Route::get('/reporteGrafica', 'HomeController@grafica');
Route::get('/datosGrafica/{fecha1}/{fecha2}', 'HomeController@datos_grafica');

Route::get('/faltantesView', 'HomeController@vista_faltantes');
Route::post('/faltantes', 'HomeController@faltantes');

Route::get('/alcaldiasGrafica', 'HomeController@graficaDelegaciones');
Route::get('/datosgraficasalc/{fecha1}/{fecha2}/{alc}', 'HomeController@datos_grafica_alc');

////////////////////////////////////////////////////////
//ASISTENCIA VESPERTINAS(MIERCOLES)
Route::get('/asistencia_miercoles', 'HomeMiercolesController@index');
Route::post('/guardar_asistenciaMiercoles', 'HomeMiercolesController@guardar_asistencia_miercoles');
Route::get('/asistencia_miercoles', 'HomeMiercolesController@index');
Route::get('/getlistadoasistencias_miercoles', 'HomeMiercolesController@view_listado_asistencias_miercoles');
Route::get('/getexcelmiercoles', 'HomeMiercolesController@excel_asistencias_miercoles');

//REPORTES VESPERTINOS MIERCOLES
Route::get('/reportesExcel_miercoles', 'HomeControllerMiercoles@reportesmiercoles');
Route::post('/obtenerexcelmiercoles', 'HomeControllerMiercoles@obtener_excel_miercoles');

Route::get('/reportesExcel_miercoles', 'HomeMiercolesController@reportes_miercoles');
Route::post('/obtenerexcel_miercoles', 'HomeMiercolesController@obtener_excel_miercoles');

Route::get('/faltantesView_miercoles', 'HomeMiercolesController@vista_faltantes_miercoles');
Route::post('/faltantes_miercoles', 'HomeMiercolesController@faltantes_miercoles');

Route::get('/reporteGrafica_miercoles', 'HomeMiercolesController@grafica_miercoles');
Route::get('/datosGrafica_miercoles/{fecha1}/{fecha2}', 'HomeMiercolesController@datos_grafica_miercoles');

Route::get('/alcaldiasGrafica_miercoles', 'HomeMiercolesController@grafica_alcaldia_miercoles');
Route::get('/datosgraficasalc_miercoles/{fecha1}/{fecha2}/{alc}', 'HomeMiercolesController@datos_grafica_alc_miercoles');

//Route::get('/alcaldiasGrafica_miercoles_vecino', 'HomeMiercolesController@grafica_alcaldia_miercoles_vecino');
//Route::get('/datosgraficasalc_miercoles_vecino/{fecha1}/{fecha2}/{alc}', 'HomeMiercolesController@datos_grafica_alc_miercoles_vecino');

//cuandos e pasa parametros se instancia aqui tambien si es GET solamente
Route::get('/query/{var1}/{var2}/{var3}', 'HomeMiercolesController@query_ejemplo');

Route::get('/alcaldiasGrafica_miercoles_vecino', 'HomeMiercolesController@grafica_alcaldia_miercoles_vecino');
Route::get('/datosgraficasalc_miercoles_vecino/{fecha1}/{fecha2}/{alc}', 'HomeMiercolesController@datos_grafica_alc_miercoles_vecino');

	});

//PDF

Route::get('/adminpdfView', 'HomeController@vistasubirpdf_admin');
Route::post('/guardar_admin_pdf', 'HomeController@guardar_pdf_admin');

Route::get('/usuariopdfView', 'HomeController@usuario_pdf');
Route::post('/guardar_usuario_pdf', 'HomeController@guardarUsuarioPdf');