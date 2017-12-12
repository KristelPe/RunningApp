@servers(['web' => ['deploybot@172.104.151.88']])

@task('deploy-staging', ['on' => 'web'])
    cd /home/wearerunners-staging/
    git pull https://github.com/KristelPe/RunningApp.git

    cd RunningApp/
    composer update
    php artisan migrate:fresh --seed
@endtask

@task('deploy-production', ['on' => 'web'])
    cd /home/wearerunners/
    git pull https://github.com/KristelPe/RunningApp.git

    cd RunningApp/
    composer update
    php artisan migrate:refresh
@endtask