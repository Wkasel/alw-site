require 'capistrano-deploytags'
 
set :stages, %w(prod dev)
set :default_stage, 'dev'
 
require 'capistrano/ext/multistage'

set :site,         "179669"
set :application, "alwusa.com"
set :deploy_to, "~/domains/alwusa.com/html"
set :repository, "git@github.com:wkasel/alw-site.git"
set :branch, "master"
set(:domain) { "s#{site}.gridserver.com" }
set(:user) { "#{domain}@#{domain}" }
# Other options
default_run_options[:pty] = true
default_run_options[:shell] = false
set :use_sudo, false # MediaTemple doesn't allow sudo command
 
# Additional SCM settings
set :scm, :git
set :ssh_options, { :forward_agent => true }
set :deploy_via, :remote_cache
set :copy_strategy, :checkout
set :keep_releases, 3
set :use_sudo, false
set :copy_compression, :bz2
set :copy_cache, true
set :copy_exclude, [".git", "bin/", "config/", "Capfile"]  # no need to include the git config directory
 
# Roles
role :app, "#{application}"
role :web, "#{application}"
role :db,  "#{application}", :primary => true
 
# Deployment process
after "deploy:update", "deploy:cleanup" 
after "deploy", "deploy:sort_files_and_directories"
 
# Custom deployment tasks
namespace :deploy do
 
  desc "This is here to overide the original :restart"
  task :restart, :roles => :app do
    # do nothing but overide the default
  end
 
  task :finalize_update, :roles => :app do
    run "chmod -R g+w #{latest_release}" if fetch(:group_writable, true)
    # overide the rest of the default method
  end
 
  desc "Create additional directories and update permissions"
  task :sort_files_and_directories, :roles => :app do
    # create upload and cache directories
    run "mkdir #{latest_release}/system/cache"
    run "mkdir #{latest_release}/uploads/"
    # move config files
    run "mv #{previous_release}/system/application/config/config.php #{latest_release}/system/application/config/config.php"
    run "mv #{previous_release}/system/application/config/database.php #{latest_release}/system/application/config/database.php"
    # move log files
    run "mv #{previous_release}/system/logs #{latest_release}/system/logs"
    # set permissions
    run "chmod 660 #{latest_release}/system/cache"
    run "chmod 660 #{latest_release}/system/logs"
    run "chmod 660 #{latest_release}/uploads/"
  end
end