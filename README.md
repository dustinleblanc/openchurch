[![Stories in Ready](https://badge.waffle.io/dustinleblanc/openchurch.png?label=ready&title=Ready)](http://waffle.io/dustinleblanc/openchurch)
## Getting Started

Openchurch uses Greg Geerling's [DrupalVM](http://www.drupalvm.com/) as a consistent and predictable development environment. If you'd like to contribute, follow the steps below to get started (copied straight from DrupalVM docs).

### 1 - Install Vagrant

Download and install [Vagrant](https://www.vagrantup.com/downloads.html).

Vagrant will automatically install [VirtualBox](https://www.virtualbox.org/wiki/Downloads) if no providers are available (Drupal VM also works with Parallels or VMware, if you have the [Vagrant VMware integration plugin](http://www.vagrantup.com/vmware)).

Notes:

  - **For faster provisioning** (Mac/Linux only): *[Install Ansible](http://docs.ansible.com/intro_installation.html) on your host machine, so Drupal VM can run the provisioning steps locally instead of inside the VM.*
  - **NFS on Linux**: *If NFS is not already installed on your host, you will need to install it to use the default NFS synced folder configuration. See guides for [Debian/Ubuntu](https://www.digitalocean.com/community/tutorials/how-to-set-up-an-nfs-mount-on-ubuntu-14-04), [Arch](https://wiki.archlinux.org/index.php/NFS#Installation), and [RHEL/CentOS](https://www.digitalocean.com/community/tutorials/how-to-set-up-an-nfs-mount-on-centos-6).*
  - **Versions**: *Make sure you're running the latest releases of Vagrant, VirtualBox, and Ansible—as of February 2016, Drupal VM recommends: Vagrant 1.8.1, VirtualBox 5.0.14, and Ansible 2.0.0.*

### 2 - Build the Virtual Machine

  1. Download this project and put it wherever you want.
  2. Make a copy of the `example.config.yml` file, and modify to your liking:
    - Copy `example.config.yml` to `config.yml`.
  3. Create a local directory where Drupal will be installed and configure the path to that directory in `config.yml` (`local_path`, inside `vagrant_synced_folders`).
  4. Open Terminal, `cd` to this directory (containing the `Vagrantfile` and this README file).
  5. (If you have Ansible installed on Mac/Linux) Run `$ sudo ansible-galaxy install -r provisioning/requirements.yml --force`.
  6. Type in `vagrant up`, and let Vagrant do its magic.

Note: *If there are any errors during the course of running `vagrant up`, and it drops you back to your command prompt, just run `vagrant provision` to continue building the VM from where you left off. If there are still errors after doing this a few times, post an issue to this project's issue queue on GitHub with the error.*

### 3 - Configure your host machine to access the VM.

  1. [Edit your hosts file](http://www.rackspace.com/knowledge_center/article/how-do-i-modify-my-hosts-file), adding the line `192.168.88.88  openchurch.dev` so you can connect to the VM.
    - You can have Vagrant automatically configure your hosts file if you install the `hostsupdater` plugin (`vagrant plugin install vagrant-hostsupdater`). All hosts defined in `apache_vhosts` or `nginx_hosts` will be automatically managed. The `vagrant-hostmanager` plugin is also supported.
    - You can also have Vagrant automatically assign an available IP address to your VM if you install the `auto_network` plugin (`vagrant plugin install vagrant-auto_network`), and set `vagrant_ip` to `0.0.0.0` inside `config.yml`.
  2. Open your browser and access [http://openchurch.dev/](http://openchurch.dev/). The default login for the admin account is `admin` for both the username and password.
