set :stages, %w(production)
require 'capistrano/ext/multistage' 
load 'deploy' if respond_to?(:namespace) # cap2 differentiator
Dir['vendor/plugins/*/recipes/*.rb'].each { |plugin| load(plugin) }


#Added for railsless deploy
require 'rubygems'
require 'railsless-deploy'
load    'config/deploy'

set :default_stage, "production" 


desc "installs git on the boxes"
task :provision do 
  default_run_options[:pty] = true

  set :use_sudo, true
  set :user, "doucheadmin"
  run "#{sudo} apt-get -y install git-core"
end
