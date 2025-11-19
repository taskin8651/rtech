<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>



            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/audit-logs*")||request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                                        </i>
                                        {{ trans('cruds.userAlert.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('website_setup_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/crousels*")||request()->is("admin/website-logos*")||request()->is("admin/addresses*")||request()->is("admin/numbers*")||request()->is("admin/gmails*")||request()->is("admin/officetimes*")||request()->is("admin/brands*")||request()->is("admin/faqs*")||request()->is("admin/newslaters*")||request()->is("admin/maps*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.websiteSetup.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('crousel_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/crousels*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.crousels.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.crousel.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('website_logo_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/website-logos*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.website-logos.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.websiteLogo.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('address_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/addresses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.addresses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.address.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('number_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/numbers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.numbers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.number.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('gmail_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/gmails*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.gmails.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.gmail.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('officetime_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/officetimes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.officetimes.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.officetime.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('brand_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/brands*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.brands.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.brand.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('faq_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/faqs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.faqs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.faq.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('newslater_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/newslaters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.newslaters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.newslater.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('map_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/maps*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.maps.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.map.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('service_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/lessons*")||request()->is("admin/course-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.service.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('lesson_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/lessons*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.lessons.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.lesson.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('course_detail_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/course-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.course-details.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.courseDetail.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('project_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/project-types*")||request()->is("admin/languages*")||request()->is("admin/project-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.project.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('project_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/project-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.project-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.projectType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('language_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/languages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.languages.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.language.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('project_detail_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/project-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.project-details.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.projectDetail.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('blog_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/blog-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.blog.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('blog_detail_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/blog-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.blog-details.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.blogDetail.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('comment_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/comments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.comments.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.comment.title') }}
                        </a>
                    </li>
                @endcan
                @can('contact_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/contactus*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.contact.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('contactu_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contactus*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contactus.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.contactu.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('instructor_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/instructors*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.instructors.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.instructor.title') }}
                        </a>
                    </li>
                @endcan
                @can('testimonial_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/testimonials*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.testimonials.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.testimonial.title') }}
                        </a>
                    </li>
                @endcan
                @can('gallery_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/galleries*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.galleries.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.gallery.title') }}
                        </a>
                    </li>
                @endcan
                @can('youtube_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/youtubes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.youtubes.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.youtube.title') }}
                        </a>
                    </li>
                @endcan
                <li class="items-center">
                    <a class="{{ request()->is("admin/messages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.messages.index") }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if($unreadConversations['all'])
                            <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>


                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>