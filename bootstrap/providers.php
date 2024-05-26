<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,

    Aaran\Aadmin\Providers\AadminServiceProvider::class,
    Aaran\Common\Providers\CommonServiceProvider::class,
    Aaran\Master\Providers\MasterServiceProvider::class,
    Aaran\Entries\Providers\EntriesServiceProvider::class,
    Aaran\Blog\Providers\BlogServiceProvider::class,
    Aaran\Developer\Providers\DeveloperServiceProvider::class,
    Aaran\Accounts\Providers\AccountsServiceProvider::class,

    Aaran\Audit\Providers\AuditServiceProvider::class,
    Aaran\Taskmanager\Providers\TaskmanagerServiceProvider::class,
    Aaran\Erp\Providers\ErpServiceProvider::class,
    Aaran\Attendance\Providers\AttendanceServiceProvider::class,
    Aaran\Sundar\Providers\AdminServiceProvider::class,
    Aaran\Accounts\Providers\AccountsServiceProvider::class,
    Aaran\Reports\Providers\ReportServiceProvider::class,
    Aaran\Finance\Providers\FinanceServiceProvider::class,
    Aaran\Testing\Providers\TestingServiceProvider::class,

];
