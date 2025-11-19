<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 25,
                'title' => 'crousel_create',
            ],
            [
                'id'    => 26,
                'title' => 'crousel_edit',
            ],
            [
                'id'    => 27,
                'title' => 'crousel_show',
            ],
            [
                'id'    => 28,
                'title' => 'crousel_delete',
            ],
            [
                'id'    => 29,
                'title' => 'crousel_access',
            ],
            [
                'id'    => 30,
                'title' => 'service_access',
            ],
            [
                'id'    => 31,
                'title' => 'website_setup_access',
            ],
            [
                'id'    => 32,
                'title' => 'course_detail_create',
            ],
            [
                'id'    => 33,
                'title' => 'course_detail_edit',
            ],
            [
                'id'    => 34,
                'title' => 'course_detail_show',
            ],
            [
                'id'    => 35,
                'title' => 'course_detail_delete',
            ],
            [
                'id'    => 36,
                'title' => 'course_detail_access',
            ],
            [
                'id'    => 37,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 38,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 39,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 40,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 41,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 42,
                'title' => 'project_access',
            ],
            [
                'id'    => 43,
                'title' => 'project_type_create',
            ],
            [
                'id'    => 44,
                'title' => 'project_type_edit',
            ],
            [
                'id'    => 45,
                'title' => 'project_type_show',
            ],
            [
                'id'    => 46,
                'title' => 'project_type_delete',
            ],
            [
                'id'    => 47,
                'title' => 'project_type_access',
            ],
            [
                'id'    => 48,
                'title' => 'project_detail_create',
            ],
            [
                'id'    => 49,
                'title' => 'project_detail_edit',
            ],
            [
                'id'    => 50,
                'title' => 'project_detail_show',
            ],
            [
                'id'    => 51,
                'title' => 'project_detail_delete',
            ],
            [
                'id'    => 52,
                'title' => 'project_detail_access',
            ],
            [
                'id'    => 53,
                'title' => 'language_create',
            ],
            [
                'id'    => 54,
                'title' => 'language_edit',
            ],
            [
                'id'    => 55,
                'title' => 'language_show',
            ],
            [
                'id'    => 56,
                'title' => 'language_delete',
            ],
            [
                'id'    => 57,
                'title' => 'language_access',
            ],
            [
                'id'    => 58,
                'title' => 'blog_access',
            ],
            [
                'id'    => 59,
                'title' => 'blog_detail_create',
            ],
            [
                'id'    => 60,
                'title' => 'blog_detail_edit',
            ],
            [
                'id'    => 61,
                'title' => 'blog_detail_show',
            ],
            [
                'id'    => 62,
                'title' => 'blog_detail_delete',
            ],
            [
                'id'    => 63,
                'title' => 'blog_detail_access',
            ],
            [
                'id'    => 64,
                'title' => 'comment_create',
            ],
            [
                'id'    => 65,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 66,
                'title' => 'comment_show',
            ],
            [
                'id'    => 67,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 68,
                'title' => 'comment_access',
            ],
            [
                'id'    => 69,
                'title' => 'contact_access',
            ],
            [
                'id'    => 70,
                'title' => 'website_logo_create',
            ],
            [
                'id'    => 71,
                'title' => 'website_logo_edit',
            ],
            [
                'id'    => 72,
                'title' => 'website_logo_show',
            ],
            [
                'id'    => 73,
                'title' => 'website_logo_delete',
            ],
            [
                'id'    => 74,
                'title' => 'website_logo_access',
            ],
            [
                'id'    => 75,
                'title' => 'address_create',
            ],
            [
                'id'    => 76,
                'title' => 'address_edit',
            ],
            [
                'id'    => 77,
                'title' => 'address_show',
            ],
            [
                'id'    => 78,
                'title' => 'address_delete',
            ],
            [
                'id'    => 79,
                'title' => 'address_access',
            ],
            [
                'id'    => 80,
                'title' => 'number_create',
            ],
            [
                'id'    => 81,
                'title' => 'number_edit',
            ],
            [
                'id'    => 82,
                'title' => 'number_show',
            ],
            [
                'id'    => 83,
                'title' => 'number_delete',
            ],
            [
                'id'    => 84,
                'title' => 'number_access',
            ],
            [
                'id'    => 85,
                'title' => 'gmail_create',
            ],
            [
                'id'    => 86,
                'title' => 'gmail_edit',
            ],
            [
                'id'    => 87,
                'title' => 'gmail_show',
            ],
            [
                'id'    => 88,
                'title' => 'gmail_delete',
            ],
            [
                'id'    => 89,
                'title' => 'gmail_access',
            ],
            [
                'id'    => 90,
                'title' => 'officetime_create',
            ],
            [
                'id'    => 91,
                'title' => 'officetime_edit',
            ],
            [
                'id'    => 92,
                'title' => 'officetime_show',
            ],
            [
                'id'    => 93,
                'title' => 'officetime_delete',
            ],
            [
                'id'    => 94,
                'title' => 'officetime_access',
            ],
            [
                'id'    => 95,
                'title' => 'contactu_create',
            ],
            [
                'id'    => 96,
                'title' => 'contactu_edit',
            ],
            [
                'id'    => 97,
                'title' => 'contactu_show',
            ],
            [
                'id'    => 98,
                'title' => 'contactu_delete',
            ],
            [
                'id'    => 99,
                'title' => 'contactu_access',
            ],
            [
                'id'    => 100,
                'title' => 'brand_create',
            ],
            [
                'id'    => 101,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 102,
                'title' => 'brand_show',
            ],
            [
                'id'    => 103,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 104,
                'title' => 'brand_access',
            ],
            [
                'id'    => 105,
                'title' => 'instructor_create',
            ],
            [
                'id'    => 106,
                'title' => 'instructor_edit',
            ],
            [
                'id'    => 107,
                'title' => 'instructor_show',
            ],
            [
                'id'    => 108,
                'title' => 'instructor_delete',
            ],
            [
                'id'    => 109,
                'title' => 'instructor_access',
            ],
            [
                'id'    => 110,
                'title' => 'faq_create',
            ],
            [
                'id'    => 111,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 112,
                'title' => 'faq_show',
            ],
            [
                'id'    => 113,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 114,
                'title' => 'faq_access',
            ],
            [
                'id'    => 115,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 116,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 117,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 118,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 119,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 120,
                'title' => 'newslater_create',
            ],
            [
                'id'    => 121,
                'title' => 'newslater_edit',
            ],
            [
                'id'    => 122,
                'title' => 'newslater_show',
            ],
            [
                'id'    => 123,
                'title' => 'newslater_delete',
            ],
            [
                'id'    => 124,
                'title' => 'newslater_access',
            ],
            [
                'id'    => 125,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 126,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 127,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 128,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 129,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 130,
                'title' => 'youtube_create',
            ],
            [
                'id'    => 131,
                'title' => 'youtube_edit',
            ],
            [
                'id'    => 132,
                'title' => 'youtube_show',
            ],
            [
                'id'    => 133,
                'title' => 'youtube_delete',
            ],
            [
                'id'    => 134,
                'title' => 'youtube_access',
            ],
            [
                'id'    => 135,
                'title' => 'map_create',
            ],
            [
                'id'    => 136,
                'title' => 'map_edit',
            ],
            [
                'id'    => 137,
                'title' => 'map_show',
            ],
            [
                'id'    => 138,
                'title' => 'map_delete',
            ],
            [
                'id'    => 139,
                'title' => 'map_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
