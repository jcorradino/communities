#adding line to test stuff
set(:user) { "stateadm" }

set(:domain) { "comapp401p.qa.ch4.s.com" }
set(:application) { "communities" }
set(:repository) { "git@github.com:dasfisch/communities.git" }

ssh_options[:forward_agent] = true
default_run_options[:pty] = true

##### APPLICATION #####
role :web, "#{domain}"  # Your HTTP server, Apache/etc
role :app, "#{domain}"  # This may be the same as your `Web` server
role :db, domain, :primary => true

set (:branch) { "int/20130326" }
set (:deploy_to) { "/opt/stateadm/communities" }
set (:app_loc) { "/appl/wordpress/www/community/community/wp-content" }

set :copy_strategy, :checkout
set :deploy_via, :copy

set :move_wp_content do
  run "rm -rf #{app_loc}/plugins/* && cp -R #{release_path}/wordpress/wp-content/plugins/* #{app_loc}/plugins/"
  run "rm -rf #{app_loc}/themes/* && cp -R #{release_path}/wordpress/wp-content/themes/* #{app_loc}/themes/"
end

