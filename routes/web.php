<?php

use App\Mail\TestEmail;
use App\Models\blog_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeWebhookController;








Route::get('/test-email', function () {
    $email = 'developerhabib1230@gmail.com';
    Mail::to($email)->send(new TestEmail("This is the custom message from HB"));
    return 'Email sent to ' . $email;
});






Route::get('/test-cron', function () {
    DB::table('cron-test')->insert([
        'text' => "This is it from cron"
    ]);
    return 'added' . now();
});









Route::get('/', function () {
    return view('welcome');
});












Route::get('/consultation', function () {
    return view('consultation');
});











Route::get('/contact', function () {
    return view('contact');
});











Route::get('/services/{service_name}', function ($service_name, Request $request) {
    $id = $request->query('id');
    return view('dynamic_content.price-estimator-frontend', ['service_name' => $service_name, 'service_id' => $id]);
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
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.admin_dashboard');
});













Route::get('/admin_dashboard/blogs', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.blogs');
});










Route::get('/admin_dashboard/blogs/blogs_manage', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.blogs_manage');
});












Route::get('/admin_dashboard/blogs/blogs_manage/blog_edit/{blog_slug}', function ($blog_slug) {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.blog_edit', ['blog_slug' => $blog_slug]);
});











Route::get('/admin_dashboard/site-configuration', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.site-configuration');
});











Route::get('/admin_dashboard/appointments', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.appointments');
});











Route::get('/admin_dashboard/appointments/fulfilled_appointments', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.fulfilled_appointments');
});












Route::get('/admin_dashboard/appointments/unfulfilled_appointments', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.unfulfilled_appointments');
});












Route::get('/admin_dashboard/appointments/unsettled_appointments', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.unsettled_appointments');
});












Route::get('/admin_dashboard/schedules_management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.schedules_management');
});












Route::get('/admin_dashboard/explore_section_management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.explore-section-management');
});











Route::get('/admin_dashboard/portfolio_section_management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.portfolio-section-management');
});










Route::get('/admin_dashboard/price_estimator_management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.price-estimator-management');
});









Route::get('/admin_dashboard/price_estimator_management/manage_cards', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('price_estimator.manage-cards');
});









Route::get('/admin_dashboard/price_estimator_management/manage_card_options', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('price_estimator.manage-card-options');
});











Route::get('/admin_dashboard/price_estimator_management/manage_card_options/{item_id}', function ($item_id) {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('dynamic_content.estimation-item', ['item_id' => $item_id]);
});











Route::get('/admin_dashboard/contact_messages', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.contact-messages');
});











Route::get('/admin_dashboard/static-page-management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.static-page-management');
});











Route::get('/admin_dashboard/static-page-management/about-me', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.static-page-about-me');
});











Route::get('/admin_dashboard/static-page-management/contact-me', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.static-page-contact-me');
});











Route::get('/admin_dashboard/static-page-management/privacy-policy', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.static-page-privacy-policy');
});











Route::get('/admin_dashboard/collaboration-section-management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.collaboration-section-management');
});












Route::get('/admin_dashboard/testimonials-section-management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.testimonials-section-management');
});










Route::get('/admin_dashboard/skills-section-management', function () {
    if (!session()->has('admin_name')) {
        return redirect('/');
    }
    return view('admin_dashboard.skills-section-management');
});













Route::get('/categories/{category_name}', function ($category_name, Request $request) {
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

    // $sitemap->add(
    //     Url::create(env('BASE_LINK') . '/consultation')
    //         ->setLastModificationDate(now())
    //         ->setChangeFrequency('monthly')
    //         ->setPriority(0.7)
    // );

    // Write the sitemap to the specified path
    $sitemap->writeToFile($path);

    return response()->json(['message' => 'Sitemap generated successfully!']);
});

Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook'])->name('cashier.webhook');
