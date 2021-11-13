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
Route::get('clear_cache',function(){
   Artisan::call('config:cache'); 
});

Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/forgot-password-page','AdminController@forgot_password_page')->name('forgot-password-page');
Route::post('/send-password-reset-email','AdminController@send_password_reset_email')->name('send-password-reset-email');
Route::get('/reset-password/{encrypted_id}','AdminController@show_change_password_page');
Route::post('/save-new-password','AdminController@reset_password')->name('save-new-password');
Route::get('/student-details-ajax','StudentController@student_details_ajax')->name('student-details-ajax');
Route::get('/student-fee-details-ajax','StudentController@fee_details_ajax')->name('student-fee-details-ajax');
Route::post('/filter-fee','StudentController@filter_fee')->name('filter-fee');

Route::get('/student-test-details','StudentController@test_details')->name('student-test-details');
Route::post('/autheticate-admin','AdminController@authenticate_admin')->name('authenticate-admin');
Route::get('/student-report-card/{id}/{course_id}','StudentController@report_card')->name('student-report-card');
Route::get('/student-create','StudentController@create')->name('student-create');
Route::post('/student-save','StudentController@save')->name('student-save');
Route::get('/student-fee-form','StudentController@fee_form')->name('student-fee-form');
Route::post('/student-fee-save','StudentController@fee_save')->name('student-fee-save');
Route::get('/verify-fee/{id}','StudentController@verify_fee')->name('verify-fee');
//Teacher Normal Routes
Route::get('/speaking-evaluation-form','TeacherController@speaking_evaluation_form')->name('speaking-evaluation-form');
Route::post('/speaking-evaluation-save','TeacherController@speaking_evaluation_save')->name('speaking-evaluation-save');
Route::get('/writing-evaluation-form','TeacherController@writing_evaluation_form')->name('writing-evaluation-form');
Route::post('/writing-evaluation-save','TeacherController@writing_evaluation_save')->name('writing-evaluation-save');
Route::get('/writing-evaluation-audio-save','TeacherController@writing_evaluation_audio_save')->name('writing-evaluation-audio-save');
Route::get('/reading-evaluation-form','TeacherController@reading_evaluation_form')->name('reading-evaluation-form');
Route::post('/reading-evaluation-save','TeacherController@reading_evaluation_save')->name('reading-evaluation-save');
Route::get('/listening-evaluation-form','TeacherController@listening_evaluation_form')->name('listening-evaluation-form');
Route::post('/listening-evaluation-save','TeacherController@listening_evaluation_save')->name('listening-evaluation-save');

//Attendance Normal Routes
Route::get('/attendance-form','AttendanceController@attendance_form')->name('attendance-form');
Route::post('/attendance-form-save','AttendanceController@attendance_form_save')->name('attendance-form-save');
Route::get('/attendance-feedback-form','AttendanceController@attendance_feedback_form')->name('attendance-feedback-form');
Route::post('/attendance-feedback-form-save','AttendanceController@attendance_feedback_form_save')->name('attendance-feedback-form-save');
Route::get('/test-suggestion-form','AttendanceController@test_suggestion_form')->name('test-suggestion-form');
Route::post('/test-suggestion-form-save','AttendanceController@test_suggestion_form_save')->name('test-suggestion-form-save');
Route::get('/attendance-sort','AttendanceController@attendance_sort')->name('attendance-sort');
Route::get('/student-course-session-details-ajax','StudentController@student_course_session_details_ajax')->name('student-course-session-details-ajax');
Route::get('/student-course-session-details-for-pen-paper-ajax','StudentController@student_course_session_details_for_pen_paper_ajax')->name('student-course-session-details-for-pen-paper-ajax');
Route::get('/writing-test-course-session-details-ajax','StudentController@writing_test_course_session_details_ajax')->name('writing-test-course-session-details-ajax');

//Courses ajax routes
Route::group(['middleware' => ['web','auth']], function () {
Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
//Courses normal routes
Route::get('/course-index','CourseController@index')->name('course-index');
Route::get('/course-create','CourseController@create')->name('course-create');
Route::post('/course-save','CourseController@save')->name('course-save');
Route::get('/course-view/{id}','CourseController@view')->name('course-view');
Route::get('/course-edit/{id}','CourseController@edit')->name('course-edit');
Route::post('/course-update','CourseController@update')->name('course-update');
Route::get('/course-delete/{id}','CourseController@delete')->name('course-delete');
//Courses normal routes
Route::get('/session-index','SessionController@index')->name('session-index');
Route::post('/session-save','SessionController@save')->name('session-save');
Route::post('/session-update','SessionController@update')->name('session-update');
Route::get('/session-delete/{id}','SessionController@delete')->name('session-delete');
//students normal routes
Route::get('/student-index','StudentController@index')->name('student-index');
Route::get('/student-pre-detail/{id}','StudentController@show_page_to_select_course_for_details')->name('student-pre-detail');
Route::get('/student-detail/{id}/{course_id}','StudentController@detail')->name('student-detail');
Route::get('/student-edit/{id}','StudentController@edit')->name('student-edit');
Route::post('/student-update','StudentController@update')->name('student-update');
Route::get('/student-delete/{id}','StudentController@delete')->name('student-delete');
Route::get('/student-fee-index','StudentController@fee_index')->name('student-fee-index');
Route::get('/student-fee-detail/{id}','StudentController@fee_detail')->name('student-fee-detail');
Route::post('/student-fee-change-due-date','StudentController@fee_due_date_change')->name('student-fee-change-due-date');
//students ajax routes

Route::get('/links',function(){
    return view('backend.modules.links.index');
})->name('links');

Route::get('/admin-change-details','AdminController@admin_change_password_page')->name('admin-change-password');
Route::get('/check-old-password','AdminController@check_old_password')->name('check-old-password');
Route::post('/update-admin-details','AdminController@update_admin_details')->name('update-admin-details');

Route::get('/logout','AdminController@logout')->name('logout');
});


// v2 routes
Route::get('/users/{type}','UserController@index')->name('users');
Route::get('/user-create/{type}','UserController@create')->name('user-create');
Route::post('/user-save','UserController@save')->name('user-save');
Route::get('/user-edit/{id}','UserController@edit')->name('user-edit');
Route::post('/user-update','UserController@update')->name('user-update');
Route::get('/user-delete/{id}','UserController@delete')->name('user-delete');

Route::get('/tutor-dashboard','TutorController@dashboard')->name('tutor-dashboard');
Route::get('/tutor-writing-tests','TutorController@writing_tests')->name('tutor-writing-tests');
Route::get('/tutor-speaking-tests','TutorController@speaking_tests')->name('tutor-speaking-tests');
Route::get('/writing-test-edit/{id}','TutorController@edit_writing_test')->name('writing-test-edit');
Route::get('/writing-test-delete/{id}','TutorController@delete_writing_test')->name('writing-test-delete');
Route::get('/writing-test-book/{id}','TutorController@book_writing_test')->name('writing-test-book');

Route::get('/speaking-test-edit/{id}','TutorController@edit_speaking_test')->name('speaking-test-edit');
Route::get('/speaking-test-delete/{id}','TutorController@delete_speaking_test')->name('speaking-test-delete');
Route::get('/speaking-test-book/{id}','TutorController@book_speaking_test')->name('speaking-test-book');



//Student routes
Route::get('/student-computer-written-test-selection/{student_id}/{course_id}','StudentController@student_computer_written_test_selection')->name('student-computer-written-test-selection');
Route::post('/student-computer-written-test-selected','StudentController@student_computer_written_test_selected')->name('student-computer-written-test-selected');
Route::get('/student-writing-test-selection-get-modules','StudentController@student_writing_test_selection_get_modules')->name('student-writing-test-selection-get-modules');
Route::get('/student-computer-written-test/{student_id}/{course_id}','StudentController@student_computer_written_test')->name('student-computer-written-test');
Route::get('/student-computer-written-test-2/{student_id}/{course_id}/{type}/{session}','StudentController@student_computer_written_test_2')->name('student-computer-written-test-2');
Route::get('/student-computer-written-test-3/{student_id}/{course_id}/{type}/{session}','StudentController@student_computer_written_test_3')->name('student-computer-written-test-3');
Route::get('/student-without-course','StudentController@student_without_course')->name('student-without-course');
Route::get('/student-pen-paper/{id}/{course_id}','StudentController@student_pen_paper')->name('student-pen-paper');
Route::get('/student-pen-paper-question','StudentController@student_pen_paper_question')->name('student-pen-paper-question');
Route::get('/course-session-details-ajax','CourseController@course_session_details_ajax')->name('course-session-details-ajax');
Route::get('/course-session-details-for-mock-test-ajax','CourseController@course_session_details_for_mock_test_ajax')->name('course-session-details-for-mock-test-ajax');
Route::get('/course-get-question-only','CourseController@course_get_question_only')->name('course-get-question-only');
Route::post('/writing-pen-paper-save','StudentController@writing_pen_paper_save')->name('writing-pen-paper-save');
//Tutor Test results
Route::get('/tutor-computer-test-checking/{test_id}','TutorController@tutor_computer_test_checking')->name('tutor-computer-test-checking');

//Writing Test
Route::get('/writing-tests-index','TestController@index')->name('writing-tests-index');
Route::get('/writing-tests-create','TestController@create')->name('writing-tests-create');
Route::post('/writing-tests-save','TestController@save')->name('writing-tests-save');
Route::get('/writing-tests-edit/{id}','TestController@edit')->name('writing-tests-edit');
Route::post('/writing-tests-update','TestController@update')->name('writing-tests-update');
Route::get('/writing-tests-delete','TestController@delete')->name('writing-tests-delete');
Route::post('/tutor-writing-test-checked','TestController@writing_test_checked')->name('tutor-writing-test-checked');
Route::get('/test-selection-course-sessions-ajax','CourseController@test_selection_course_sessions_ajax')->name('test-selection-course-sessions-ajax');
//Speaking Test
Route::get('/student-book-speaking-test-page/{id}/{course_id}','TestController@student_book_speaking_test_page')->name('student-book-speaking-test-page');
Route::get('/get-day-durations-ajax','TestController@get_day_durations_ajax')->name('get-day-durations-ajax');
Route::post('/book-speaking-test-duration','TestController@book_speaking_test_duration')->name('book-speaking-test-duration');
Route::get('/admin-speaking-test-bookings-index','AdminController@admin_speaking_test_bookings_index')->name('admin-speaking-test-bookings-index');
Route::post('assign-tutor-to-speaking-test','AdminController@assign_tutor_to_speaking_test')->name('assign-tutor-to-speaking-test');
//Meeting Routes
Route::get('/channel-index','MeetingController@index')->name('channel-index');
Route::get('/channel-disable/{id}','MeetingController@channel_disable')->name('channel-disable');
Route::get('/channel-days/{id}','MeetingController@channel_days')->name('channel-days');
Route::post('/day-create','MeetingController@day_create')->name('day-create');
Route::get('/day-durations/{id}','MeetingController@day_durations')->name('day-durations');
Route::post('/duration-create','MeetingController@duration_create')->name('duration-create');
Route::get('/day-delete/{id}','MeetingController@day_delete')->name('day-delete');
Route::get('/day-duration/{id}','MeetingController@duration_delete')->name('duration-delete');
//Business Lead
Route::get('/business-lead-dashboard','BusinessLeadController@dashboard')->name('business-lead-dashboard');
Route::get('/team-lead-dashboard','TeamLeadController@dashboard')->name('team-lead-dashboard');
Route::get('/business-lead-payments/{id}','BusinessLeadController@payments')->name('business-lead-payments');
Route::get('/team-lead-payments/{id}','TeamLeadController@payments')->name('team-lead-payments');
Route::get('/business-admin-payments/{id}','TeamLeadController@business_admin_payments')->name('business-admin-payments');
Route::get('/business-admins-index','UserController@business_admins')->name('business-admins-index');

Route::get('/student-fee-business-administrators-list-ajax','StudentController@student_fee_business_administrators_list_ajax')->name('student-fee-business-administrators-list-ajax');
Route::get('/forum-topic-details/{id}','ForumController@details')->name('forum-topic-details');
Route::post('/forum-topic-save','ForumController@save')->name('forum-topic-save');
Route::get('/topic-save-comment','ForumController@save_comment')->name('topic-save-comment');
Route::post('student-writing-test-submit','StudentController@student_writing_test_submit')->name('student-writing-test-submit');
Route::get('/tutor-book-speaking-test/{id}','TutorController@tutor_book_speaking_test')->name('tutor-book-speaking-test');