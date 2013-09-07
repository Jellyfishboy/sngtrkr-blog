set :application, 'sngtrkr_blog'
set :user, 'root'
set :scm, 'git'
set :repository, 'git@github.com:Jellyfishboy/sngtrkr_blog.git'
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

# additional settings
default_run_options[:pty] = true


namespace :wordpress do
    desc "Setup symlinks for a wordpress project"
    task :create_symlinks, :roles => :app do
        run "ln -nfs #{shared_path}/uploads #{release_path}/wp-content/uploads"
    end
    desc "Copy production config file across"
    task :production_config, :roles => :app do 
        run "cp /home/wp-config-production.php /home/wordpress/current"
    end
    desc "Set sitemap file permissions"
    task :sitemap_permissions, :roles => :app do
        run "chmod 666 /home/wordpress/current/sitemap.xml"
        run "chmod 666 /home/wordpress/current/sitemap.xml.gz"
    end
end
after "deploy:create_symlink", "wordpress:create_symlinks"
after "wordpress:create_symlinks", "wordpress:production_config"
after "wordpress:production_config", "wordpress:sitemap_permissions"