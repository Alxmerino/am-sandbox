@servers(['web' => 'user@server'])

@macro('deploy')
@endmacro

@task('install-wp')
	cd ~/html
    curl -O https://wordpress.org/latest.tar.gz
    tar -zxvf latest.tar.gz
    rm latest.tar.gz
    cd wordpress
    rm index.php
@endtask

@task('deploy:staging')
	cd ~/html
	git pull origin staging
	git push origin staging
@endtask

@task('deploy:prod', ['confirm' => true])
	cd ~/html
	git pull origin master
	git push origin master
@endtask