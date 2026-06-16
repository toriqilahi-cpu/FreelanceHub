<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

use App\Http\Controllers\DashboardRedirectController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

use App\Http\Controllers\Client\DashboardController as ClientDashboard;
use App\Http\Controllers\Client\ProjectController;
use App\Http\Controllers\Client\ClientProposalController;
use App\Http\Controllers\Client\ReviewController;
use App\Http\Controllers\Client\FreelancerController;

use App\Http\Controllers\Freelancer\DashboardController as FreelancerDashboard;
use App\Http\Controllers\Freelancer\WorkController;
use App\Http\Controllers\Freelancer\ProposalController;
use App\Http\Controllers\Freelancer\ContractController;
use App\Http\Controllers\Freelancer\ReviewController as FreelancerReviewController;
use App\Http\Controllers\Freelancer\ProfileController;
use App\Http\Controllers\Freelancer\PortfolioController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MessageController;

Route::get(
    '/',
    [HomeController::class, 'index']
);

Route::get(
    '/projects/{project}/detail',
    [ProjectController::class, 'show']
)->name('projects.detail');


/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->get(
        '/dashboard',
        [DashboardRedirectController::class, 'index']
    )
    ->name('dashboard');

Route::middleware('auth')
    ->get(
        '/notifications',
        [NotificationController::class, 'index']
    )
    ->name('notifications.index');

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/payments',
        [PaymentController::class, 'index']
    )->name('payments.index');

    Route::post(
        '/payments/{payment}/pay',
        [PaymentController::class, 'pay']
    )->name('payments.pay');

});
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {

    Route::get(
        '/admin/dashboard',
        [AdminDashboard::class, 'index']
    )->name('admin.dashboard');

    Route::get(
        '/admin/users',
        [UserController::class, 'index']
    )->name('admin.users');

    Route::get(
        '/admin/users/{user}/edit',
        [UserController::class, 'edit']
    )->name('admin.users.edit');

    Route::put(
        '/admin/users/{user}',
        [UserController::class, 'update']
    )->name('admin.users.update');

    Route::delete(
        '/admin/users/{user}',
        [UserController::class, 'destroy']
    )->name('admin.users.destroy');

    Route::get(
        '/admin/projects',
        [AdminProjectController::class, 'index']
    )->name('admin.projects');

    Route::delete(
        '/admin/projects/{project}',
        [AdminProjectController::class, 'destroy']
    )->name('admin.projects.destroy');

});
/*
|--------------------------------------------------------------------------
| Client
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:client'])
    ->group(function () {

        Route::get(
            '/client/dashboard',
            [ClientDashboard::class, 'index']
        )->name('client.dashboard');

        Route::resource(
            'projects',
            ProjectController::class
        )->except(['update']);

        Route::get(
            '/projects/{project}/proposals',
            [ClientProposalController::class, 'index']
        )->name('project.proposals');

        Route::post(
            '/proposal/{proposal}/accept',
            [ClientProposalController::class, 'accept']
        )->name('proposal.accept');

        Route::get(
            '/project/{project}/review',
            [ReviewController::class, 'create']
        )->name('review.create');

        Route::post(
            '/review/store',
            [ReviewController::class, 'store']
        )->name('review.store');

        /*
        |--------------------------------------------------------------------------
        | Lihat Profil Freelancer
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/client/freelancer/{id}',
            [FreelancerController::class, 'show']
        )->name('client.freelancer.show');

        Route::get(
            '/client/portfolio/{portfolio}',
            [FreelancerController::class, 'portfolio']
        )->name('client.portfolio.show');

        Route::get(
            '/freelancers',
            [FreelancerController::class, 'index']
        )->name('client.freelancers.index');

        Route::get(
            '/projects/export/pdf',
            [ProjectController::class, 'exportPdf']
        )->name('projects.pdf');

        Route::get(
            '/projects/export/excel',
            [ProjectController::class, 'exportExcel']
        )->name('projects.excel');

        Route::get(
            '/projects/{project}/edit',
            [ProjectController::class, 'edit']
        )->name('projects.edit');

        Route::put(
            '/projects/{project}',
            [ProjectController::class, 'update']
        )->name('projects.update');

        Route::delete(
            '/projects/{project}',
            [ProjectController::class, 'destroy']
        )->name('projects.destroy');

    });

/*
|--------------------------------------------------------------------------
| Freelancer
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:freelancer'])
    ->group(function () {

        Route::get(
            '/freelancer/dashboard',
            [FreelancerDashboard::class, 'index']
        )->name('freelancer.dashboard');

        Route::get(
            '/find-work',
            [WorkController::class, 'index']
        )->name('find.work');

        Route::get(
            '/proposal/create/{project}',
            [ProposalController::class, 'create']
        )->name('proposal.create');

        Route::post(
            '/proposal/store',
            [ProposalController::class, 'store']
        )->name('proposal.store');

        Route::get(
            '/my-proposals',
            [ProposalController::class, 'myProposal']
        )->name('my.proposals');

        Route::get(
            '/hired-projects',
            [ProposalController::class, 'hiredProjects']
        )->name('hired.projects');

        Route::get(
            '/contracts',
            [ContractController::class, 'index']
        )->name('contracts.index');

        Route::post(
            '/contracts/{contract}/complete',
            [ContractController::class, 'complete']
        )->name('contracts.complete');

        /*
        |--------------------------------------------------------------------------
        | Review Freelancer
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/my-reviews',
            [FreelancerReviewController::class, 'index']
        )->name('reviews.index');

        /*
        |--------------------------------------------------------------------------
        | Profil Freelancer
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/freelancer/profile',
            [ProfileController::class, 'show']
        )->name('freelancer.profile');

        Route::get(
            '/freelancer/profile/edit',
            [ProfileController::class, 'edit']
        )->name('freelancer.profile.edit');

        Route::post(
            '/freelancer/profile/update',
            [ProfileController::class, 'update']
        )->name('freelancer.profile.update');

        Route::get(
            '/portfolio',
            [PortfolioController::class, 'index']
        )->name('portfolio.index');

        Route::get(
            '/portfolio/create',
            [PortfolioController::class, 'create']
        )->name('portfolio.create');

        Route::post(
            '/portfolio/store',
            [PortfolioController::class, 'store']
        )->name('portfolio.store');

        Route::get(
            '/portfolio/{portfolio}/edit',
            [PortfolioController::class, 'edit']
        )->name('portfolio.edit');

        Route::put(
            '/portfolio/{portfolio}',
            [PortfolioController::class, 'update']
        )->name('portfolio.update');

        Route::delete(
            '/portfolio/{portfolio}',
            [PortfolioController::class, 'destroy']
        )->name('portfolio.destroy');

        Route::post(
            '/contracts/{contract}/complete',
            [ContractController::class, 'complete']
        )->name('contracts.complete');

    });

Route::middleware('auth')->group(function () {

    Route::get(
        '/messages',
        [MessageController::class, 'index']
    )->name('messages.index');

    Route::get(
        '/chat/{user}',
        [MessageController::class, 'chat']
    )->name('chat.show');

    Route::post(
        '/chat/send',
        [MessageController::class, 'send']
    )->name('chat.send');

});

require __DIR__ . '/auth.php';

