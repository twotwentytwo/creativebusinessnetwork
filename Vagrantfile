Vagrant.configure("2") do |config|

    config.proxy.http     = ""
    config.proxy.https    = ""
    config.proxy.no_proxy = "localhost,127.0.0.1"

  # Enable the Puppet provisioner, with will look in manifests
  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "manifests"
    puppet.manifest_file = "default.pp"
    puppet.module_path = "modules"
  end

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "precise32"

  # Forward guest port 80 to host port 8888 and name mapping
  config.vm.network :forwarded_port, guest: 80, host: 8888

  config.vm.synced_folder "webroot/", "/vagrant/webroot/", :owner => "www-data"
  #:mount_options => ["dmode=777","fmode=666"]
end


# -todo
# aws tools
# grunt (--no-bin-links)
# grunt cli
# sass (lib-sass)

#(run as admin)