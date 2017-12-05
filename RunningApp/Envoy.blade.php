@servers(['web' => ['deploybot@172.104.151.88']])

@task('betaPush', ['on' => 'web'])
    cd /home/wearerunners-staging/
    git pull https://github.com/KristelPe/RunningApp.git
    cd RunningApp/
    composer dump-autoload
    php artisan migrate:fresh --seed
@endtask