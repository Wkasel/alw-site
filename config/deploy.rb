require 'capistrano-deploytags'
 
set :stages, %w(prod dev)
set :default_stage, 'dev'
 
require 'capistrano/ext/multistage'

set :site,         "179669"
set :application,  "alwusa.com" # typically the same as the domain
set :webpath,      "alwusa.com" # the domain you are deploying the site as
 
# Shouldn't have to change anything below
set :domain,       "s#{site}.gridserver.com"
set :user,         "serveradmin@#{webpath}"
set :password,     "ALWDevTeam14*" # or you can add your public ssh key, just forward the agent in this recipe
 
# Other options
default_run_options[:pty] = true
default_run_options[:shell] = false
set :use_sudo, false # MediaTemple doesn't allow sudo command
 
# Repo stuff
set :scm, :git
# set :repository, "." # assumes you are running cap deploy while your current working directory is the repo
# set :deploy_via, :copy
set :repository, "git@github.com:Wkasel/alw-site.git"
set :deploy_via, :remote_cache
set :copy_cache, true
set :copy_exclude, [".git", "bin/", "config/", "Capfile"]
set :branch, "master" # you can change this if you would like to use another branch
 
# Path stuff, make sure to symlink html to ./current
set :deploy_to, "/home/#{site}/users/.home/domains/#{application}"
set :current_deploy_dir, "#{deploy_to}/current"
# make sure you have added a tmp directory inside domains/example.com with correct permissions (i.e 755)
set :copy_remote_dir, "#{deploy_to}/tmp" 
set :keep_releases, 2 # keep this low for larger sites, can be up to 5 if you are really nervous
 
# Roles
role :web, domain
role :app, domain
role :db,  domain, :primary => true
 
def relative_path(from_str, to_str) 
  require 'pathname' 
  Pathname.new(to_str).relative_path_from(Pathname.new(from_str)).to_s 
end 


# Deployment process
after "deploy:update", "deploy:cleanup" 
after "deploy", "deploy:sort_files_and_directories"
 
# Custom deployment tasks
namespace :deploy do
  
  desc "Relative symlinks for current, so we don't use full path" 
  task :symlink, :except => { :no_release => true } do 
    if releases[-2] # not the first release 
      previous_release_relative = relative_path(deploy_to, previous_release) 
      on_rollback { run "rm -f #{current_path}; ln -s #{previous_release_relative} #{current_path}; true" } 
    end 
    latest_release_relative = relative_path(deploy_to, latest_release) 
    run "rm -f #{current_path} && ln -s #{latest_release_relative} #{current_path}" 
  end
  
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