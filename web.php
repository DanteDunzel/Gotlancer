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

//Route::get('/', function () {Have an account?
//    return view('welcome');
//});20



Route::group(['prefix' => '/'], function () {
    Route::get('/', 'FrontPageController@index')->middleware('guest');
    Route::post('/postregister', 'FrontPageController@postRegister');
    Route::post('/post-validate', 'FrontPageController@postValidate');
    Route::get('/selection', 'FrontPageController@selection');
    Route::get('/apply-for-freelancer', 'ApplyAsFreelancerController@applyAsFreelancer')->middleware('freelancer');
    Route::get('/apply-for-freelancer-new', 'ApplyAsFreelancerController@applyForFreelancerNew');
    // Route::get('/apply-as-freelancerold', 'FrontPageController@applyAsFreelancer_temp')->middleware('freelancer');
    // Route::get('/apply-as-freelancer_new', 'FrontPageController@applyAsFreelancer')->middleware('freelancer');
    Route::post('post-apply-freelancer', 'ApplyAsFreelancerController@postApplyFreelancer');
    Route::post('post-apply-freelancer-new', 'ApplyAsFreelancerController@postApplyFreelancerNew');


    Route::get('/under-review', 'FrontPageController@underReview')->middleware('freelancer');
    Route::get('/under-reviews', 'ApplyAsFreelancerController@underReviews')->middleware('freelancer');

    // Route::get('/browse-project', 'ProjectBrowseController@index');

    Route::get('/reset-success', 'FrontPageController@resetSuccess');
    Route::get('rejected', 'FrontPageController@rejected')->name('freelancer');
    Route::post('/post-apply-as-freelancer', 'FrontPageController@postapplyAsFreelancer');
    Route::get('/getsubcategories', 'FrontPageController@getSubCategories');
    Route::get('/getcategories', 'FrontPageController@getCategories');

    Route::get('/post-a-project', 'PostProjectController@index')->name('post-a-project')->middleware('role:Buyer');
    Route::post('/post-a-project/add-project', 'PostProjectController@store')->name('post-a-project-store')->middleware('role:Buyer');
    Route::get('/ajax-get-sub-categories', 'CategoryController@getAjaxSubCategories')->name('ajax-sub-categories');
    Route::get('/ajax-get-sub-categories-count', 'CategoryController@getAjaxSubCategoriesWithCount')->name('ajax-sub-categories-count');
    Route::get('/ajax-get-skills', 'SkillsController@getAjaxSkills')->name('ajax-skills');
    Route::get('/post-a-project/checkout', 'PostProjectController@checkout')->name('project-checkout')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/proposal', 'PostProjectController@manage')->name('proposal')->middleware('role:Buyer');

    Route::get('/project/{type}/{id}/Hired-Freelancer', 'PostProjectController@hiredFreelancer')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Project-Details', 'PostProjectController@projectDetails')->name('post-project-details')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Payment', 'PostProjectController@payment')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Payment/checkout/{inv_id}', 'BuyerInvoiceController@confirmInvoice')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/view-invoice/{inv_id}', 'BuyerInvoiceController@view_invoice')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Work-Diary', 'PostProjectController@workDaily')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Upgrade', 'PostProjectController@upgrade')->middleware('role:Buyer');

    Route::post('/project/Upgrade/post-listing-checkout', 'PayForUpgradingListController@invoiceCheckout');
    Route::get('/project/Upgrade/pay-invoice-success', 'PayForUpgradingListController@payInvoiceSuccess');
    Route::post('/project/Upgrade/post-paypal-buy-listing', 'PayForUpgradingListController@postPaypalCheckout');
    Route::get('/project/Upgrade/pay-invoice-success-paypal', 'PayForUpgradingListController@payInvoicePaypal');
    Route::get(
        '/project/Upgrade/gethash',
        [
            'as' => 'gethash', 'uses' => 'PayForUpgradingListController@getPayuHash'
        ]
    );
    Route::post(
        '/project/Upgrade/payu-success',
        [
            'as' => 'payu-success', 'uses' => 'PayForUpgradingListController@payuSuccess'
        ]
    );
    Route::post(
        '/project/Upgrade/post-buy-balance',
        [
            'as' => 'post-buy-balance', 'uses' => 'PayForUpgradingListController@postBuybalance'
        ]
    );

    Route::post('/project/{type}/{id}/Upgrade-Store', 'PostProjectController@upgradeStore')->middleware('role:Buyer');
    Route::get('project/{type}/{id}/Upgrade/checkout', 'PayForUpgradingListController@confirmPay')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Files', 'PostProjectController@getFiles')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Feedback', 'PostProjectController@getFeedBack')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/End-Contract', 'PostProjectController@endContract')->middleware('role:Buyer');
    Route::get('/project/{type}/{id}/Add-Hours', 'PostProjectController@getHours')->middleware('role:Buyer');
    Route::post('/project/action-invoice', 'PostProjectController@actionInvoice')->middleware('role:Buyer');


    Route::get('/project/hourly/{id}/Project-Details', 'PostProjectController@projectDetails')->name('project-details-hourly');

    Route::get('/project/update-bundle', 'PostProjectController@updateCredit');
    Route::post('/project/post-credit-checkout', 'PostProjectController@creditCheckout');
    Route::get('/project/buy-credit-success', 'PostProjectController@buyCreditSuccess');
    Route::post('/project/post-paypal-buy-credit', 'PostProjectController@postPaypalCheckout');
    Route::get('/project/pay-success-paypal', 'PostProjectController@paySuccessPaypal');
    Route::get(
        '/project/gethash',
        [
            'as' => 'gethash', 'uses' => 'PostProjectController@getPayuHash'
        ]
    );
    Route::post(
        '/project/payu-success',
        [
            'as' => 'payu-success', 'uses' => 'PostProjectController@payuSuccess'
        ]
    );
    Route::post(
        '/project/post-buy-balance',
        [
            'as' => 'post-buy-balance', 'uses' => 'PostProjectController@postBuybalance'
        ]
    );

    Route::get('/my-projects-table', 'MyProjectsController@getProjects');
    Route::get('/project', 'MyProjectsController@applyProject');
    Route::get('/project/{projectType}/{projectId}/apply-on-project', 'MyProjectsController@applyOnProject')->name('applyOnProjects')->middleware('freelancer');

    Route::get('/find-freelancer', 'SearchOfBuyerController@findFreelancer')->middleware('role:Buyer');

    Route::get('/find-jobs', 'Freelancer\ProjectBrowseFreelancerController@findJobs')->middleware('freelancer');

    //Route::post('save-photo', 'FrontPageController@save');//store
    //Route::post('store', 'ApplyAsFreelancerController@store');
});


//Freelancer Routes Here
Route::group(['prefix' => 'freelancer', 'namespace' => 'Freelancer', 'middleware' => 'role:Freelancer'], function () {

    Route::get('/buy-porposal-credit', 'BidingController@buyCredit');
    Route::get('payment-confirm-page', 'BidingController@confirmPage');

    Route::get('/update-bundle', 'BidingController@updateCredit');
    Route::post('post-credit-checkout', 'BidingController@creditCheckout');
    Route::get('buy-credit-success', 'BidingController@buyCreditSuccess');
    Route::post('post-paypal-buy-credit', 'BidingController@postPaypalCheckout');
    Route::get('buy-credit-success-paypal', 'BidingController@buyCreditSuccessPaypal');
    Route::get(
        '/gethash',
        [
            'as' => 'gethash', 'uses' => 'BidingController@getPayuHash'
        ]
    );
    Route::post(
        '/payu-success',
        [
            'as' => 'payu-success', 'uses' => 'BidingController@payuSuccess'
        ]
    );
    Route::post(
        '/post-buy-balance',
        [
            'as' => 'post-buy-balance', 'uses' => 'BidingController@postBuybalance'
        ]
    );

    Route::get(
        '/{p_type}/{unique_id}/project-details',
        [
            'as' => 'project-details', 'uses' => 'ProjectController@getProjectDetails'
        ]
    );
});

Route::group(['prefix' => 'fr', 'namespace' => 'Freelancer', 'middleware' => 'role:Freelancer'], function () {

    Route::get('/project/{type}/{id}/view-invoice/{inv_id}', 'ProjectManagementController@view_invoice');
    Route::post('project/action-invoice', 'ProjectManagementController@actionInvoice');
    Route::get('/project/{type}/{id}/Project-Details', 'ProjectManagementController@projectDetails')->name('fr-project-details');
    Route::get('/project/{type}/{id}/Hiring-Details', 'ProjectManagementController@hiringDetails')->name('fr-hiring-details');
    Route::post('/project/{type}/{id}/Hiring-Details/leave-feedback', 'ProjectManagementController@leave_feedback')->name('fr-leave-feedback');
    Route::get('/project/{type}/{id}/Payment', 'ProjectManagementController@payment')->name('fr-project-payment');
    Route::get('/project/{type}/{id}/Files', 'ProjectManagementController@getFiles')->name('fr-project-files');
    Route::get('/project/{type}/{id}/Feedback', 'ProjectManagementController@getFeedBack')->name('fr-project-feedbacks');
    Route::get('/project/{type}/{id}/Work-Diary', 'ProjectManagementController@workDaily')->name('fr-project-work-diary');
    Route::get('/project/{type}/{id}/Add-Hours', 'ProjectManagementController@addHours')->name('fr-project-add-hour');
    Route::post('/project/{type}/{id}/submit-adding-hours', 'ProjectManagementController@submitAddingHours')->name('submit-adding-hours');
    Route::post('/project/{type}/{id}/submit-create-invoice', 'ProjectManagementController@submitCreateInvoice')->name('submit-create-invoice');
    Route::get(
        '/my-projects',
        [
            'as' => 'show-project-list', 'uses' => 'ShowMyProjectListController@index'
        ]
    );
    Route::post(
        '/my-projects/updatestatus',
        [
            'as' => 'hire_update_status', 'uses' => 'ShowMyProjectListController@update_status'
        ]
    );
    Route::get(
        '/browse-freelancer',
        [
            'as' => 'browse-freelancer', 'uses' => 'SearchFreelancerController@browseFreelancer'
        ]
    );
});

Route::group(['prefix' => 'b', 'middleware' => 'role:Buyer'], function () {

    Route::post('post-invoice-checkout', 'BuyerInvoiceController@invoiceCheckout');
    Route::get('pay-invoice-success', 'BuyerInvoiceController@payInvoiceSuccess');
    Route::post('post-paypal-buy-credit', 'BuyerInvoiceController@postPaypalCheckout');
    Route::get('pay-invoice-success-paypal', 'BuyerInvoiceController@payInvoicePaypal');
    Route::get(
        '/gethash',
        [
            'as' => 'gethash', 'uses' => 'BuyerInvoiceController@getPayuHash'
        ]
    );
    Route::post(
        '/payu-success',
        [
            'as' => 'payu-success', 'uses' => 'BuyerInvoiceController@payuSuccess'
        ]
    );
    Route::post(
        '/post-buy-balance',
        [
            'as' => 'post-buy-balance', 'uses' => 'BuyerInvoiceController@postBuybalance'
        ]
    );

    Route::get(
        '/browse-project',
        [
            'as' => 'browse-project', 'uses' => 'ProjectBrowseBuyerController@index'
        ]
    );
});

Auth::routes(['verify' => true]);
Route::any(
    '/admin/login',
    [
        'as' => 'adminlogin', 'uses' => 'AdminController@login'
    ]
);
Route::get('admin/getTags', 'TagsController@getTags');

Route::get('admin/getSkills', 'SkillsController@getSkills');
Route::get('/getSkills', 'FreelancerSkillController@index');

Route::get('admin/getDepartment', 'AdminDepartmentController@getDepartment');
Route::get('/admin/pending-project', 'PendingProjectActionController@index')->name('pending-project');
Route::post('/admin/pending-project/updatestatus', 'PendingProjectActionController@update_status')->name('update_status');



Route::group(['prefix' => '/', 'namespace' => 'Freelancer'], function () {
    Route::get(
        '/membership',
        [
            'as' => 'membership', 'uses' => 'PlaneController@index'
        ]
    );
    Route::get(
        '/confirm-plan-payment',
        [
            'as' => 'confirm-plan-payment', 'uses' => 'PlaneController@confirmPlanPayment'
        ]
    );
    Route::post(
        '/post-confirm-plan-payment',
        [
            'as' => 'confirm-plan-payment', 'uses' => 'PlaneController@confirmBuyPlan'
        ]
    );
    Route::get(
        '/select-plan',
        [
            'as' => 'select-plan', 'uses' => 'PlaneController@selectPlan'
        ]
    );
    Route::get(
        '/post-buy-plan',
        [
            'as' => 'post-buy-plan', 'uses' => 'PlaneController@postBuyPlan'
        ]
    );
    Route::get(
        '/stripe-plan-success',
        [
            'as' => 'stripe-plan-success', 'uses' => 'PlaneController@stripePlanSuccess'
        ]
    );
    Route::post(
        '/payu-success-plan',
        [
            'as' => '/payu-success-plan', 'uses' => 'PlaneController@payuPlanSuccess'
        ]
    );
    Route::post(
        '/paypal-buy-plan',
        [
            'as' => '/paypal-buy-plan', 'uses' => 'PlaneController@buyPaypalPlan'
        ]
    );
    Route::get(
        '/paypal-plan-success',
        [
            'as' => 'paypal-plan-success', 'uses' => 'PlaneController@paypalPlanSuccess'
        ]
    );
    Route::get(
        '/membership-history',
        [
            'as' => 'membership-history', 'uses' => 'PlaneController@planHistory'
        ]
    );

    Route::get(
        '/get-plan-history',
        [
            'as' => 'get-plan-history', 'uses' => 'PlaneController@getplanHistory'
        ]
    );
});


Route::get(
    '/project-payment-success',
    [
        'as' => 'project-payment-success', 'uses' => 'BuyerInvoiceController@paymentSuccessView'
    ]
);


Route::get(
    'project/Upgrade/project-payment-success',
    [
        'as' => 'project-payment-success', 'uses' => 'PayForUpgradingListController@paymentSuccessView'
    ]
);

Route::group(['prefix' => '/', 'namespace' => 'Common', 'middleware' => 'role:Buyer,Freelancer'], function () {


    Route::post('make-conversation', 'ConversationController@store')->name("make-conversation");
    Route::post('make-conversation-ajax', 'ConversationController@storeAjax')->name("make-conversation-ajax");
    Route::get('get-client-conversation', 'ConversationController@clientConversation');
    Route::get('get-freelancer-conversation', 'ConversationController@freelancerConversation');


    Route::get(
        '/deposit',
        [
            'as' => 'deposit', 'uses' => 'DepositeFundController@deposit'
        ]
    );
    Route::get(
        '/getpaymentcurrencies',
        [
            'as' => 'getpaymentcurrencies', 'uses' => 'DepositeFundController@getPaymentCurrencies'
        ]
    );
    Route::get(
        '/stripe-checkout',
        [
            'as' => 'stripe-checkout', 'uses' => 'DepositeFundController@stripeCheckout'
        ]
    );
    Route::get(
        '/getcurrencydetails',
        [
            'as' => 'getcurrencydetails', 'uses' => 'DepositeFundController@getCurrencyDetails'
        ]
    );
    Route::post(
        '/post-checkout',
        [
            'as' => 'post-checkout', 'uses' => 'DepositeFundController@postCheckout'
        ]
    );
    Route::post(
        '/post-paypal-checkout',
        [
            'as' => 'post-paypal-checkout', 'uses' => 'DepositeFundController@postPaypalCheckout'
        ]
    );
    Route::get(
        '/paymentsuccess',
        [
            'as' => 'paymentsuccess', 'uses' => 'DepositeFundController@paymentSuccess'
        ]
    );
    Route::get(
        '/paypal-payment-success',
        [
            'as' => 'paypal-payment-success', 'uses' => 'DepositeFundController@paypalPaymentSuccess'
        ]
    );
    Route::get(
        '/payment-success',
        [
            'as' => 'payment-success', 'uses' => 'DepositeFundController@paymentSuccessView'
        ]
    );

    Route::get(
        '/payment-history',
        [
            'as' => 'payment-history', 'uses' => 'DepositeFundController@paymentHistory'
        ]
    );
    Route::get(
        '/get-payment-history',
        [
            'as' => 'get-payment-history', 'uses' => 'DepositeFundController@getPaymentHistory'
        ]
    );


    Route::get(
        '/gethash',
        [
            'as' => 'gethash', 'uses' => 'DepositeFundController@getPayuHas'
        ]
    );
    Route::post(
        '/payu-response',
        [
            'as' => 'payu-response', 'uses' => 'DepositeFundController@payuResponse'
        ]
    );

    Route::group(['prefix' => 'exchanges'], function () {

        Route::get('/process', 'ExchangesController@process');

        Route::get('/', 'ExchangesController@index');
        Route::post('/', 'ExchangesController@store');
        Route::get('/{id}', 'ExchangesController@show');
        Route::put('/{id}', 'ExchangesController@update');
        Route::delete('/{id}', 'ExchangesController@delete');
    });



    Route::get(
        '/dispute-Management',
        [
            'as' => 'dispute-Management', 'uses' => 'ManagementController@index'
        ]
    );
    Route::get(
        '/invoice',
        [
            'as' => 'invoice', 'uses' => 'ManagementController@getInvoice'
        ]
    );
    Route::get(
        '/inbox',
        [
            'as' => 'inbox', 'uses' => 'MessageController@index'
        ]
    );
    Route::get(
        '/inbox/{username}/{projectid}',
        [
            'as' => 'inbox-select', 'uses' => 'MessageController@inbox'
        ]
    );
});

Route::group(['prefix' => 'admin', 'middleware' => 'role:Admin'], function () {
    Route::get(
        '/',
        [
            'as' => 'action-admin', 'uses' => 'AdminController@index'
        ]
    );

    // listings
    Route::group(['prefix' => 'project-listing-management'], function () {
        //project
        Route::get('', 'ListingController@projectListing')->name('project.listing');
        Route::get('/add', 'ListingController@projectListingAdd')->name('project.listing.add');
        Route::post('/add', 'ListingController@projectListingSave')->name('project.listing.save');
        Route::get('/edit/{id}', 'ListingController@projectListingEdit')->name('project.listing.edit');
        Route::post('/update/{id}', 'ListingController@projectListingUpdate')->name('project.listing.update');
        Route::get('/delete/{id}', 'ListingController@projectListingDelete')->name('project.listing.delete');
    });

    // withdrawl approve
    Route::group(['prefix' => 'withdrawl/approve'], function () {

        // bank accounts
        Route::get('/indian-bank-account', 'AdminWithdrawApproveController@indianBankAccounts')->name('withdrawl-indian-account');
        Route::get('/indian-bank-account/approve/{id}', 'AdminWithdrawApproveController@indianBankAccountApprove')->name('withdrawl-indian-account-approve');
        Route::get('/indian-bank-account/reject/{id}', 'AdminWithdrawApproveController@indianBankAccountReject')->name('withdrawl-indian-account-reject');

        // paypal accounts
        Route::get('/paypal-account', 'AdminWithdrawApproveController@payPalAccounts')->name('withdrawl-paypal-account');
        Route::get('/paypal-account/approve/{id}', 'AdminWithdrawApproveController@payPalAccountApprove')->name('withdrawl-paypal-account-approve');
        Route::get('/paypal-account/reject/{id}', 'AdminWithdrawApproveController@payPalBankAccountReject')->name('withdrawl-paypal--account-reject');

        // skrill accounts
        Route::get('/skrill-account', 'AdminWithdrawApproveController@skrillAccounts')->name('withdrawl-skrill-account');
        Route::get('/skrill-account/approve/{id}', 'AdminWithdrawApproveController@skrillAccountApprove')->name('withdrawl-skrill-account-approve');
        Route::get('/skrill-account/reject/{id}', 'AdminWithdrawApproveController@skrillAccountReject')->name('withdrawl-skrill--account-reject');

        // payoneer accounts
        Route::get('/payoneer-account', 'AdminWithdrawApproveController@payoneerAccounts')->name('withdrawl-payoneer-account');
        Route::get('/payoneer-account/approve/{id}', 'AdminWithdrawApproveController@payoneerAccountApprove')->name('withdrawl-payoneer-account-approve');
        Route::get('/payoneer-account/reject/{id}', 'AdminWithdrawApproveController@payoneerAccountReject')->name('withdrawl-payoneer--account-reject');

        // nagad accounts
        Route::get('/nagad-account', 'AdminWithdrawApproveController@nagadAccounts')->name('withdrawl-nagad-account');
        Route::get('/nagad-account/approve/{id}', 'AdminWithdrawApproveController@nagadAccountApprove')->name('withdrawl-nagad-account-approve');
        Route::get('/nagad-account/reject/{id}', 'AdminWithdrawApproveController@nagadAccountReject')->name('withdrawl-nagad--account-reject');
    });


    Route::get(
        '/payment-request',
        [
            'as' => 'payment-request', 'uses' => 'AdminPaymentController@paymentRequest'
        ]
    );
    Route::get(
        '/get-request',
        [
            'as' => 'get-request', 'uses' => 'AdminPaymentController@getRequests'
        ]
    );
    Route::post(
        '/update-transaction-status',
        [
            'as' => 'update-transaction-status', 'uses' => 'AdminPaymentController@updatePaymentStatus'
        ]
    );
    Route::get(
        '/porposal-bundle',
        [
            'as' => 'porposal-bundle', 'uses' => 'AdminPaymentController@porpopsalBundle'
        ]
    );
    Route::get(
        '/get-porposal-bundle',
        [
            'as' => 'get-porposal-bundle', 'uses' => 'AdminPaymentController@getPorposalBundle'
        ]
    );
    Route::post(
        '/post-porposal-bundle',
        [
            'as' => 'post-porposal-bundle', 'uses' => 'AdminPaymentController@postPorposalBundle'
        ]
    );

    Route::get(
        '/manage-withdrawal-method',
        [
            'as' => 'manage-withdrawal-method', 'uses' => 'AdminWithdrawController@manageWithdraw'
        ]
    );

    Route::get(
        '/setup-withdrawal-method',
        [
            'as' => 'setup-withdrawal-method', 'uses' => 'AdminWithdrawController@setupWithdraw'
        ]
    );

    Route::get(
        '/request-withdrawal',
        [
            'as' => 'request-withdrawal', 'uses' => 'AdminWithdrawController@requestWithdraw'
        ]
    );

    Route::get(
        '/deactivate-accounts',
        [
            'as' => 'deactivate-accounts', 'uses' => 'AdminUserController@deactivateAccounts'
        ]
    );

    Route::get(
        '/manage-documents',
        [
            'as' => 'manage-documents', 'uses' => 'AdminUserController@manageDocuments'
        ]
    );

    Route::get(
        '/add-tax-method',
        [
            'as' => 'add-tax-method', 'uses' => 'AdminPaymentController@addTaxMethod'
        ]
    );

    Route::get(
        '/manage-membership',
        [
            'as' => 'manage-membership', 'uses' => 'AdminUserController@manageMembership'
        ]
    );

    Route::post(
        '/manage-membership-update',
        [
            'as' => 'manage-membership-update', 'uses' => 'AdminUserController@membershipUpdate'
        ]
    );

    Route::get(
        '/get-membership-request',
        [
            'as' => 'get-membership-request', 'uses' => 'AdminUserController@getMembershipRequest'
        ]
    );

    Route::group(['prefix' => 'paymentmethod'], function () {

        Route::get(
            '/allowed-country',
            [
                'as' => 'allowed-country', 'uses' => 'AdminPaymentController@allowedCountry'
            ]
        );
        Route::get(
            '/getpaymentscountries',
            [
                'as' => 'getpaymentscountries', 'uses' => 'AdminPaymentController@getPaymentsCountries'
            ]
        );
        Route::get(
            '/getcountries',
            [
                'as' => 'getcountries', 'uses' => 'AdminPaymentController@getCountries'
            ]
        );
        Route::get(
            '/getcurrencies',
            [
                'as' => 'getcurrencies', 'uses' => 'AdminPaymentController@getCurrencies'
            ]
        );

        Route::post(
            '/storepaymentcountry',
            [
                'as' => 'storepaymentcountry', 'uses' => 'AdminPaymentController@storePaymentCountry'
            ]
        );

        Route::put(
            '/updatepaymentcountry',
            [
                'as' => 'storepaymenupdatepaymentcountrytcountry', 'uses' => 'AdminPaymentController@updatePaymentCountry'
            ]
        );
        Route::get(
            '/currency-limit',
            [
                'as' => 'currency-limit', 'uses' => 'AdminPaymentController@currrencyLimit'
            ]
        );
        Route::get(
            '/getcurrency-limites',
            [
                'as' => 'currency-limit', 'uses' => 'AdminPaymentController@getCurrencyLimites'
            ]
        );
        Route::post(
            '/post-currency-limit',
            [
                'as' => 'post-currency-limit', 'uses' => 'AdminPaymentController@postCurrencyLimit'
            ]
        );


        Route::post(
            '/post-setting',
            [
                'as' => 'post-setting-payment', 'uses' => 'AdminPaymentController@postPaymentSetting'
            ]
        );
        Route::get(
            '/setting',
            [
                'as' => 'payment-setting', 'uses' => 'AdminPaymentController@paymentSeting'
            ]
        );

        Route::get(
            '/country-management ',
            [
                'as' => 'country-management ', 'uses' => 'AdminPaymentController@index'
            ]
        );
    });


    Route::group(['prefix' => 'currency'], function () {

        Route::get(
            '/exchange-rate',
            [
                'as' => '/exchange-rate', 'uses' => 'CurrencyExchangeController@index'
            ]
        );
        Route::get(
            'get-currency-rate',
            [
                'as' => 'get-currency-rate', 'uses' => 'CurrencyExchangeController@getCurrencyRate'
            ]
        );
        Route::post(
            'post-exchange-rate',
            [
                'as' => 'post-exchange-rate', 'uses' => 'CurrencyExchangeController@postExchange'
            ]
        );
    });


    Route::get('/tags', 'TagsController@index')->name('admin.tags');
    Route::post('/getTags', 'TagsController@store');

    Route::get('/skills', 'SkillsController@index')->name('admin.skills');
    Route::get('/skills/add', 'SkillsController@create')->name('admin.skills.create');
    Route::post('/skills/add', 'SkillsController@store')->name('admin.skills.store');
    Route::get('/skills/delete/{id}', 'SkillsController@destroy')->name('admin.skills.destroy');
    Route::get('/skills/edit/{id}', 'SkillsController@edit')->name('admin.skills.edit');
    Route::post('/skills/edit/{id}', 'SkillsController@update')->name('admin.skills.update');

    Route::post('/getSkills', 'SkillsController@store');

    Route::get('/department', 'AdminDepartmentController@index')->name('admin.department');
    Route::post('/getDepartment', 'AdminDepartmentController@store');
    //Plans
    Route::get('plan', 'AdminPlanController@index');
    Route::post('plan/store-plan', 'AdminPlanController@storePlan');
    Route::get('plan/all', 'AdminPlanController@allPlan');
    Route::get('plan/getall', 'AdminPlanController@getAll');
    Route::get('edit/plan/{id}', 'AdminPlanController@editPlan');
    Route::post('plan/edi-plan/{id}', 'AdminPlanController@postEditPlan');
    Route::get('/delete/plan/{id}', 'AdminPlanController@deletePlan');


    Route::group(['prefix' => 'freelancer'], function () {

        Route::get(
            '/category',
            [
                'as' => 'category', 'uses' => 'CategoryController@freeLancerCategory'
            ]
        );
        Route::get(
            '/getcategories',
            [
                'as' => 'getcategories', 'uses' => 'CategoryController@getCategories'
            ]
        );

        Route::get(
            '/getparentcategory',
            [
                'as' => 'getparentcategory', 'uses' => 'CategoryController@getParentCategory'
            ]
        );
        Route::post(
            '/storecategory',
            [
                'as' => 'storecategory', 'uses' => 'CategoryController@storeCategory'
            ]
        );
    });

    Route::group(['prefix' => 'users'], function () {
        Route::resource(
            '/',
            'AdminUserController'
        );
        //Route::resource('usersall', 'App\Http\Controllers\AdminUserController');
        Route::get(
            '/getusers',
            [
                'as' => 'getusers', 'uses' => 'AdminUserController@getUsers'
            ]
        );

        Route::post(
            '/updateStatus',
            [
                'as' => 'updateStatus', 'uses' => 'AdminUserController@updateStatus'
            ]
        );
    });

    Route::group(['prefix' => 'verify_kyc'], function () {
        Route::get(
            '/',
            [
                'as' => 'adminkyc', 'uses' => 'AdminKycController@index'
            ]
        );
        Route::get(
            '/getkyc',
            [
                'as' => 'getkyc', 'uses' => 'AdminKycController@getKyc'
            ]
        );
        Route::post(
            '/updateKycStatus',
            [
                'as' => 'updateKycStatus', 'uses' => 'AdminKycController@updateKycStatus'
            ]
        );
    });

    Route::group(['prefix' => 'ticket'], function () {
        Route::get(
            '/',
            [
                'as' => 'adminticket', 'uses' => 'AdminTicketController@index'
            ]
        );
        Route::get(
            '/getticket',
            [
                'as' => 'getticket', 'uses' => 'AdminTicketController@getTicket'
            ]
        );
        Route::post(
            '/updateTicketStatus',
            [
                'as' => 'updateTicketStatus', 'uses' => 'AdminTicketController@updateTicketStatus'
            ]
        );
    });

    Route::get(
        '/markAsResolved/{id}',
        [
            'as' => 'markAsResolved', 'uses' => 'AdminTicketController@markAsResolved'
        ]
    );

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/general', 'AdminSettingController@general')->name('admin.setting.general');
    });
});



Route::get(
    '/chat/{id}',
    [
        'as' => 'adminticket.chat', 'uses' => 'AdminTicketController@show'
    ]
);
Route::post('/chat/send', 'AdminTicketController@sendMessage')->name('adminticket.chat.send');

Route::get('/logout', function () {

    Auth::logout();
    return Redirect::to('login');
})->name('logout');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/payment/billing-method', 'BillingMethodController@index')->name('billing-method')->middleware('auth');
Route::post('/ab/payment/billing-method', 'BillingMethodController@postPaypalCheckout')->name('paypal-add')->middleware('auth');

Route::get('/newsfeed', 'HomeController@newsfeed')->name('newsfeed');

Route::group(['prefix' => 'settings', 'middleware' => 'auth'], function () {
    Route::post('/account-info', 'UserSettingsController@account_post');
    Route::post('/billing-info-save', 'UserSettingsController@billing_post');
    Route::post('/password-security', 'UserSettingsController@password_security_post');
    Route::post('/email', 'UserSettingsController@email');
    Route::post('/password', 'UserSettingsController@password');
    Route::post('/deactivate-account', 'UserSettingsController@deactivateAccount')->name('deactivate-account');

    Route::get('/tax-information/add-pan', 'UserSettingsController@add_pan');
    Route::get('/tax-information/add-gst', 'UserSettingsController@add_gst');
    //Route::get('/get-paid/convert-currency', 'UserSettingsController@convert_currency');

    Route::get('/get-paid/add-bank', 'UserSettingsController@add_bank');
    Route::post('/get-paid/add-bank', 'UserSettingsController@addWithdrawlAccount');
    Route::get('/get-paid/edit-bank/{id}', 'UserSettingsController@edit_bank')->name('edit-bank-details');
    Route::post('/get-paid/edit-bank/{id}', 'UserSettingsController@update_bank')->name('update-bank-details');
    Route::post('/ifsc', 'UserSettingsController@ifsc')->name('ifsc');
    Route::get('/get-paid/add-bkash', 'UserSettingsController@add_bkash');

    Route::get('/get-paid/add-paypal', 'UserSettingsController@add_paypal');
    Route::post('/get-paid/add-paypal', 'UserSettingsController@save_paypal');
    Route::get('/get-paid/edit-paypal/{id}', 'UserSettingsController@edit_paypal')->name('edit-paypal-details');
    Route::post('/get-paid/edit-paypal/{id}', 'UserSettingsController@update_paypal')->name('update-paypal-details');

    // skrill
    Route::get('/get-paid/add-skrill', 'UserSettingsController@add_skrill');
    Route::post('/get-paid/add-skrill', 'UserSettingsController@save_skrill');
    Route::get('/get-paid/edit-skrill/{id}', 'UserSettingsController@edit_skrill')->name('edit-skrill-details');
    Route::post('/get-paid/edit-skrill/{id}', 'UserSettingsController@update_skrill')->name('update-skrill-details');

    // payoneer
    Route::get('/get-paid/add-payoneer', 'UserSettingsController@add_payoneer');
    Route::post('/get-paid/add-payoneer', 'UserSettingsController@save_payoneer');
    Route::get('/get-paid/edit-payoneer/{id}', 'UserSettingsController@edit_payoneer')->name('edit-payoneer-details');
    Route::post('/get-paid/edit-payoneer/{id}', 'UserSettingsController@update_payoneer')->name('update-payoneer-details');

    // nagad
    Route::get('/get-paid/add-nagad', 'UserSettingsController@add_nagad');
    Route::post('/get-paid/add-nagad', 'UserSettingsController@save_nagad');
    Route::get('/get-paid/edit-nagad/{id}', 'UserSettingsController@edit_nagad')->name('edit-nagad-details');
    Route::post('/get-paid/edit-nagad/{id}', 'UserSettingsController@update_nagad')->name('update-nagad-details');
});

// buyer
Route::group(['prefix' => 'br/settings', 'middleware' => 'auth'], function () {
    Route::get('billing-info', 'UserSettingsController@buyer_billing_info')->name('buyer-billing-info');
    Route::get('account-info', 'UserSettingsController@buyer_account_info');
    Route::get('membership-connects', 'UserSettingsController@buyer_membership_connect');
    Route::get('profile-settings', 'UserSettingsController@buyer_profile_settings');
    Route::get('tax-information', 'UserSettingsController@buyer_tax_information');
    Route::get('get-paid', 'UserSettingsController@buyer_get_paid');
    Route::get('password-security', 'UserSettingsController@buyer_password_security');
    Route::get('identity-verification', 'UserSettingsController@buyer_identity_verification');
    Route::get('notification-settings', 'UserSettingsController@buyer_notification_settings');
});
// Freelancer
Route::group(['prefix' => 'fr/settings', 'middleware' => 'auth'], function () {
    Route::get('billing-info', 'UserSettingsController@freelancer_billing_info')->name('freelancer-billing-info');
    Route::get('account-info', 'UserSettingsController@freelancer_account_info');
    Route::get('membership-connects', 'UserSettingsController@freelancer_membership_connect');
    Route::get('profile-settings', 'UserSettingsController@freelancer_profile_settings');
    Route::post('profile-settings', 'UserSettingsController@submit_freelancer_profile_settings');
    Route::get('tax-information', 'UserSettingsController@freelancer_tax_information');
    Route::get('get-paid', 'UserSettingsController@freelancer_get_paid');
    Route::get('password-security', 'UserSettingsController@freelancer_password_security');
    Route::get('identity-verification', 'UserSettingsController@freelancer_identity_verification');
    Route::get('notification-settings', 'UserSettingsController@freelancer_notification_settings');
    // ajax
    Route::get('get_user_address', 'UserSettingsController@freelancer_get_user_address');
});

Route::get('/withdrawal-history', 'WithdrawalsController@index');
Route::get('/earning-history', 'EarningController@index');

Route::resource('/settings', 'UserSettingsController');



Route::resource('/buyer', 'ProfileController');
Route::post('/profilePicUpdate', 'ProfileController@profileImageUpload')->name('profilePicUpload');
Route::post('/freelancer/save_style', 'FreelancerProfileController@save_style')->middleware('auth');
Route::post('/freelancer/save_photo', 'FreelancerProfileController@save_photo')->middleware('auth');
Route::post('/project/{type}/{project_id}/Hired-Freelancer', 'PostProjectController@saveInformation')->middleware('role:Buyer');
Route::get('/project/{type}/{project_id}/Hired-Freelancer/canceled/{user_id}', 'PostProjectController@deal_cancel_contract')->middleware('role:Buyer');
Route::post('/project/{type}/{project_id}/Hired-Freelancer/checking-status', 'PostProjectController@check_status')->middleware('role:Buyer');
Route::post('/project/{type}/{project_id}/Hired-Freelancer/submit-end-contract', 'PostProjectController@submit_end_contract')->middleware('role:Buyer');
Route::post('/project/{type}/{project_id}/Hired-Freelancer/leave-feedback', 'PostProjectController@leave_feedback')->middleware('role:Buyer');
Route::post('/project/{type}/{project_id}/success', 'MyProjectsController@accept_proposal')->name('submit_proposal');
Route::get('/project/{type}/{project_id}/success', 'MyProjectsController@applyOnProject')->name('show_proposal');
Route::resource('/freelancer', 'FreelancerProfileController');
Route::resource('/portfolio', 'PortfolioController');
Route::get('/portfolio/delete/{id}', 'PortfolioController@delete');
Route::post('/portfolio/ajax-store', 'PortfolioController@ajax_store')->name('portfolio.ajax-store');
Route::get('/portfolio/ajax-delete/{id}', 'PortfolioController@ajax_delete')->name('portfolio.ajax-delete');
Route::resource('/work_experience', 'WorkExperienceController');
Route::get('/work_experience/delete/{id}', 'WorkExperienceController@delete');
Route::resource('/certification', 'CertificationController');
Route::get('/certification/delete/{id}', 'CertificationController@delete');
Route::resource('/freelancer_skill', 'FreelancerSkillController');
Route::post('/freelancer_skill/store-array', 'FreelancerSkillController@store_array');
Route::delete('/freelancer_skill/delete/{id}', 'FreelancerSkillController@destroy');

Route::resource('/education', 'EducationController');
Route::get('/education/delete/{id}', 'EducationController@delete');


Route::get('/verify-my-kyc', 'VarifyMyKycController@index');
Route::get('/verify-my-kyc/download/code', 'VarifyMyKycController@download');
Route::post('/verify-my-kyc', 'VarifyMyKycController@store');

Route::resource('/user/ticket', 'UsersTicketController');

Route::get('/getCountries', 'HomeController@getCountries')->name('countries');

// Chat Started From Here ...
Route::group(['prefix' => 'message', 'namespace' => 'Chat'], function () {
    Route::get(
        'contacts',
        [
            'as' => 'message.contacts', 'uses' => 'ChatController@contacts'
        ]
    );
    Route::get(
        'conversation/{conversation}',
        [
            'as' => 'message.conversation', 'uses' => 'ChatController@getMessagesFor'
        ]
    );
    Route::post(
        'send',
        [
            'as' => 'message.send', 'uses' => 'ChatController@send'
        ]
    );
    Route::post(
        'file',
        [
            'as' => 'message.file', 'uses' => 'ChatController@file'
        ]
    );
    Route::get(
        'read/{conversation}',
        [
            'as' => 'message.read', 'uses' => 'ChatController@read'
        ]
    );
    Route::get(
        'read-message/{msg_id}',
        [
            'as' => 'message.readMessage', 'uses' => 'ChatController@readMessage'
        ]
    );
});


//Route::get('/membership', 'MembershipController@index')->name('membership.index');




// Route::get('freelancers/{category}/{subCategory}/{country}', 'BrowseProjectController@categoryCountry')->name('freelancers.categoryCountry');
// Route::get('freelancers/{country}/', 'BrowseProjectController@country')->name('freelancers.country');
