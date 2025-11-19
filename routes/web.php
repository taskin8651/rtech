<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\BlogDetailController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactuController;
use App\Http\Controllers\Admin\CourseDetailController;
use App\Http\Controllers\Admin\CrouselController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GmailController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewslaterController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\OfficetimeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProjectDetailController;
use App\Http\Controllers\Admin\ProjectTypeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteLogoController;
use App\Http\Controllers\Admin\YoutubeController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Custom\CourseController;
use App\Http\Controllers\Custom\ProjectsController;
use App\Http\Controllers\Custom\ContactController;
use App\Http\Controllers\Custom\NewsLatterController;
use App\Http\Controllers\Custom\IndexController;
use App\Http\Controllers\Custom\AboutController;



Route::redirect('/', '/login');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::post('permissions/csv', [PermissionController::class, 'csvStore'])->name('permissions.csv.store');
    Route::put('permissions/csv', [PermissionController::class, 'csvUpdate'])->name('permissions.csv.update');
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/media', [UserController::class, 'storeMedia'])->name('users.storeMedia');
    Route::post('users/csv', [UserController::class, 'csvStore'])->name('users.csv.store');
    Route::put('users/csv', [UserController::class, 'csvUpdate'])->name('users.csv.update');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // User Alert
    Route::post('user-alerts/csv', [UserAlertController::class, 'csvStore'])->name('user-alerts.csv.store');
    Route::put('user-alerts/csv', [UserAlertController::class, 'csvUpdate'])->name('user-alerts.csv.update');
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Crousel
    Route::post('crousels/media', [CrouselController::class, 'storeMedia'])->name('crousels.storeMedia');
    Route::post('crousels/csv', [CrouselController::class, 'csvStore'])->name('crousels.csv.store');
    Route::put('crousels/csv', [CrouselController::class, 'csvUpdate'])->name('crousels.csv.update');
    Route::resource('crousels', CrouselController::class, ['except' => ['store', 'update', 'destroy']]);

    // Course Detail
    Route::post('course-details/media', [CourseDetailController::class, 'storeMedia'])->name('course-details.storeMedia');
    Route::post('course-details/csv', [CourseDetailController::class, 'csvStore'])->name('course-details.csv.store');
    Route::put('course-details/csv', [CourseDetailController::class, 'csvUpdate'])->name('course-details.csv.update');
    Route::resource('course-details', CourseDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Lesson
    Route::post('lessons/csv', [LessonController::class, 'csvStore'])->name('lessons.csv.store');
    Route::put('lessons/csv', [LessonController::class, 'csvUpdate'])->name('lessons.csv.update');
    Route::resource('lessons', LessonController::class, ['except' => ['store', 'update', 'destroy']]);

    // Project Type
    Route::post('project-types/media', [ProjectTypeController::class, 'storeMedia'])->name('project-types.storeMedia');
    Route::post('project-types/csv', [ProjectTypeController::class, 'csvStore'])->name('project-types.csv.store');
    Route::put('project-types/csv', [ProjectTypeController::class, 'csvUpdate'])->name('project-types.csv.update');
    Route::resource('project-types', ProjectTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Project Detail
    Route::post('project-details/media', [ProjectDetailController::class, 'storeMedia'])->name('project-details.storeMedia');
    Route::post('project-details/csv', [ProjectDetailController::class, 'csvStore'])->name('project-details.csv.store');
    Route::put('project-details/csv', [ProjectDetailController::class, 'csvUpdate'])->name('project-details.csv.update');
    Route::resource('project-details', ProjectDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Language
    Route::post('languages/csv', [LanguageController::class, 'csvStore'])->name('languages.csv.store');
    Route::put('languages/csv', [LanguageController::class, 'csvUpdate'])->name('languages.csv.update');
    Route::resource('languages', LanguageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Blog Detail
    Route::post('blog-details/media', [BlogDetailController::class, 'storeMedia'])->name('blog-details.storeMedia');
    Route::post('blog-details/csv', [BlogDetailController::class, 'csvStore'])->name('blog-details.csv.store');
    Route::put('blog-details/csv', [BlogDetailController::class, 'csvUpdate'])->name('blog-details.csv.update');
    Route::resource('blog-details', BlogDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Comments
    Route::post('comments/csv', [CommentController::class, 'csvStore'])->name('comments.csv.store');
    Route::put('comments/csv', [CommentController::class, 'csvUpdate'])->name('comments.csv.update');
    Route::resource('comments', CommentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Website Logo
    Route::post('website-logos/media', [WebsiteLogoController::class, 'storeMedia'])->name('website-logos.storeMedia');
    Route::post('website-logos/csv', [WebsiteLogoController::class, 'csvStore'])->name('website-logos.csv.store');
    Route::put('website-logos/csv', [WebsiteLogoController::class, 'csvUpdate'])->name('website-logos.csv.update');
    Route::resource('website-logos', WebsiteLogoController::class, ['except' => ['store', 'update', 'destroy']]);

    // Address
    Route::post('addresses/csv', [AddressController::class, 'csvStore'])->name('addresses.csv.store');
    Route::put('addresses/csv', [AddressController::class, 'csvUpdate'])->name('addresses.csv.update');
    Route::resource('addresses', AddressController::class, ['except' => ['store', 'update', 'destroy']]);

    // Number
    Route::post('numbers/csv', [NumberController::class, 'csvStore'])->name('numbers.csv.store');
    Route::put('numbers/csv', [NumberController::class, 'csvUpdate'])->name('numbers.csv.update');
    Route::resource('numbers', NumberController::class, ['except' => ['store', 'update', 'destroy']]);

    // Gmail
    Route::post('gmails/csv', [GmailController::class, 'csvStore'])->name('gmails.csv.store');
    Route::put('gmails/csv', [GmailController::class, 'csvUpdate'])->name('gmails.csv.update');
    Route::resource('gmails', GmailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Officetime
    Route::post('officetimes/csv', [OfficetimeController::class, 'csvStore'])->name('officetimes.csv.store');
    Route::put('officetimes/csv', [OfficetimeController::class, 'csvUpdate'])->name('officetimes.csv.update');
    Route::resource('officetimes', OfficetimeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contactus
    Route::post('contactus/csv', [ContactuController::class, 'csvStore'])->name('contactus.csv.store');
    Route::put('contactus/csv', [ContactuController::class, 'csvUpdate'])->name('contactus.csv.update');
    Route::resource('contactus', ContactuController::class, ['except' => ['store', 'update', 'destroy']]);

    // Brand
    Route::post('brands/media', [BrandController::class, 'storeMedia'])->name('brands.storeMedia');
    Route::post('brands/csv', [BrandController::class, 'csvStore'])->name('brands.csv.store');
    Route::put('brands/csv', [BrandController::class, 'csvUpdate'])->name('brands.csv.update');
    Route::resource('brands', BrandController::class, ['except' => ['store', 'update', 'destroy']]);

    // Instructors
    Route::post('instructors/media', [InstructorController::class, 'storeMedia'])->name('instructors.storeMedia');
    Route::post('instructors/csv', [InstructorController::class, 'csvStore'])->name('instructors.csv.store');
    Route::put('instructors/csv', [InstructorController::class, 'csvUpdate'])->name('instructors.csv.update');
    Route::resource('instructors', InstructorController::class, ['except' => ['store', 'update', 'destroy']]);

    // Faq
    Route::post('faqs/csv', [FaqController::class, 'csvStore'])->name('faqs.csv.store');
    Route::put('faqs/csv', [FaqController::class, 'csvUpdate'])->name('faqs.csv.update');
    Route::resource('faqs', FaqController::class, ['except' => ['store', 'update', 'destroy']]);

    // Testimonial
    Route::post('testimonials/csv', [TestimonialController::class, 'csvStore'])->name('testimonials.csv.store');
    Route::put('testimonials/csv', [TestimonialController::class, 'csvUpdate'])->name('testimonials.csv.update');
    Route::resource('testimonials', TestimonialController::class, ['except' => ['store', 'update', 'destroy']]);

    // Newslater
    Route::post('newslaters/csv', [NewslaterController::class, 'csvStore'])->name('newslaters.csv.store');
    Route::put('newslaters/csv', [NewslaterController::class, 'csvUpdate'])->name('newslaters.csv.update');
    Route::resource('newslaters', NewslaterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Gallery
    Route::post('galleries/media', [GalleryController::class, 'storeMedia'])->name('galleries.storeMedia');
    Route::post('galleries/csv', [GalleryController::class, 'csvStore'])->name('galleries.csv.store');
    Route::put('galleries/csv', [GalleryController::class, 'csvUpdate'])->name('galleries.csv.update');
    Route::resource('galleries', GalleryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Youtube
    Route::post('youtubes/csv', [YoutubeController::class, 'csvStore'])->name('youtubes.csv.store');
    Route::put('youtubes/csv', [YoutubeController::class, 'csvUpdate'])->name('youtubes.csv.update');
    Route::resource('youtubes', YoutubeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Map
    Route::post('maps/csv', [MapController::class, 'csvStore'])->name('maps.csv.store');
    Route::put('maps/csv', [MapController::class, 'csvUpdate'])->name('maps.csv.update');
    Route::resource('maps', MapController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});




//custom routes
Route::get('/', [IndexController::class, 'index'])->name('custom.home');
Route::get('/about', [AboutController::class, 'index'])->name('custom.about');
Route::get('/courses', [CourseController::class, 'index'])->name('custom.courses');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('custom.course-details');

Route::get('/project', [ProjectsController::class, 'index'])
     ->name('projects.index');
     Route::get('/projects/{id}', [ProjectsController::class, 'show'])->name('project.show');

     Route::get('/projects/category/{id}', [ProjectsController::class, 'categoryWise'])
     ->name('projects.category');


     Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
     Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter', [NewsLatterController::class, 'store'])->name('newsletter.store');