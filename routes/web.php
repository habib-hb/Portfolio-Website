<?php

use App\Models\blog_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('/', function () {
    return view('welcome');
});













Route::get('/consultation', function () {
    return view('consultation');
});











Route::get('/contact', function () {
    return view('contact');
});















Route::get('/services/full-project', function () {
    return view('services.full-project');
});











Route::get('/services/front-end', function () {
    return view('services.front-end');
});










Route::get('/services/back-end', function () {
    return view('services.back-end');
});









Route::get('/services/figma-design', function () {
    return view('services.figma-design');
});









Route::get('/services/wordpress', function () {
    return view('services.wordpress');
});











Route::get('/services/error-fixing', function () {
    return view('services.error-fixing');
});









Route::get('/services/test', function () {
    return view('services.test');
});









Route::get('/services/{service_name}', function ($service_name , Request $request){
    $id = $request->query('id');
    return view('dynamic_content.price-estimator-frontend' , ['service_name' => $service_name, 'service_id' => $id]);
});











Route::get('/details/full-project', function () {
    return view('details.details-full-project');
});











Route::get('/details/front-end', function () {
    return view('details.details-front-end');
});












Route::get('/details/back-end', function () {
    return view('details.details-back-end');
});











Route::get('/details/figma-design', function () {
    return view('details.details-figma-design');
});











Route::get('/details/wordpress', function () {
    return view('details.details-wordpress');
});











Route::get('/details/error-fixing', function () {
    return view('details.details-error-fixing');
});











Route::get('/admin_dashboard', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.admin_dashboard');
});













Route::get('/admin_dashboard/blogs', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.blogs');
});










Route::get('/admin_dashboard/blogs/blogs_manage', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.blogs_manage');
});












Route::get('/admin_dashboard/blogs/blogs_manage/blog_edit/{blog_slug}', function ($blog_slug) {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.blog_edit', ['blog_slug' => $blog_slug ]);
});











Route::get('/admin_dashboard/headlines', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.banner_headline');
});











Route::get('/admin_dashboard/appointments', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.appointments');
});











Route::get('/admin_dashboard/appointments/fulfilled_appointments', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.fulfilled_appointments');
});












Route::get('/admin_dashboard/appointments/unfulfilled_appointments', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.unfulfilled_appointments');
});












Route::get('/admin_dashboard/appointments/unsettled_appointments', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.unsettled_appointments');
});












Route::get('/admin_dashboard/schedules_management', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.schedules_management');
});












Route::get('/admin_dashboard/explore_section_management', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.explore-section-management');
});











Route::get('/admin_dashboard/portfolio_section_management', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.portfolio-section-management');
});










Route::get('/admin_dashboard/price_estimator_management', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.price-estimator-management');
});









Route::get('/admin_dashboard/price_estimator_management/manage_cards', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('price_estimator.manage-cards');
});









Route::get('/admin_dashboard/price_estimator_management/manage_card_options', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('price_estimator.manage-card-options');
});











Route::get('/admin_dashboard/price_estimator_management/manage_card_options/{item_id}', function ($item_id) {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('dynamic_content.estimation-item' , ['item_id' => $item_id]);
});











Route::get('/admin_dashboard/contact_messages', function () {
    if(!session()->has('admin_name')){
        return redirect('/');
    }
    return view('admin_dashboard.contact-messages');
});













Route::get('/categories/{category_name}', function ($category_name, Request $request){
    $id = $request->query('id'); // Get the 'id' query parameter

    return view('dynamic_content.single-category-page', ['category_name' => $category_name, 'category_id' => $id]);
});












Route::get('/blogs/{slug}', function ($slug) {
    $post = blog_posts::where('blog_link', '/blogs/' . $slug)->first();
    return view('dynamic_content.custom_blog', ['post' => $post]);
});












Route::get('/blog_showcase', function () {

    return view('blog_showcase');

});














Route::get('/privacy_policy', function () {

    return view('privacy_policy');

});













Route::get('/about', function () {

    return view('about');

});













Route::get('/generate-sitemap', function () {
    // Specify the path where I want to save the sitemap
    $path = public_path('sitemap.xml'); // You can change the path as needed

    // Create a new Sitemap instance
    $sitemap = Sitemap::create();


    $custom_blogs = blog_posts::where('blog_type', 'custom')->get();
    foreach ($custom_blogs as $custom_blog) {
        $sitemap->add(
            Url::create(env('BASE_LINK') . $custom_blog->blog_link)
                ->setLastModificationDate(now())
                ->setChangeFrequency('monthly')
                ->setPriority(0.7)
        );
    }


    $default_pages = blog_posts::where('blog_type', 'default')->get();
    foreach ($default_pages as $default_page) {
        $sitemap->add(
            Url::create(env('BASE_LINK') . $default_page->blog_link)
                ->setLastModificationDate(now())
                ->setChangeFrequency('monthly')
                ->setPriority(0.7)
        );


        $default_link = $default_page->blog_link;

        // Specify the string to replace and the new string
        $oldString = "/details/";
        $newString = "/services/";

        // Replace the string
        $newLink = str_replace($oldString, $newString, $default_link);


        $sitemap->add(
            Url::create(env('BASE_LINK') . $newLink)
                ->setLastModificationDate(now())
                ->setChangeFrequency('monthly')
                ->setPriority(0.7)
        );

    }

    $sitemap->add(
        Url::create(env('BASE_LINK') . '/consultation')
            ->setLastModificationDate(now())
            ->setChangeFrequency('monthly')
            ->setPriority(0.7)
    );



    // Write the sitemap to the specified path
    $sitemap->writeToFile($path);

    return response()->json(['message' => 'Sitemap generated successfully!']);
});


