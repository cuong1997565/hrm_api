<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use Dusterio\LumenPassport\LumenPassport;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\User::class => \App\Policies\UserPolicy::class,
        \App\Repositories\Roles\Role::class => \App\Policies\RolePolicy::class,
        \App\Repositories\Settings\Setting::class => \App\Policies\SettingPolicy::class,
        \App\Repositories\Branches\Branch::class => \App\Policies\BranchPolicy::class,
        \App\Repositories\Departments\Department::class => \App\Policies\DepartmentPolicy::class,
        \App\Repositories\Positions\Position::class => \App\Policies\PositionPolicy::class,
        \App\Repositories\Plans\Plan::class => \App\Policies\PlanPolicy::class,
        \App\Repositories\Contracts\Contract::class => \App\Policies\ContractPolicy::class,
        \App\Repositories\Candidates\Candidate::class => \App\Policies\CandidatePolicy::class,
        \App\Repositories\Employees\Employee::class => \App\Policies\EmployeePolicy::class,
    ];

    /**
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Get the policies defined on the provider.
     *
     * @return array
     */
    public function policies()
    {
        return $this->policies;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register passport
     * @return void
     */
    private function registerPassport()
    {
        LumenPassport::routes($this->app);
        LumenPassport::tokensExpireIn(\Carbon\Carbon::now()->addYears(1));
        // Somewhere in your application service provider or bootstrap process
        LumenPassport::allowMultipleTokens();
    }

    /**
     * Register gates
     * @return void
     */
    private function registerGates()
    {
        // user
        Gate::define('user.view', 'App\Policies\UserPolicy@view');
        Gate::define('user.create', 'App\Policies\UserPolicy@create');
        Gate::define('user.update', 'App\Policies\UserPolicy@update');
        Gate::define('user.delete', 'App\Policies\UserPolicy@delete');
        // role gate
        Gate::define('role.view', 'App\Policies\RolePolicy@view');
        Gate::define('role.create', 'App\Policies\RolePolicy@create');
        Gate::define('role.update', 'App\Policies\RolePolicy@update');
        Gate::define('role.delete', 'App\Policies\RolePolicy@delete');
        // employee gate
        Gate::define('employee.view', 'App\Policies\EmployeePolicy@view');
        Gate::define('employee.create', 'App\Policies\EmployeePolicy@create');
        Gate::define('employee.update', 'App\Policies\EmployeePolicy@update');
        Gate::define('employee.delete', 'App\Policies\EmployeePolicy@delete');
        // setting gate
        Gate::define('setting.view', 'App\Policies\SettingPolicy@view');
        Gate::define('setting.create', 'App\Policies\SettingPolicy@create');
        Gate::define('setting.update', 'App\Policies\SettingPolicy@update');
        Gate::define('setting.delete', 'App\Policies\SettingPolicy@delete');
        // branch gate
        Gate::define('branch.view', 'App\Policies\BranchPolicy@view');
        Gate::define('branch.create', 'App\Policies\BranchPolicy@create');
        Gate::define('branch.update', 'App\Policies\BranchPolicy@update');
        Gate::define('branch.delete', 'App\Policies\BranchPolicy@delete');
        // department gate
        Gate::define('department.view', 'App\Policies\DepartmentPolicy@view');
        Gate::define('department.create', 'App\Policies\DepartmentPolicy@create');
        Gate::define('department.update', 'App\Policies\DepartmentPolicy@update');
        Gate::define('department.delete', 'App\Policies\DepartmentPolicy@delete');
        // position gate
        Gate::define('position.view', 'App\Policies\PositionPolicy@view');
        Gate::define('position.create', 'App\Policies\PositionPolicy@create');
        Gate::define('position.update', 'App\Policies\PositionPolicy@update');
        Gate::define('position.delete', 'App\Policies\PositionPolicy@delete');
        // plan gate
        Gate::define('plan.view', 'App\Policies\PlanPolicy@view');
        Gate::define('plan.create', 'App\Policies\PlanPolicy@create');
        Gate::define('plan.update', 'App\Policies\PlanPolicy@update');
        Gate::define('plan.delete', 'App\Policies\PlanPolicy@delete');
        Gate::define('plan.approve', 'App\Policies\PlanPolicy@approve');
        // contract gate
        Gate::define('contract.view', 'App\Policies\ContractPolicy@view');
        Gate::define('contract.create', 'App\Policies\ContractPolicy@create');
        Gate::define('contract.update', 'App\Policies\ContractPolicy@update');
        Gate::define('contract.delete', 'App\Policies\ContractPolicy@delete');
        // candidate gate
        Gate::define('candidate.view', 'App\Policies\CandidatePolicy@view');
        Gate::define('candidate.create', 'App\Policies\CandidatePolicy@create');
        Gate::define('candidate.update', 'App\Policies\CandidatePolicy@update');
        Gate::define('candidate.delete', 'App\Policies\CandidatePolicy@delete');
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        // $this->app['auth']->viaRequest('api', function ($request) {
        //     if ($request->input('api_token')) {
        //         return User::where('api_token', $request->input('api_token'))->first();
        //     }
        // });
        //
        //
        //

        $this->registerPassport();
        $this->registerPolicies();
        $this->registerGates();
    }
}
