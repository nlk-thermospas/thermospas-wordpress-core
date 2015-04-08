# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  # Box address and details
  config.vm.hostname = "thermospas-corporate"
  config.vm.box = "bythepixel/thermospas-corporate"
  
  # Network settings
  config.vm.network "private_network", ip: "192.168.53.101"
  
  # Virtual box settings
  config.vm.provider "virtualbox" do |vb|  
	vb.gui = false
	vb.memory = "1024"
    vb.name = 'thermospas-corporate'	
  end
  
  # config.vm.provision :shell, :path => "provision.sh"
  
end