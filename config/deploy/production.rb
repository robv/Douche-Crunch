# Set this to the parent path of the releases/ shared/ and current/ directories/symlink
set :deploy_to, "~/websites/douchecrunch.com/" 
role :web, "174.143.181.10"
set :user, "douchecrunch"
set :port, "242"
#set :scm_command, "/usr/bin/git"

after :deploy, 'deploy:secure'



