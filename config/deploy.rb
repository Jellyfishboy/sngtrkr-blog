set :application, 'sngtrkr_blog'
set :user, 'root'
set :scm, 'git'
set :repository, 'git@github.com:Jellyfishboy/sngtrkr_blog.git '
set :scm_verbose, true
set :domain, '82.196.15.184'
set :deploy_to, '/home/wordpress'
set :branch, 'master'

server domain, :app, :web, :db, :primary => true

# Only keep the latest 3 releases
set :keep_releases, 3
after "deploy:restart", "deploy:cleanup"

# deploy config
set :deploy_via, :remote_cache
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules"]
set :use_sudo, false

# Paths
set :asset_path, "assets"
set :theme_path, "wp-content/themes/sngtrkr"
set :coffee_to_path, "scripts"
set :coffee_dir, "src/coffee"
set :js_file_name, "application.js"

# additional settings
default_run_options[:pty] = true


namespace :wordpress do
    desc "Compile Sass/Compass"
        task :compile_sass, :roles => :app do
            run_locally( "cd #{theme_path}/#{asset_path}; compass compile" )
            upload( "#{theme_path}/#{asset_path}/css", "#{release_path}/#{theme_path}/#{asset_path}/css" )
    end
    desc "Compile Coffeescript"
        task :compile_coffee, :roles => :app do
            run_locally( "cd #{theme_path}/#{asset_path}; coffee -c -o #{coffee_to_path} -j #{js_file_name} #{coffee_dir}")
            upload( "#{theme_path}/#{asset_path}/scripts", "#{release_path}/#{theme_path}/#{asset_path}/scripts" )
    end
    desc "Setup symlinks for a wordpress project"
    task :create_symlinks, :roles => :app do
        run "ln -nfs #{shared_path}/uploads #{release_path}/wp-content/uploads"
    end
    desc "Copy production config file across"
    task :production_config, :roles => :app do 
        run "cp /home/config/wp-config-production.php /home/wordpress/current"
    end
    desc "Set sitemap file permissions"
    task :sitemap_permissions, :roles => :app do
        run "chmod 666 /home/wordpress/current/sitemap.xml"
        run "chmod 666 /home/wordpress/current/sitemap.xml.gz"
    end
    desc "Set root folder permissions to www-data"
    task :root_permissions, :roles => :app do
        run "chown -R www-data:www-data /home/wordpress"
    end
end
after "deploy:create_symlink", "wordpress:compile_sass"
after "wordpress:compile_sass", "wordpress:compile_coffee"
after "wordpress:compile_coffee", "wordpress:create_symlinks"
after "wordpress:create_symlinks", "wordpress:production_config"
after "wordpress:production_config", "wordpress:sitemap_permissions"
after "wordpress:sitemap_permissions", "wordpress:root_permissions"