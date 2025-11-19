<?php

use App\Http\Controllers\Api\V1\Admin\AddressApiController;
use App\Http\Controllers\Api\V1\Admin\BlogDetailApiController;
use App\Http\Controllers\Api\V1\Admin\BrandApiController;
use App\Http\Controllers\Api\V1\Admin\CommentApiController;
use App\Http\Controllers\Api\V1\Admin\ContactuApiController;
use App\Http\Controllers\Api\V1\Admin\CourseDetailApiController;
use App\Http\Controllers\Api\V1\Admin\CrouselApiController;
use App\Http\Controllers\Api\V1\Admin\FaqApiController;
use App\Http\Controllers\Api\V1\Admin\GalleryApiController;
use App\Http\Controllers\Api\V1\Admin\GmailApiController;
use App\Http\Controllers\Api\V1\Admin\InstructorApiController;
use App\Http\Controllers\Api\V1\Admin\LanguageApiController;
use App\Http\Controllers\Api\V1\Admin\LessonApiController;
use App\Http\Controllers\Api\V1\Admin\MapApiController;
use App\Http\Controllers\Api\V1\Admin\NewslaterApiController;
use App\Http\Controllers\Api\V1\Admin\NumberApiController;
use App\Http\Controllers\Api\V1\Admin\OfficetimeApiController;
use App\Http\Controllers\Api\V1\Admin\PermissionApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectDetailApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectTypeApiController;
use App\Http\Controllers\Api\V1\Admin\TestimonialApiController;
use App\Http\Controllers\Api\V1\Admin\UserAlertApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;
use App\Http\Controllers\Api\V1\Admin\WebsiteLogoApiController;
use App\Http\Controllers\Api\V1\Admin\YoutubeApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', PermissionApiController::class);

    // Users
    Route::post('users/media', [UserApiController::class, 'storeMedia'])->name('users.store_media');
    Route::apiResource('users', UserApiController::class);

    // User Alert
    Route::apiResource('user-alerts', UserAlertApiController::class);

    // Crousel
    Route::post('crousels/media', [CrouselApiController::class, 'storeMedia'])->name('crousels.store_media');
    Route::apiResource('crousels', CrouselApiController::class);

    // Course Detail
    Route::post('course-details/media', [CourseDetailApiController::class, 'storeMedia'])->name('course_details.store_media');
    Route::apiResource('course-details', CourseDetailApiController::class);

    // Lesson
    Route::apiResource('lessons', LessonApiController::class);

    // Project Type
    Route::post('project-types/media', [ProjectTypeApiController::class, 'storeMedia'])->name('project_types.store_media');
    Route::apiResource('project-types', ProjectTypeApiController::class);

    // Project Detail
    Route::post('project-details/media', [ProjectDetailApiController::class, 'storeMedia'])->name('project_details.store_media');
    Route::apiResource('project-details', ProjectDetailApiController::class);

    // Language
    Route::apiResource('languages', LanguageApiController::class);

    // Blog Detail
    Route::post('blog-details/media', [BlogDetailApiController::class, 'storeMedia'])->name('blog_details.store_media');
    Route::apiResource('blog-details', BlogDetailApiController::class);

    // Comments
    Route::apiResource('comments', CommentApiController::class);

    // Website Logo
    Route::post('website-logos/media', [WebsiteLogoApiController::class, 'storeMedia'])->name('website_logos.store_media');
    Route::apiResource('website-logos', WebsiteLogoApiController::class);

    // Address
    Route::apiResource('addresses', AddressApiController::class);

    // Number
    Route::apiResource('numbers', NumberApiController::class);

    // Gmail
    Route::apiResource('gmails', GmailApiController::class);

    // Officetime
    Route::apiResource('officetimes', OfficetimeApiController::class);

    // Contactus
    Route::apiResource('contactus', ContactuApiController::class);

    // Brand
    Route::post('brands/media', [BrandApiController::class, 'storeMedia'])->name('brands.store_media');
    Route::apiResource('brands', BrandApiController::class);

    // Instructors
    Route::post('instructors/media', [InstructorApiController::class, 'storeMedia'])->name('instructors.store_media');
    Route::apiResource('instructors', InstructorApiController::class);

    // Faq
    Route::apiResource('faqs', FaqApiController::class);

    // Testimonial
    Route::apiResource('testimonials', TestimonialApiController::class);

    // Newslater
    Route::apiResource('newslaters', NewslaterApiController::class);

    // Gallery
    Route::post('galleries/media', [GalleryApiController::class, 'storeMedia'])->name('galleries.store_media');
    Route::apiResource('galleries', GalleryApiController::class);

    // Youtube
    Route::apiResource('youtubes', YoutubeApiController::class);

    // Map
    Route::apiResource('maps', MapApiController::class);
});
