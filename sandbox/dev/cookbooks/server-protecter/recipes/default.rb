package 'apache2'
package 'sqlite3'
package 'php5'
package 'php5-sqlite'

service 'apache2' do
	  action :start
end

template "/etc/apache2/sites-available/default" do
    mode 0644
    owner "root"
    group "root"
    source "site.conf"
end

service 'apache2' do
	  action :restart
end