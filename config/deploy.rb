# config valid only for current version of Capistrano
lock '3.9.0'

set :application, 'lordswar.cn'
set :repo_url, "git@git.coding.net:sowicm/#{fetch(:application)}.git"

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :tmp_dir,   "/srv/cap/tmp"
set :deploy_to, "/srv/cap/#{fetch(:application)}"
set :run_dir,   "/srv/docks/#{fetch(:application)}"

set :need_move, ['*.yml', 'Dockerfile*', 'php-cron', 'web', 'lordswar', 'forum']

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :airbrussh.
# set :format, :airbrussh

# You can configure the Airbrussh format using :format_options.
# These are the defaults.
# set :format_options, command_output: true, log_file: 'log/capistrano.log', color: :auto, truncate: :auto

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# append :linked_files, 'config/database.yml', 'config/secrets.yml'

# Default value for linked_dirs is []
# append :linked_dirs, 'log', 'tmp/pids', 'tmp/cache', 'tmp/sockets', 'public/system'

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

namespace :deploy do

	task :on_server_more do
		on roles(:app) do
			execute [
				"cd #{fetch(:deploy_to)}/current",
#				"mv Dockerfile-forum_server Dockerfile-forum", # already specified 
				"mv server_main_config.php lordswar/include/config.php",
				"mv server_world_config.php lordswar/world1/include/config.php",
				"mv lordswar/templates/cssjs_server.tpl lordswar/templates/cssjs.tpl",
				"mv lordswar/world1/templates/cssjs_server.tpl lordswar/world1/templates/cssjs.tpl",
				"rm -rf lordswar/zapping_support",
				"rm -rf lordswar/world1/admin",
#				"chown -R 82:82 lordswar",
				'sed -i -e "s/error_reporting/#error_reporting/g" lordswar/index.php',
				'sed -i -e "s/error_reporting/#error_reporting/g" lordswar/include.inc.php',
				'sed -i -e "s/error_reporting/#error_reporting/g" lordswar/world1/include.inc.php',
				'sed -i -e "s/ini_set/#ini_set/g" lordswar/world1/include.inc.php',
				'sed -i -e "s/lordswar.local/lordswar.cn/g" web/conf.d/s1.conf',
				].join("; ")
		end
	end
end

before "deploy:on_server", "deploy:on_server_more"



