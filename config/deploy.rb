# config valid only for current version of Capistrano
lock '3.6.1'

# 这样的话那何不全部放到一个 docker 里面？
set :application, 'lordswar'
repo_url = "https://#{ENV['LORDSWAR_GIT_USER']}:#{ENV['LORDSWAR_GIT_PASS']}@bitbucket.org/zhangriyueming/lordswar.git"
set :repo_url, repo_url

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, '/root/cap/lordswar/'

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
	desc "Precompile Assets"
	task :precompile do
	end

	task :on_server do
		on roles(:app) do
			execute [ "cd #{deploy_to}/current",
				"mv docker-compose_server.yml /root/docks/lordswar/docker-compose.yml",
				"mv Dockerfile_server /root/docks/lordswar/Dockerfile",
				"mv php5forum/Dockerfile_server php5forum/Dockerfile",
				"mv server_main_config.php lordswar/include/config.php",
				"mv server_world_config.php lordswar/world1/include/config.php",
				"mv lordswar/templates/cssjs_server.tpl lordswar/templates/cssjs.tpl",
				"mv lordswar/world1/templates/cssjs_server.tpl lordswar/world1/templates/cssjs.tpl",
				"rm -rf lordswar/zapping_support",
				"rm -rf lordswar/world1/admin",
				"chown -R 82:82 lordswar",
				'sed -i -e "s/error_reporting/#error_reporting/g" lordswar/index.php',
				'sed -i -e "s/error_reporting/#error_reporting/g" lordswar/include.inc.php',
				'sed -i -e "s/error_reporting/#error_reporting/g" lordswar/world1/include.inc.php',
				'sed -i -e "s/ini_set/#ini_set/g" lordswar/world1/include.inc.php',
				'sed -i -e "s/lordswar.local/lordswar.cn/g" web/conf.d/s1.conf',
				# "mv php5forum /root/docks/lordswar/",
				# "mv /root/docks/lordswar/php5forum/Dockerfile_server /root/docks/lordswar/php5forum/Dockerfile",
				"rm -rf /root/docks/lordswar/php5forum",
				"mv php5forum /root/docks/lordswar/php5forum",
				"mv php-cron /root/docks/lordswar/php-cron",
				"rm -rf /root/docks/lordswar/web",
				"mv web /root/docks/lordswar/web",
				"rm -rf /root/docks/lordswar/lordswar",
				"mv lordswar /root/docks/lordswar/lordswar",
				# "chown -R 82:82 /root/docks/lordswar/lordswar",
				].join("; ")
		end
	end
	task :docker_build do
		on roles(:app) do
			execute [ "cd /root/docks/lordswar",
				"docker-compose build",
				].join(" && ")
		end
	end
	task :docker_restart do
		on roles(:app) do
			execute [ "cd /root/docks/lordswar",
				"docker-compose restart",
				].join(" && ")
		end
	end
	task :docker_recreate do
		on roles(:app) do
			execute [ "cd /root/docks/lordswar",
				"docker-compose down",
				"docker-compose up -d",
				].join(" && ")
		end
	end
end

after "deploy", "deploy:on_server"
after "deploy:on_server", "deploy:docker_restart"
# after "deploy:on_server", "deploy:docker_build"
# after "deploy:docker_build", "deploy:docker_recreate"


