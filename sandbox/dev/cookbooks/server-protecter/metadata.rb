name              "server-protecter"
maintainer        "Mr.Twister"
maintainer_email  "sardo.ip@sardo.work"
license           "Apache 2.0"
description       "Build server-protecter test environment."
version           "0.0.1"

recipe "server-protecter", "Installs apache2 and sqlite3."

%w{ubuntu}.each do |os|
  supports os
end
